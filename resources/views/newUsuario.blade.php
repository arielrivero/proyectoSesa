@extends('navbar')
    @section('title')
    <title>Usuarios</title>
    @stop

    @section('content')
        <div class="box m-5 p-2">
            <form method="get" action="{{route('usuarios')}}" accept-charset="UTF-8">
                <div class="columns has-background-primary-light"> 
                    <div class="column is-3">
                        <label for="nombre"><b>Nombre </b></label> 
                        <input type="text" name="nombre" class="input is-link" placeholder="Inserte un nombre" >
                    </div>
                    <div class="column is-3">
                        <label for="correo"><b>Correo </b></label> 
                        <input type="email" name="correo" class="input is-link" placeholder="Inserte un correo" >
                    </div>
                    <div class="column is-3">
                        <label for="contraseña"><b>Contraseña </b></label> 
                        <input type="password" name="contraseña" class="input is-link" placeholder="Inserte un contraseña" >
                    </div>
                    <div class="column is-3">
                        <label for="rol"><b>Rol</b></label>
                        <input type="text" name="rol" class="input is-link" placeholder="Inserte el rol">
                    </div>
                    <div class="column is-2">
                        <br>
                        <input class="button is-info" type="submit" value="Buscar" >
                    </div>
                    
                </div>
            </form>
        </div>
    @stop