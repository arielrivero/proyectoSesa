@extends('navbar')
    @section('title')
    <title>Usuarios</title>
    @stop

    @section('content')
    
        <div class="box m-5 p-2">
           
            <div class="box m-5 p-2">
                <form method="get" action="{{route('usuarios')}}" accept-charset="UTF-8">
                    <div class="columns has-background-primary-light"> 
                        <div class="column is-3">
                            <label for="name"><b>Name </b></label> 
                            <input type="text" name="name" class="input is-link" placeholder="name" value="{{$name}}">
                        </div>
                        <div class="column is-3">
                            <label for="rol"><b>Rol</b></label>
                            <br>
                            <div class="select is-link">
                                <select name="rol" id="rol">
                                    <option value="1" @if($id_rol=="1") selected @endif > Administrador</option>
                                    <option value="2" @if($id_rol=="2") selected @endif > Usuario</option>
                                </select>
                            </div>
                           
                        </div>
                        <div class="column is-5">
                            <br>
                            <input class="button is-info" type="submit" value="Buscar" >
                        </div>
                        <div class="column is-1">
                            <br>
                            <a class="button is-success" href="{{url('formulario-new-usuario')}}">Nuevo</a>
                        </div>
                        
                    </div>
                </form>
            </div>

            <h4 class="title is-3">Tabla de usuarios</h4>
            <br>
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($usuarios as $row) 
            
                    <tr>
                        
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->rol->nombre }}</td>
                        <td>
                        <div class="columns">
                            <div class="column is-narrow"><a class="button is-primary" href="{{ url('formulario-editar-usuario',$row['id']) }}">Editar</a></div> 
                            <div class="column is-narrow"><a class="button is-info" href="{{ url('formulario-editar-contrasenia',$row['id']) }}">Editar contraseña</a></div>       
                            <div class="column is-narrow"><a class="button is-danger" href="{{ url('eliminar',$row['id']) }}">Eliminar</a></div>   
                        </td>  
                    </tr>
                @endforeach
            </table>
            {{ $usuarios->links() }}
        </div>
        
    @stop

    
