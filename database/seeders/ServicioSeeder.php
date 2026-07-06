<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [

            // Financiera
            [
                'categoria' => 'Financiera',
                'nombre' => 'Buena Data',
                'descripcion' => 'Servicio financiero',
            ],
            [
                'categoria' => 'Financiera',
                'nombre' => 'Brújula Financiera',
                'descripcion' => 'Servicio financiero',
            ],
            [
                'categoria' => 'Financiera',
                'nombre' => 'Brújula Crediticia',
                'descripcion' => 'Servicio financiero',
            ],
            [
                'categoria' => 'Financiera',
                'nombre' => 'Monetización',
                'descripcion' => 'Servicio financiero',
            ],
            [
                'categoria' => 'Financiera',
                'nombre' => 'Crédito',
                'descripcion' => 'Servicio financiero',
            ],

            // Inmobiliaria
            [
                'categoria' => 'Inmobiliaria',
                'nombre' => 'Brújula Inmobiliaria',
                'descripcion' => 'Servicio inmobiliario',
            ],
            [
                'categoria' => 'Inmobiliaria',
                'nombre' => 'Llave Inmobiliaria',
                'descripcion' => 'Servicio inmobiliario',
            ],

            // Legal y Migratoria
            [
                'categoria' => 'Legal y Migratoria',
                'nombre' => 'Asesoría Migratoria',
                'descripcion' => 'Servicio legal',
            ],
            [
                'categoria' => 'Legal y Migratoria',
                'nombre' => 'Emprendimiento',
                'descripcion' => 'Servicio legal',
            ],
            [
                'categoria' => 'Legal y Migratoria',
                'nombre' => 'Pensiones',
                'descripcion' => 'Servicio legal',
            ],
            [
                'categoria' => 'Legal y Migratoria',
                'nombre' => 'Representación Legal',
                'descripcion' => 'Servicio legal',
            ],
            [
                'categoria' => 'Legal y Migratoria',
                'nombre' => 'Servicios Fiscales',
                'descripcion' => 'Servicio legal',
            ],

            // Tour
            [
                'categoria' => 'Tour',
                'nombre' => 'Tour de la Vivienda',
                'descripcion' => 'Evento inmobiliario',
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}
