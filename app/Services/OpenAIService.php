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

    public function interpretarPregunta(string $mensaje): array
    {
        $prompt = "
Eres un asistente para un CRM inmobiliario.

Tu única tarea es identificar la intención del usuario.

Responde únicamente en formato JSON.

Acciones permitidas:

- contar_clientes
- buscar_clientes
- contar_solicitudes
- buscar_solicitudes

Si el usuario menciona un país, inclúyelo.

Si menciona un estado como Pendiente o En proceso, inclúyelo.

Pregunta:

{$mensaje}
";

        $respuesta = $this->client->responses()->create([
            'model' => config('services.openai.model'),
            'input' => $prompt,
        ]);

        return json_decode($respuesta->outputText, true);
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
