<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = DB::table('clientes')->get();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre_completo' => 'required',
                'correo' => 'required|email|unique:clientes,correo',
                'telefono' => 'required',
                'pais' => 'required',
            ],
            [
                'nombre_completo.required' => 'El nombre completo es obligatorio.',
                'correo.required' => 'El correo es obligatorio.',
                'correo.email' => 'Debe ingresar un correo válido.',
                'correo.unique' => 'Este correo ya está registrado.',
                'telefono.required' => 'El teléfono es obligatorio.',
                'pais.required' => 'El país es obligatorio.',
            ]
        );

        Cliente::create([
            'nombre_completo' => $request->nombre_completo,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
        ]);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
