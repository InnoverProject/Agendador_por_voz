<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinica;

//use App\Perfil;
use Illuminate\Support\Facades\DB; 


class HomeController extends Controller
{
    /**
     * Create a new controller ins tance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dato=Clinica::select('color')->get();
        foreach ($dato as $colors) {
            $color=$colors->color;
        }
        return view('layouts.index')->with('color',$color);
    }
}
