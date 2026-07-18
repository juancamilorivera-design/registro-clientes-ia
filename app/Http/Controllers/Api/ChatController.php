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

        $interpretacion = $this->openAIService->interpretarPregunta(
            $request->mensaje
        );

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
