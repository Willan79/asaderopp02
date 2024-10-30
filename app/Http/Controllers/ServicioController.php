<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();

         #retorna la vista y pasa los servicios
        return view('servicios', compact('servicios'));
    }

    public function Datos()
    {
        #retorna la vista para dejar datos
        return view('datoservicios');
    }

}
