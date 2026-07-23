<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class   AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Autentica al usuario usando la lógica de LoginRequest
        $request->authenticate();

        // Regenera la sesión para evitar Session Fixation
        $request->session()->regenerate();

        // Devuelve una respuesta JSON para Next.js
        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'user' => Auth::user(),
        ]);
    }

    public function logout(Request $request)
    {

    }

    public function user(Request $request)
    {

    }
}
