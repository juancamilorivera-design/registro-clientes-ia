<?php

namespace App\Services;

use OpenAI;
use App\Services\PromptBuilder;
use App\Models\Cliente;

class OpenAIService
{
    protected $client;

    protected PromptBuilder $promptBuilder;

    public function __construct(PromptBuilder $promptBuilder)
    {
        $this->promptBuilder = $promptBuilder;

        $this->client = OpenAI::client(
            env('OPENAI_API_KEY')
        );
    }

    public function preguntar(string $mensaje): string
    {
        $clientes = Cliente::with([
            'solicitudes.servicio',
            'solicitudes.estado',
        ])->get();

        $prompt = $this->promptBuilder->build(
            $clientes,
            $mensaje
        );

        $respuesta = $this->client->responses()->create([
            'model' => config('services.openai.model'),
            'input' => $prompt,
        ]);

        return $respuesta->outputText;
    }
}
