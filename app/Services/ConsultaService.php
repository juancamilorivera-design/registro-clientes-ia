<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Solicitud;

class ConsultaService
{
    /**
     * Create a new class instance.
     */

    public function ejecutar(array $interpretacion): array
    {
        return match ($interpretacion['accion'] ?? null) {

            'contar_clientes' =>
            $this->contarClientes(),

            'buscar_clientes' =>
            $this->buscarClientes($interpretacion),

            'contar_solicitudes' =>
            $this->contarSolicitudes(),

            'buscar_solicitudes' =>
            $this->buscarSolicitudes($interpretacion),

            default =>
            [
                'error' => 'Acción no reconocida.',
            ],
        };
    }

    private function contarClientes(): array
    {
        return [
            'total_clientes' => Cliente::count(),
        ];
    }

    private function buscarClientes(array $interpretacion): array
    {
        if (!isset($interpretacion['pais'])) {

            return [
                'error' => 'No se especificó un país.',
            ];
        }

        return Cliente::where(
            'pais',
            $interpretacion['pais']
        )->get()->toArray();
    }

    private function contarSolicitudes(): array
    {
        return [
            'total_solicitudes' => Solicitud::count(),
        ];
    }

    private function buscarSolicitudes(array $interpretacion): array
    {
        if (!isset($interpretacion['estado'])) {

            return [
                'error' => 'No se especificó un estado.',
            ];
        }

        return Solicitud::whereHas(
            'estado',
            function ($query) use ($interpretacion) {

                $query->where(
                    'nombre',
                    $interpretacion['estado']
                );
            }
        )
            ->with([
                'cliente',
                'estado',
                'servicio',
            ])
            ->get()
            ->toArray();
    }
}
