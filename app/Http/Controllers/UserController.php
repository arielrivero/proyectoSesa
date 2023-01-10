<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function mostrarFormularioUsuario(Request $request){
        return view('newUsuario');
    }
    public function mostrarFormularioEditar(User $user){
        return view('editarUsuario')->with(compact('user'));
    }

    public function insertarUsuario(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $nombre = $request->get('nombre');
        $email = $request->get('email');
        $rol = $request->get('rol');
        $datos = [
            'name' => $nombre,
            'email' => $email,
            'rol' => $rol,
            'password' => Hash::make($request->password)
        ];
        
        $usuario = User::create($datos);
        return redirect()->route('usuarios');
    }
    public function editarUsuario(Request $request, User $user)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $id = $request->get('id');
        $user = User::find($id);
        $nombre = $request->get('nombre');
        $email = $request->get('email');
        $rol = $request->get('rol');
        $password = Hash::make($request->password);

        $user->save();
        return redirect()->route('usuarios');
    }
    public function mostrarUsuarios(Request $request)
    {

        Paginator::useBootstrap();

        $name = $request->get('name');
        $rol = $request->get('rol');

        $query = User::select('*');

        if($name != "")
           $query->where('name', 'like', '%'.$name.'%');

        if($rol != "")
           $query->where('rol', 'like', '%'.$rol.'%');

        $records = $query->paginate(20)->withQueryString();
        return view('usuario')->with(['usuarios' => $records,'name'=>$name,'rol'=>$rol]);
    }

    public function eliminar($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('usuarios');
    }
}
