<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Solicitud;
use App\Models\Estado;
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

            'servicio_id' => 'required|exists:servicios,id',
            'mejorDia' => 'required|date',
            'franja' => 'required|string|max:50',
            'necesidad' => 'nullable|string',
            'politica' => 'required|boolean',
        ]);

        $cliente = Cliente::create([
            'nombre_completo' => $request->nombre_completo,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
        ]);

        $estadoPendiente = Estado::where('nombre', 'Pendiente')->first();

        Solicitud::create([
            'cliente_id' => $cliente->id,
            'servicio_id' => $request->servicio_id,
            'estado_id' => $estadoPendiente->id,
            'mejor_dia_llamada' => $request->mejorDia,
            'franja_horaria' => $request->franja,
            'necesidad' => $request->necesidad,
            'acepta_politica' => $request->politica,
            'observaciones' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cliente registrado correctamente.',
            'data' => $cliente,
        ], 201);
    }
}
