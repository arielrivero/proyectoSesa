@extends('navbar')
    @section('title')
    <title>Editar</title>
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
            <form method="get" action="{{route('editar', $glosa->id)}}" accept-charset="UTF-8">
                <div class="columns "> 
                    <div> 
                        <input type="hidden" name="id" value="{{$glosa->id}}">
                    </div>
                    <div class="column is-2">
                        <label for="anio"><b>Año</b></label>
                    </div>
                    <div class="column is-3">
                        <div class="select is-link">
                            <select name="anio">
                                <option value="2022" @if($glosa->anio=="2022") selected @endif> 2022</option>
                                <option value="2023" @if($glosa->anio=="2023") selected @endif> 2023</option>
                                <option value="2024" @if($glosa->anio=="2024") selected @endif> 2024</option>
                                <option value="2025" @if($glosa->anio=="2025") selected @endif> 2025</option>
                            </select>
                        </div> 
                    </div>

                    
                </div>

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="quincena"><b>Quincena </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <div class="select is-link">
                            <select name="quincena">
                                <option value="1" @if($glosa->quincena=="1") selected @endif> 01</option>
                                <option value="2" @if($glosa->quincena=="2") selected @endif> 02</option>
                                <option value="3" @if($glosa->quincena=="3") selected @endif> 03</option>
                                <option value="4" @if($glosa->quincena=="4") selected @endif> 04</option>
                                <option value="5" @if($glosa->quincena=="5") selected @endif> 05</option>
                                <option value="6" @if($glosa->quincena=="6") selected @endif> 06</option>
                                <option value="7" @if($glosa->quincena=="7") selected @endif> 07</option>
                                <option value="8" @if($glosa->quincena=="8") selected @endif> 08</option>
                                <option value="9" @if($glosa->quincena=="9") selected @endif> 09</option>
                                <option value="10" @if($glosa->quincena=="10") selected @endif> 10</option>
                                <option value="11" @if($glosa->quincena=="11") selected @endif> 11</option>
                                <option value="12" @if($glosa->quincena=="12") selected @endif> 12</option>
                                <option value="13" @if($glosa->quincena=="13") selected @endif> 13</option>
                                <option value="14" @if($glosa->quincena=="14") selected @endif> 14</option>
                                <option value="15" @if($glosa->quincena=="15") selected @endif> 15</option>
                                <option value="16" @if($glosa->quincena=="16") selected @endif> 16</option>
                                <option value="17" @if($glosa->quincena=="17") selected @endif> 17</option>
                                <option value="18" @if($glosa->quincena=="18") selected @endif> 18</option>
                                <option value="19" @if($glosa->quincena=="19") selected @endif> 19</option>
                                <option value="20" @if($glosa->quincena=="20") selected @endif> 20</option>
                                <option value="21" @if($glosa->quincena=="21") selected @endif> 21</option>
                                <option value="22" @if($glosa->quincena=="22") selected @endif> 22</option>
                                <option value="23" @if($glosa->quincena=="23") selected @endif> 23</option>
                                <option value="24" @if($glosa->quincena=="24") selected @endif> 24</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="nombre"><b>Nombre</b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="text" name="nombre" value="{{ old('nombre', $glosa->nombre) }}" class="input is-link" placeholder="eg Tomo1" >
                        @error('nombre')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>    

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="observacion"><b>Observaciones</b></label>
                    </div>
                    <div class="column is-3"> 
                        <input type="text" name="observacion"  value="{{ old('observacion', $glosa->observaciones) }}" class="input is-link" placeholder="Inserte una observación">
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_elaboracion"><b>Fecha de elaboración</b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_elaboracion" value="{{ old('fecha_elaboracion', $glosa->fecha_elaboracion) }}" class="input is-link">
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="nomina"><b>Nomina</b></label>                        
                    </div>
                    <div class="column is-3"> 
                        <div class="select is-link">
                            <select name="nomina" >
                                <option value="1" @if($glosa->id_nomina=="1") selected @endif > Estatal</option>
                                <option value="2" @if($glosa->id_nomina=="2") selected @endif > Federal</option>
                                <option value="3" @if($glosa->id_nomina=="3") selected @endif >Eventual</option>
                                <option value="4" @if($glosa->id_nomina=="4") selected @endif >Regularizado</option>
                            </select>
                        </div>
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="ubicacion_fisica"><b>Ubicación física</b></label>                        
                    </div>
                    <div class="column is-3"> 
                        <input type="text" name="ubicacion_fisica" value="{{ old('ubicacion_fisica', $glosa->ubicacion_fisica) }}" class="input is-link">
                        @error('ubicacion_fisica')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>   

                <div class="columns "> 
                    <div class="column is-11">
                        <input class="button is-info" type="submit" value="Editar"  >
                    </div>
                    <div class="column is-1">
                        <a class="button is-warning" href="{{ url('glosas')}}">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    @stop

