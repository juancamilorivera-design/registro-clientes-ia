<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use App\Services\ConsultaService;

class ChatController extends Controller
{
    protected OpenAIService $openAIService;

    protected ConsultaService $consultaService;

    public function __construct(
        OpenAIService $openAIService,
        ConsultaService $consultaService
    ) {
        $this->openAIService = $openAIService;
        $this->consultaService = $consultaService;
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

        return response()->json([
            'interpretacion' => $interpretacion,
            'datos' => $datos,
        ]);
    }
}
