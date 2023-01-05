@extends('navbar')
    @section('title')
    <title>Empleados</title>
    @stop

    @section('content')
    
        <div class="box m-5 p-2">
        
        
            <div class="box m-5 p-2">
                <form method="get" action="{{route('empleados')}}" accept-charset="UTF-8">
                    <div class="columns has-background-primary-light"> 
                        <div class="column is-3">
                            <label for="nombre"><b>Nombre </b></label> 
                            <input type="text" name="nombre" class="input is-link" placeholder="Nombre" value="{{$nombre}}">
                        </div>
                        <div class="column is-3">
                            <label for="puesto"><b>Puesto</b></label>
                            <input type="text" name="puesto" class="input is-link" placeholder="Puesto" value="{{$puesto}}">
                        </div>
                        <div class="column is-2">
                            <br>
                            <input class="button is-info" type="submit" value="Buscar" >
                        </div>
                        
                    </div>
                </form>
            </div>
        
      
            

            <h4 class="title is-3">Tabla de empleados</h4>

            <br>

            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RFC</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Periodo pago</th>
                        <th>Num. Cuenta</th>
                        <th>Total Percep.</th>
                        <th>Total Ded.</th>
                        <th>Neto</th>
                

                    </tr>
                </thead>
                @foreach ($empleados as $row) 
            
                    <tr>
                        
                        <td><a href="{{ url('detalle-registro',$row['id']) }}">{{ $row->id }}</a></td>
                        <td>{{ $row->rfc }}</td>
                        <td>{{ $row->nombre }}</td>
                        <td>{{ $row->puesto }}</td>
                        <td>{{ $row->periodo_pago }}</td>
                        <td>{{ $row->num_cuenta }}</td>
                        <td>{{ number_format($row->total_percep,2) }}</td>
                        <td>{{ number_format($row->total_ded,2) }}</td>
                        <td>{{ number_format($row->neto,2) }}</td>
                        
                    </tr>
                @endforeach
            </table>
            {{ $empleados->links() }}
        </div>
        
    @stop

    
