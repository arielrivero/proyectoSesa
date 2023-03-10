<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\subirArchivo;
use App\Http\Controllers\UserController;
use App\Http\Controllers\glosasController;
use App\Http\Controllers\GeneradorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/cargar', function () {
    return view('cargar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/subir', [subirArchivo::class, 'subirArchivo'])->name('subir');
Route::get('/empleados', [subirArchivo::class, 'mostrarEmpleados'])->name('empleados');
Route::get('/detalle-registro/{empleado}', [subirArchivo::class, 'detalleRegistro'])->name('detalle-registro');
Route::get('/contabilidad', [subirArchivo::class, 'contabilidad'])->name('contabilidad');

Route::get('/formulario-new-usuario', [UserController::class, 'mostrarFormularioUsuario'])->name('formulario-new-usuario');
Route::get('/new-usuario', [UserController::class, 'insertarUsuario'])->name('new-usuario');
Route::get('/usuarios', [UserController::class, 'mostrarUsuarios'])->name('usuarios');
Route::get('/formulario-editar-usuario/{user}', [UserController::class, 'mostrarFormularioEditar'])->name('formulario-editar-user');
Route::get('/editar-usuario/{user}', [UserController::class, 'editarUsuario'])->name('editar-user');
Route::get('/formulario-editar-contrasenia/{user}', [UserController::class, 'mostrarFormularioEditarcontrasenia'])->name('formulario-editar-contrasenia-user');
Route::get('/editar-contrasenia/{user}', [UserController::class, 'editarcontrasenia'])->name('editar-contrasenia');
Route::get('/eliminar/{user}', [UserController::class, 'eliminar'])->name('eliminar');


Route::get('/glosas', [glosasController::class, 'mostrarGlosas'])->name('glosas');
Route::get('/formulario-insertar-glosa', [glosasController::class, 'mostrarFormularioInsertar'])->name('formulario-insertar-glosa');
Route::get('/insertar-glosa', [glosasController::class, 'insertar'])->name('insertar-glosa');
Route::get('/formulario-editar/{glosa}', [glosasController::class, 'mostrarFormularioEditar'])->name('formulario-editar-glosa');
Route::get('/editar/{glosa}', [glosasController::class, 'editar'])->name('editar');
Route::get('/formulario-estatus/{glosa}', [glosasController::class, 'mostrarFormularioEstatus'])->name('formulario-estatus-glosa');
Route::get('/estatus/{glosa}', [glosasController::class, 'estatus'])->name('estatus');
Route::get('/reporte', [glosasController::class, 'mostrarReporte'])->name('reporte');

require __DIR__.'/auth.php';
