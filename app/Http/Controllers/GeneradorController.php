<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class GeneradorController extends Controller
{
    public function imprimir(){
        $pdf = \PDF::loadView('ejemplo');
        return $pdf->download('ejemplo.pdf');
   }
}
