<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required|string|max:20',
            'pais' => 'required|string|max:100',
        ]);

        $cliente = Cliente::create([
            'nombre_completo' => $request->nombre_completo,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cliente registrado correctamente.',
            'data' => $cliente,
        ], 201);
    }
}
