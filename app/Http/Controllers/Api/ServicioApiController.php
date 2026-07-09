<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servicio;

class ServicioApiController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();

        return response()->json($servicios);
    }
}
