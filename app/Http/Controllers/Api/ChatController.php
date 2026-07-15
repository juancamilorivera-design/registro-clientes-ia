<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected OpenAIService $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string',
        ]);

        $respuesta = $this->openAIService->preguntar(
            $request->mensaje
        );

        return response()->json([
            'respuesta' => $respuesta,
        ]);
    }
}
