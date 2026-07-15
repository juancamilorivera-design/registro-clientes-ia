<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(
            env('OPENAI_API_KEY')
        );
    }

    public function preguntar(string $mensaje): string
    {
        $respuesta = $this->client->responses()->create([
            'model' => 'gpt-5',
            'input' => $mensaje,
        ]);

        return $respuesta->outputText;
    }
}
