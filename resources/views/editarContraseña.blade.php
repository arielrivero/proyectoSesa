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
        <form method="get" action="{{route('editar-contrasenia', $user->id)}}" accept-charset="UTF-8">
            <div class="columns ">   
                <div> 
                    <input type="hidden" name="id" value="{{$user->id}}">
                </div>
            </div>  
            <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="password"><b>Contraseña </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="password" name="password" class="input is-link"  value="{{ old('password')}}" required >
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>  
            <div>
            <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="password_confirmation"><b>Confirmar contraseña </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="password" name="password_confirmation" class="input is-link"  value="{{ old('password_confirmation') }}" required >
                        @error('password')
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