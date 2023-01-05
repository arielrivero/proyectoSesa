@extends('navbar')
    @section('title')
    <title>Glosa</title>
    @stop

    @section('content')
        <div class="box m-5 p-2 has-background-grey-lighter">        

            <h4 class="title is-3">Reporte de glosas</h4>

            <br>
            <div class="table-container">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

                    <thead>
                        <tr>
                            <th>Nomina</th>
                            <th>Año</th>
                            <th>Quincena</th>
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <th>Ubicación física</th>
                            <th>Fecha de elaboración</th>
                            <th>Fecha entrega SRH</th>
                            <th>Fecha devolución SRH</th>
                            <th>Fecha entrega DA</th>
                            <th>Fecha devolución DA</th>
                            <th>Fecha digitalización</th>
                            <th>Fecha entrega archivo</th>
                            <th>Fecha entrega resp</th>
                            <th>Observaciones</th>
                            

                        </tr>
                    </thead>
                    @foreach ($glosas as $row) 
                
                        <tr>
                            <td>{{ $row->nomina->nombre }}</td>
                            <td>{{ $row->anio }}</td>
                            <td>{{ $row->quincena }}</td>
                            <td>{{ $row->nombre }}</td>
                            <td>{{ $row->estatus }}</td>
                            <td>{{ $row->ubicacion_fisica }}</td>
                            <td>{{ $row->fecha_elaboracion }}</td>
                            <td>{{ $row->fecha_entrega_srh }}</td>
                            <td>{{ $row->fecha_devolucion_srh }}</td>
                            <td>{{ $row->fecha_entrega_da }}</td>
                            <td>{{ $row->fecha_devolucion_da }}</td>
                            <td>{{ $row->fecha_digitalizacion }}</td>
                            <td>{{ $row->fecha_entrega_archivo }}</td>
                            <td>{{ $row->fecha_entrega_resp }}</td>
                            <td>{{ $row->observaciones }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="columns "> 
                <div class="column is-10">
                    <a class="button is-warning" href="{{ url('glosas')}}">Volver</a>
                </div>
                <div class="column is-2">
                    <a class="button is-success" href="{{ url('imprimir')}}">Imprimir reporte</a>
                </div>        
            </div>
        </div>
    @stop