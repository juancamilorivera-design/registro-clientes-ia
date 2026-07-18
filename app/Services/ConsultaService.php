<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Solicitud;

class ConsultaService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function ejecutar(array $interpretacion): array
    {
        $accion = $interpretacion['accion'] ?? null;

        switch ($accion) {

            case 'contar_clientes':

                return [
                    'total_clientes' => Cliente::count(),
                ];

            case 'buscar_clientes':

                if (!isset($interpretacion['pais'])) {

                    return [
                        'error' => 'No se especificó un país.',
                    ];
                }

                return Cliente::where(
                    'pais',
                    $interpretacion['pais']
                )->get()->toArray();

            case 'contar_solicitudes':

                return [
                    'total_solicitudes' => Solicitud::count(),
                ];

            case 'buscar_solicitudes':

                if (!isset($interpretacion['estado'])) {

                    return [
                        'error' => 'No se especificó un estado.',
                    ];
                }

                return Solicitud::whereHas('estado', function ($query) use ($interpretacion) {

                    $query->where(
                        'nombre',
                        $interpretacion['estado']
                    );

                })->with([
                    'cliente',
                    'estado',
                    'servicio'
                ])->get()->toArray();

            default:

                return [
                    'error' => 'Acción no reconocida.',
                ];
        }
    }
}
