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

Información disponible:

Clientes:
- nombre_completo
- correo
- telefono
- pais

Solicitudes:
- mejor_dia_llamada
- franja_horaria
- necesidad
- observaciones
- estado
- servicio
- cliente

Relaciones:
- Una solicitud pertenece a un cliente.
- Una solicitud tiene un estado.
- Una solicitud tiene un servicio.

Si el usuario menciona un país, agrégalo dentro de:

\"filtros\": {
    \"pais\": \"...\"
}

Si menciona un estado, agrégalo dentro de:

\"filtros\": {
    \"estado\": \"...\"
}

Si el usuario menciona un correo electrónico, agrégalo dentro de:

\"filtros\": {
    \"correo\": \"...\"
}

Si el usuario menciona un teléfono, agrégalo dentro de:

\"filtros\": {
    \"telefono\": \"...\"
}

Si el usuario menciona un nombre de cliente, agrégalo dentro de:

\"filtros\": {
    \"nombre_completo\": \"...\"
}

Si el usuario menciona un servicio, agrégalo dentro de:

\"filtros\": {
    \"servicio\": \"...\"
}

Si el usuario pregunta por clientes, utiliza la acción buscar_clientes o contar_clientes según corresponda.

Si pregunta por solicitudes, utiliza buscar_solicitudes o contar_solicitudes.

Si identifica filtros, inclúyelos dentro del objeto \"filtros\".

Nunca inventes campos que no existan.

Si la pregunta no corresponde a ninguna acción permitida o no puede resolverse con la información disponible, responde exactamente:

{
    \"accion\": \"desconocida\",
    \"filtros\": {}
}

Responde únicamente con un objeto JSON válido.

No utilices Markdown.

No agregues explicaciones.

No uses bloques de código.

No escribas ningún texto antes o después del JSON.

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
