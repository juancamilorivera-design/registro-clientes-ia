<?php

namespace App\Services;

class PromptBuilder
{
    public function build($clientes, string $pregunta): string
    {
        $prompt = "
Eres un asistente inteligente para un broker inmobiliario.

Tu función es analizar la información de clientes y solicitudes.

Responde únicamente utilizando la información proporcionada.

Si no encuentras la respuesta en los datos, indica claramente que no dispones de esa información.

";

        $prompt .= "\nCLIENTES REGISTRADOS\n\n";

        return $prompt;
    }
}
