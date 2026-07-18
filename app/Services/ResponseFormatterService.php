<?php

namespace App\Services;

class ResponseFormatterService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function formatear(
        array $interpretacion,
        array $datos
    ): string {

        return match ($interpretacion['accion'] ?? null) {

            'contar_clientes' =>
            $this->formatearConteoClientes($datos),

            'buscar_clientes' =>
            $this->formatearClientes($datos),

            'contar_solicitudes' =>
            $this->formatearConteoSolicitudes($datos),

            'buscar_solicitudes' =>
            $this->formatearSolicitudes($datos),

            default =>
            'No pude interpretar la consulta.',
        };
    }

    private function formatearConteoClientes(array $datos): string
    {
        return "Actualmente hay {$datos['total_clientes']} clientes registrados.";
    }

    private function formatearClientes(array $datos): string
    {
        if (isset($datos['error'])) {
            return $datos['error'];
        }

        if (count($datos) === 0) {
            return 'No se encontraron clientes.';
        }

        $respuesta = "Clientes encontrados:\n\n";

        foreach ($datos as $cliente) {

            $respuesta .= "- {$cliente['nombre_completo']} ({$cliente['pais']})\n";
        }

        return $respuesta;
    }

    private function formatearConteoSolicitudes(array $datos): string
    {
        return "Actualmente hay {$datos['total_solicitudes']} solicitudes registradas.";
    }

    private function formatearSolicitudes(array $datos): string
    {
        if (isset($datos['error'])) {
            return $datos['error'];
        }

        if (count($datos) === 0) {
            return 'No se encontraron solicitudes.';
        }

        $respuesta = "Solicitudes encontradas:\n\n";

        foreach ($datos as $solicitud) {

            $respuesta .= "- {$solicitud['cliente']['nombre_completo']} | Estado: {$solicitud['estado']['nombre']}\n";
        }

        return $respuesta;
    }
}
