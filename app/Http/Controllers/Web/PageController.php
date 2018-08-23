<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finca;
use App\Temporada;

class PageController extends Controller
{

    public function index()
    {
        $fechas = Temporada::all();
        return view("web.index", compact('fechas'));
    }

    public function about()
    {
        return view("web.about");
    }

    public function contact()
    {
        return view("web.contact");
    }

    public function farms()
    {
        $fincas = Finca::orderBy('id', 'DESC')->paginate(6);
        $cantReg = Finca::count();
               
        return view('web.farms', compact(['fincas', 'cantReg']));
    }

    public function farm($slug)
    {
        $finca = Finca::where('slug', $slug)->first();        
        return view('web.farm', compact('finca'));
    }
    
}
