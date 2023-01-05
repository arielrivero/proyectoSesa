<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <style>
            html {
                font-family: 'helvetica neue', helvetica, arial, sans-serif;
                font-size: 11px;
            }

            thead th, tfoot th {
                font-family: 'Rock Salt', cursive;
                font-size: 11px;
            }

            th {
                letter-spacing: 2px;
            }

            td {
                letter-spacing: 1px;
            }

            tbody td {
                text-align: center;
            }

            tfoot th {
                text-align: right;
            }

            thead, tfoot {
                color: white;
                text-shadow: 1px 1px 1px black;
            }

            thead th, tfoot th, tfoot td {
                background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
                border: 3px solid purple;
            }


            tbody tr:nth-child(odd) {
                background-color: #20F56E;
            }

            tbody tr:nth-child(even) {
                background-color: #07F5DE;
            }

            table {
                background-color: grey;
            }

            caption {
                font-family: 'Rock Salt', cursive;
                padding: 20px;
                font-style: italic;
                caption-side: bottom;
                color: #666;
                text-align: right;
                letter-spacing: 1px;
            }

        </style>
    </head>
    <body>
            

            <h4 class="title is-3">Reporte de glosas</h4>
            <br>
        
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
    </body>
</html>