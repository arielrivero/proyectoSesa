@extends('navbar')
    @section('title')
    <title>Glosa</title>
    @stop

    @section('content')
        <div class="box m-5 p-2">
    
            <div class="box m-5 p-2">
                <form method="get" action="{{route('glosas')}}" accept-charset="UTF-8">
                    <div class="columns has-background-primary-light"> 
                        <div class="column is-3">
                            <label for="nomina"><b>Nomina </b></label> 
                            <input type="text" name="nomina" class="input is-link" placeholder="nomina" value="{{$nomina}}">
                        </div>
                        <div class="column is-3">
                            <label for="anio"><b>Año</b></label>
                            <input type="text" name="anio" class="input is-link" placeholder="año" value="{{$anio}}">
                        </div>
                        <div class="column is-4">
                            <br>
                            <input class="button is-info" type="submit" value="Buscar" >
                        </div>
                        <div class="column is-1">
                            <br>
                            <a class="button is-dark" href="{{ url('reporte') }}">Reporte</a>
                        </div>
                        <div class="column is-1">
                            <br>
                            <a class="button is-success" href="{{url('formulario-insertar-glosa')}}">Nuevo</a>
                        </div>
                        
                          
                    </div>
                </form>
            </div>
        
    
            

            <h4 class="title is-3">Control de glosas</h4>

            <br>

            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

                <thead>
                    <tr>
                        <th>Nomina</th>
                        <th>Año</th>
                        <th>Quincena</th>
                        <th>Nombre</th>
                        <th>Ubicación física</th>
                        <th>Fecha de elaboración</th>
                        <th>Estatus</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                @foreach ($glosas as $row) 
            
                    <tr>
                        <td>{{ $row->nomina->nombre }}</td>
                        <td>{{ $row->anio }}</td>
                        <td>{{ $row->quincena }}</td>
                        <td>{{ $row->nombre }}</td>
                        <td>{{ $row->ubicacion_fisica }}</td>
                        <td>{{ $row->fecha_elaboracion }}</td>
                        <td>{{ $row->estatus }}</td>
                        <td>{{ $row->observaciones }}</td>
                        <td>
                        <div class="columns">
                            <div class="column is-narrow"><a class="button is-primary" href="{{ url('formulario-editar',$row['id']) }}">Editar</a></div>    
                            <div class="column is-narrow"><a class="button is-danger" href="{{url('formulario-estatus',$row['id'])}}">Cambiar estatus</a></div>
                        </td>  
                    </tr>
                @endforeach
            </table>
        </div>
    @stop