<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use App\Services\ConsultaService;
use App\Services\ResponseFormatterService;

class ChatController extends Controller
{
    protected OpenAIService $openAIService;
    protected ConsultaService $consultaService;
    protected ResponseFormatterService $responseFormatterService;

    public function __construct(
        OpenAIService $openAIService,
        ConsultaService $consultaService,
        ResponseFormatterService $responseFormatterService
    ) {
        $this->openAIService = $openAIService;
        $this->consultaService = $consultaService;
        $this->responseFormatterService = $responseFormatterService;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string',
        ]);

        try {
            // 🔥 IA REAL (esto se activa cuando tengas saldo)
            $interpretacion = $this->openAIService->interpretarPregunta(
                $request->mensaje
            );

        } catch (\Throwable $e) {

            // ⚠️ FALLBACK AUTOMÁTICO (por si falla la API o no hay saldo)
            $mensaje = strtolower($request->mensaje);

            if (str_contains($mensaje, 'país')) {
                $interpretacion = [
                    'accion' => 'clientes_por_pais',
                    'filtros' => [],
                ];
            } elseif (str_contains($mensaje, 'cuántos clientes')) {
                $interpretacion = [
                    'accion' => 'contar_clientes',
                    'filtros' => [],
                ];
            } elseif (str_contains($mensaje, 'clientes')) {
                $interpretacion = [
                    'accion' => 'buscar_clientes',
                    'filtros' => [],
                ];
            } elseif (str_contains($mensaje, 'solicitudes')) {
                $interpretacion = [
                    'accion' => 'buscar_solicitudes',
                    'filtros' => [],
                ];
            } else {
                $interpretacion = [
                    'accion' => 'desconocida',
                    'filtros' => [],
                ];
            }
        }

        $datos = $this->consultaService->ejecutar(
            $interpretacion
        );

        $respuesta = $this->responseFormatterService->formatear(
            $interpretacion,
            $datos
        );

        return response()->json([
            'respuesta' => $respuesta,
        ]);
    }
}
