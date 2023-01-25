@extends('navbar')
    @section('title')
    <title>Glosa</title>
    @stop

    @section('content')
        <div class="box m-5 p-2">

            <h4 class="title is-3">Control de glosas</h4>
    
            <div class="box m-5 p-2 has-background-primary-light">
                <form method="get" action="{{route('glosas')}}" accept-charset="UTF-8">
                    <div class="columns has-background-primary-light"> 
                        <div class="column is-narrow">
                            <label for="nomina"><b>Nomina </b></label> <br/>
                            <div class="select is-link">
                                <select name="nomina" id="nomina">
                                    <option value="1" @if($id_nomina=="1") selected @endif > Estatal</option>
                                    <option value="2" @if($id_nomina=="2") selected @endif > Federal</option>
                                    <option value="3" @if($id_nomina=="3") selected @endif >Eventual</option>
                                    <option value="4" @if($id_nomina=="4") selected @endif >Regularizado</option>
                                </select>
                            </div>
                        </div>
                        <div class="column is-narrow">
                            <label for="anio"><b>Año</b></label><br/>
                            <?php $Year = date("Y"); ?>
                            <div class="select is-link">
                                <select name="anio" id="anio">
                                    <option @if($Year=="2022") selected @endif >2022</option>
                                    <option @if($Year=="2023") selected @endif >2023</option>
                                    <option @if($Year=="2024") selected @endif >2024</option>
                                    <option @if($Year=="2025") selected @endif >2025</option>
                                </select>
                            </div> 
                    
                        </div>
                        <div class="column is-narrow">
                            <br>
                            <input class="button is-info" type="submit" value="Buscar" >
                        </div>
                        <div class="column is-7">
                            <br>
                            <button onclick="imprimir()" class="button is-dark">Imprimir reporte</button>
                        </div>    
                        <div class="column is-1">
                            <br>
                            <a class="button is-success" href="{{url('formulario-insertar-glosa')}}">Nuevo</a>
                        </div>
                        
                          
                    </div>
                </form>
            </div>
        
    
            

            

            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

                <thead>
                    <tr>
                        <th>Nomina</th>
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
                        <td>{{ $row->anio }}/{{ $row->quincena }}</td>
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

<script>
    function imprimir() {
        let nomina = document.getElementById("nomina").value;
        let anio = document.getElementById("anio").value;

        window.open("{{url('reporte')}}?nomina="+nomina+"&anio="+anio,'_blank'); 

    }
</script>   