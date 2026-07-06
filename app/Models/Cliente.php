<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $fillable = [
        'nombre_completo',
        'correo',
        'telefono',
        'pais',
    ];

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class);
    }
}
