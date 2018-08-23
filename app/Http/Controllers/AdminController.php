<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $fechas = Temporada::all();
        return view("admin.index", compact('fechas'));
    }
}
