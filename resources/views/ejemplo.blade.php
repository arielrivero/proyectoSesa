<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <style>
            html {
                font-family: 'helvetica neue', helvetica, arial, sans-serif;
                font-size: 11px;
                margin: 20pt 15pt;
            }

            tbody td {
                text-align: center;
            }

            thead th, tfoot th, tfoot td {
                background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
            }

            caption {
                font-size: x-large;
                font-weight: bold;
            }

            .title th:nth-child(1) {
                width: 230px; 
            }

            .title th:nth-child(2) {
                width: 55   0px; 
            }


        </style>
    </head>
    <body>
        <table class="title">
            <!--<caption>Departamento de Operación del Pago </caption>
            <br>-->
            <tr>
                <th><img src="<?php echo $image ?>" /></th>
                <th><h3  style="text-align:center"> Departamento de Operación del Pago <br> Reporte de glosas {{$glosas->first()->nomina->nombre}} <br> {{$glosas->first()->anio}} </h3></th>
                
            </tr>
        </table>
            
        <br>
        
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Qna</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    <th>Ubicación física</th>
                    <th>Fecha de elaboración</th>
                    <th>Fecha entrega SRH</th>
                    <th>Fecha entrega DA</th>
                    <th>Fecha devolución DA</th>
                   <!-- <th>Fecha digitalización</th>
                    <th>Fecha entrega archivo</th>
                    <th>Fecha entrega resp</th>-->
                    <th>Observaciones</th>
                    

                </tr>
            </thead>
            @foreach ($glosas as $row) 
        
                <tr>
                    <td>{{ $row->anio }}/{{ $row->quincena }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->estatus }}</td>
                    <td>{{ $row->ubicacion_fisica }}</td>
                    <td>{{ $row->fecha_elaboracion }}</td>
                    <td>{{ $row->fecha_entrega_srh }}</td>
                    <td>{{ $row->fecha_entrega_da }}</td>
                    <td>{{ $row->fecha_devolucion_da }}</td>
                    <!--<td>{{ $row->fecha_digitalizacion }}</td>
                    <td>{{ $row->fecha_entrega_archivo }}</td>
                    <td>{{ $row->fecha_entrega_resp }}</td>-->
                    <td>{{ $row->observaciones }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>