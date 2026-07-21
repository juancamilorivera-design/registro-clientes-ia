<?php

namespace App\Services;

class ResponseFormatterService
{
    public function formatear(
        array $interpretacion,
        array $datos
    ): string {

        return match ($interpretacion['accion'] ?? null) {

            'contar_clientes' =>
            $this->formatearConteoClientes($datos),

            'buscar_clientes' =>
            $this->formatearClientes($datos),

            'clientes_por_pais' =>
            $this->formatearClientesPorPais($datos),

            'contar_solicitudes' =>
            $this->formatearConteoSolicitudes($datos),

            'buscar_solicitudes' =>
            $this->formatearSolicitudes($datos),

            'servicio_mas_solicitado' =>
            $this->formatearServicioMasSolicitado($datos),

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
        if ($mensaje = $this->obtenerMensajeError($datos)) {
            return $mensaje;
        }

        $respuesta = "Clientes encontrados:\n\n";

        foreach ($datos as $cliente) {
            $respuesta .= "- {$cliente['nombre_completo']} ({$cliente['pais']})\n";
        }

        return $respuesta;
    }

    private function formatearClientesPorPais(array $datos): string
    {
        if ($mensaje = $this->obtenerMensajeError($datos)) {
            return $mensaje;
        }

        $respuesta = "Distribución de clientes por país:\n\n";

        foreach ($datos as $registro) {
            $respuesta .= "- {$registro['pais']}: {$registro['total']} clientes\n";
        }

        return $respuesta;
    }

    private function formatearConteoSolicitudes(array $datos): string
    {
        return "Actualmente hay {$datos['total_solicitudes']} solicitudes registradas.";
    }

    private function formatearSolicitudes(array $datos): string
    {
        if ($mensaje = $this->obtenerMensajeError($datos)) {
            return $mensaje;
        }

        $respuesta = "Solicitudes encontradas:\n\n";

        foreach ($datos as $solicitud) {
            $respuesta .= "- {$solicitud['cliente']['nombre_completo']} | Estado: {$solicitud['estado']['nombre']}\n";
        }

        return $respuesta;
    }

    private function formatearServicioMasSolicitado(array $datos): string
    {
        if ($mensaje = $this->obtenerMensajeError($datos)) {
            return $mensaje;
        }

        return "El servicio más solicitado es {$datos['nombre']} con {$datos['total']} solicitudes.";
    }

    private function obtenerMensajeError(array $datos): ?string
    {
        if (isset($datos['error'])) {
            return $datos['error'];
        }

        if (empty($datos)) {
            return 'No se encontraron resultados.';
        }

        return null;
    }
}
