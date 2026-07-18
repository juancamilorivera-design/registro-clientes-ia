<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Solicitud;

class ConsultaService
{
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

            default => [
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
        $filtros = $interpretacion['filtros'] ?? [];

        $query = Cliente::query();

        if (!empty($filtros['pais'])) {
            $query->where('pais', $filtros['pais']);
        }

        if (!empty($filtros['correo'])) {
            $query->where('correo', $filtros['correo']);
        }

        if (!empty($filtros['telefono'])) {
            $query->where('telefono', $filtros['telefono']);
        }

        if (!empty($filtros['nombre_completo'])) {
            $query->where(
                'nombre_completo',
                'LIKE',
                '%' . $filtros['nombre_completo'] . '%'
            );
        }

        return $this->obtenerResultados(
            $query,
            'No se encontraron clientes con los filtros especificados.'
        );
    }

    private function contarSolicitudes(): array
    {
        return [
            'total_solicitudes' => Solicitud::count(),
        ];
    }

    private function buscarSolicitudes(array $interpretacion): array
    {
        $filtros = $interpretacion['filtros'] ?? [];

        $query = Solicitud::query()->with([
            'cliente',
            'estado',
            'servicio',
        ]);

        if (!empty($filtros['estado'])) {
            $query->whereHas('estado', function ($q) use ($filtros) {
                $q->where('nombre', $filtros['estado']);
            });
        }

        if (!empty($filtros['servicio'])) {
            $query->whereHas('servicio', function ($q) use ($filtros) {
                $q->where('nombre', $filtros['servicio']);
            });
        }

        if (!empty($filtros['cliente'])) {
            $query->whereHas('cliente', function ($q) use ($filtros) {
                $q->where(
                    'nombre_completo',
                    'LIKE',
                    '%' . $filtros['cliente'] . '%'
                );
            });
        }

        return $this->obtenerResultados(
            $query,
            'No se encontraron solicitudes con los filtros especificados.'
        );
    }

    private function obtenerResultados($query, string $mensajeError): array
    {
        $resultados = $query->get()->toArray();

        if (empty($resultados)) {
            return [
                'error' => $mensajeError,
            ];
        }

        return $resultados;
    }
}
