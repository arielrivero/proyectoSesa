<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<title>Conceptos</title>
</head>

<body>
    <div class="container">
        <div class="notification is-white">
        <div class="box  p-2">
        <div class="panel-heading">
            <h4 class="title is-4">Empleado</h4>
        </div>
        

        <br>

        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

            <thead>
                <tr>
                    
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
            @foreach ($datos as $row)
                <tr>
                    
                    
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

    

    

        <div class="columns">
            <div class="column is-flex is-half">

                <div class="panel is-fullwidth">
                    <div class="panel-heading">
                        <h4 class="title is-4">Percepciones</h4>
                    </div>

                    <div class="panel-block">
                        <table class="table is-bordered is-striped is-narrow is-hoverable">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Concepto</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <?php
                            $total = 0;
                            ?>
                            @foreach ($conceptos as $row)

                            <?php
                                $control = substr($row->concepto , 0, 1);  
                                //dd($percepciones);
                            ?>

                                    @if($control == 1)
                                        <tr>
                                                
                                            <td>{{ $row->id_empleado }}</td>
                                            <td>{{ $row->concepto }} </td>
                                            <td>{{ number_format($row->importe,2) }}</td>
                                                
                                        </tr>

                                        <?php
                                            $total += $row->importe;
                                            
                                        ?>
                                    @endif

                                
                            @endforeach

                            <tr>
                            <td colspan="2">Total</td>
                            <td>{{ number_format($total,2) }}</td>
                            </tr>
                        </table> 

                    </div>

                </div>
            </div>
            
            <div class="column is-flex">
                <div class="panel is-fullwidth">
                    <div class="panel-heading">
                        <h4 class="title is-4">Deducciones</h4>
                    </div>
                    <div class="panel-block">    
                        <table class="table is-bordered is-striped is-narrow is-hoverable">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Concepto</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <?php
                            $total = 0;
                            ?>
                            @foreach ($conceptos as $row)

                            <?php
                                $control = substr($row->concepto , 0, 1);  
                                
                            ?>

                            @if($control == 2)
                                <tr>
                                    
                                    <td>{{ $row->id_empleado }}</td>
                                    <td>{{ $row->concepto }} </td>
                                    <td>{{ number_format($row->importe,2) }}</td>
                                    
                                </tr>
                                    <?php
                                        $total += $row->importe;
                                        
                                    ?>
                            @endif
                            
                                
                            @endforeach
                            
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ number_format($total,2) }}</td>
                            </tr>
                        </table> 
                    </div>

                </div>
            </div>

        </div>

        <a class="button is-link" href="{{url('empleados')}}">Regresar a la tabla de empleados</a>
        <a class="button is-info" href="{{url('/inicio')}}">Regresar a la página de inicio</a>
            </div>
        </div>

    </div>

    
</body>

    
    
