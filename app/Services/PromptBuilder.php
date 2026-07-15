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

        foreach ($clientes as $cliente) {

            $prompt .= "
Cliente: {$cliente->nombre_completo}

Correo: {$cliente->correo}

Teléfono: {$cliente->telefono}

País: {$cliente->pais}

";

            foreach ($cliente->solicitudes as $solicitud) {

                $prompt .= "
Servicio: {$solicitud->servicio->nombre}

Estado: {$solicitud->estado->nombre}

Necesidad: {$solicitud->necesidad}

Mejor día para llamada: {$solicitud->mejor_dia_llamada}

Franja horaria: {$solicitud->franja_horaria}

----------------------------------------

";
            }
        }

        $prompt .= "

PREGUNTA DEL USUARIO

{$pregunta}

";

        return $prompt;
    }
}
