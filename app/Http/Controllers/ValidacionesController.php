<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidacionesController extends Controller
{
    public function glosa(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'max:255'],
            'ubicacion_fisica' => ['required'],
        ]);

        $validated = $request->validated();

        $validated = $request->safe();
    }
}
