<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function insertarUsuario(Request $request)
    {
        $nombre = $request->get('nombre');
        $correo = $request->get('correo');
        $contraseña = $request->get('contraseña');
        $rol = $request->get('rol');

        $usuario = User::create([
            'nombre' => $nombre,
            'correo' => $correo,
            'contraseña' => $contraseña,
            'rol' => $rol,
        ]);
        return view('newUsuario');
    }
    public function mostrarUsuarios(Request $request)
    {

        Paginator::useBootstrap();

        $nombre = $request->get('nombre');
        $rol = $request->get('rol');

        $query = User::select('*');

        if($nombre != "")
           $query->where('nombre', 'like', '%'.$nombre.'%');

        if($rol != "")
           $query->where('rol', 'like', '%'.$rol.'%');

        $records = $query->paginate(20)->withQueryString();
        return view('usuario')->with(['usuarios' => $records,'nombre'=>$nombre,'rol'=>$rol]);

    }
}
