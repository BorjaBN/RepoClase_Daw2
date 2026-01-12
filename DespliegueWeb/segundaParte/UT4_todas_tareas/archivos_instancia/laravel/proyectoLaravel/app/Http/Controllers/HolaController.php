<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function index()
    {
        // Muestra la vista sin nombre
        return view('hola');
    }

    public function saludar($nombre)
    {
        // Pasa el nombre a la vista
        return view('hola', ['nombre' => $nombre]);
    }
}

