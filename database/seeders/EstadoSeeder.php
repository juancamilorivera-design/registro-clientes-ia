<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            'Pendiente',
            'En proceso',
            'Contactado',
            'Finalizado',
            'Cancelado'
        ];

        foreach ($estados as $estado) {
            Estado::create([
                'nombre' => $estado,
            ]);
        }
    }
}
