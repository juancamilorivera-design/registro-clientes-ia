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

    public function interpretarPregunta(string $mensaje): array
    {
        $prompt = "
Eres un asistente para un CRM inmobiliario.

Tu única tarea es identificar la intención del usuario.

Responde únicamente en formato JSON.

La estructura SIEMPRE debe ser:

{
    \"accion\": \"...\",
    \"filtros\": {}
}

Acciones permitidas:

- contar_clientes
- buscar_clientes
- contar_solicitudes
- buscar_solicitudes

Si el usuario menciona un país, agrégalo dentro de:

\"filtros\": {
    \"pais\": \"...\"
}

Si menciona un estado, agrégalo dentro de:

\"filtros\": {
    \"estado\": \"...\"
}

Nunca agregues texto adicional.

Pregunta:

{$mensaje}
";

        $respuesta = $this->client->responses()->create([
            'model' => config('services.openai.model'),
            'input' => $prompt,
        ]);

        return json_decode($respuesta->outputText, true);
    }




}
