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
- clientes_por_pais
- servicio_mas_solicitado

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

----------------------------------------
REGLAS IMPORTANTES
----------------------------------------

1. SOLO usa \"clientes_por_pais\" si el usuario dice explícitamente:
   - \"clientes por país\"
   - \"distribución por país\"
   - \"cuántos clientes hay en cada país\"

2. Si el usuario dice:
   - \"cuántos clientes hay\" → usar contar_clientes
   - \"muéstrame clientes\" → usar buscar_clientes

3. Si el usuario pregunta por solicitudes:
   - \"cuántas solicitudes\" → contar_solicitudes
   - \"mostrar solicitudes\" → buscar_solicitudes

4. Si el usuario pregunta:
   - \"servicio más solicitado\"
   - \"qué servicio se solicita más\"
   - \"qué servicio prefieren\"

   usa:
   \"servicio_mas_solicitado\"

   ⚠️ Y NO incluyas filtros

----------------------------------------
FILTROS
----------------------------------------

Si el usuario menciona:

- país → filtros.pais
- estado → filtros.estado
- correo → filtros.correo
- teléfono → filtros.telefono
- nombre → filtros.nombre_completo
- servicio → filtros.servicio (solo si NO es servicio_mas_solicitado)

----------------------------------------
REGLAS DE SALIDA
----------------------------------------

- SOLO responde JSON válido
- NO markdown
- NO texto adicional
- NO explicaciones

Si no entiendes la pregunta:

{
    \"accion\": \"desconocida\",
    \"filtros\": {}
}

----------------------------------------

Pregunta:

{$mensaje}
";

        try {
            $respuesta = $this->client->responses()->create([
                'model' => config('services.openai.model'),
                'input' => [
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ],
            ]);

            // ✅ CORRECCIÓN CLAVE (AQUÍ ESTABA TU ERROR)
            $texto = $respuesta->output[0]->content[0]->text ?? '';

            $resultado = json_decode($texto, true);

            // Validación fuerte
            if (!is_array($resultado) || !isset($resultado['accion'])) {
                return [
                    'accion' => 'desconocida',
                    'filtros' => []
                ];
            }

            return $resultado;

        } catch (\Exception $e) {

            // Cuando no hay saldo o falla la API
            return [
                'accion' => 'desconocida',
                'filtros' => []
            ];
        }
    }
}
