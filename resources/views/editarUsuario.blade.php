@extends('navbar')
    @section('title')
    <title>Usuarios</title>
    <style>
         .error-message {
            color: #FF0000;
            font-weight: bold;
        }

        label {
            margin: 10px;
        }

    </style>
    @stop

    @section('content')
    <div class="box m-5 p-2 has-background-primary-light">
        <form method="get" action="{{route('editar', $user->id)}}" accept-charset="UTF-8">
            <div class="columns ">   
                <div> 
                    <input type="hidden" name="id" value="{{$user->id}}">
                </div>
                <div class="column is-2"> 
                    <label for="nombre"><b>Nombre </b></label> 
                </div>
                <div class="column is-3"> 
                    <input type="text" name="nombre" class="input is-link"  value="{{ old('name', $user->name) }}" required autofocus>
                    @error('nombre')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>  
            
            <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="email"><b>Email </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="text" name="email" class="input is-link"  value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>  
            <div>
            <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="rol"><b>Rol </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <div class="select is-link">
                            <select name="rol"> 
                                <option value="1" @if($user->id_rol=="1") selected @endif >Administrador</option>
                                <option value="2" @if($user->id_rol=="2") selected @endif >Usuario</option>
                            </select>
                        </div>
                        @error('rol')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>  
            <div>
            <div class="columns "> 
                <div class="column is-11">
                    <br>
                    <input class="button is-info" type="submit" value="Guardar" >
                </div>
                <div class="column is-1">
                    <a class="button is-warning" href="{{ url('usuarios')}}">Volver</a>
                </div>
            </div>
        </form>
    </div>
    
    @stop