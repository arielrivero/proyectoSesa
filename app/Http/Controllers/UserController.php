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

    public function mostrarFormularioEditarContrasenia(User $user){
        return view('editarContraseña')->with(compact('user'));
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
        $id_rol = $request->get('rol');
        $datos = [
            'id_rol' => $id_rol,
            'name' => $nombre,
            'email' => $email,
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
            
        ]);

        $id = $request->get('id');
        $user = User::find($id);
        $nombre = $request->get('nombre');
        $email = $request->get('email');
        $users->id_rol = $request->get('rol');

        $user->save();
        return redirect()->route('usuarios');
    }

    public function editarContrasenia(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $id = $request->get('id');
        $user = User::find($id);
        $password = Hash::make($request->password);

        $user->save();
        return redirect()->route('usuarios');
    }

    public function mostrarUsuarios(Request $request)
    {

        Paginator::useBootstrap();

        $name = $request->get('name');
        $id_rol = $request->get('rol');

        $query = User::select('*')->with(['rol']);

        if($name != "")
           $query->where('name', 'like', '%'.$name.'%');

        if($id_rol != "")
           $query->where('id_rol', 'like', '%'.$id_rol.'%');

        $records = $query->paginate(20)->withQueryString();
        return view('usuario')->with(['usuarios' => $records,'name'=>$name,'id_rol'=>$id_rol]);
    }

    public function eliminar($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('usuarios');
    }
}
