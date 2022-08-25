<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nombre;

class NombreControlador extends Controller
{
    //

    public function index()
    {
        //select * from nombres table
        $nombres = Nombre::all();
        print "$nombres";
        //echo $nombres;
        return ' Hi there from Controller!';
    }
    //return view('nombreview');
}
