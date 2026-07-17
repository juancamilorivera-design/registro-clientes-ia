<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Estado;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::with([
            'cliente',
            'servicio',
            'estado',
        ])->get();

        return view('solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitude)
    {
        $solicitude->load([
            'cliente',
            'servicio',
            'estado',
        ]);

        return view('solicitudes.show', compact('solicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitude)
    {
        $solicitude->load([
            'cliente',
            'servicio',
            'estado',
        ]);

        $estados = Estado::all();

        return view('solicitudes.edit', compact(
            'solicitude',
            'estados'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitude)
    {
        $request->validate([
            'estado_id' => 'required|exists:estados,id',
            'observaciones' => 'nullable|string',
        ]);

        $solicitude->update([
            'estado_id' => $request->estado_id,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('solicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
