@extends('navbar')
    @section('title')
    <title>Nueva glosa</title>
    @stop

    @section('content')
        <div class="box m-5 p-2 has-background-primary-light">
            <form method="get" action="{{route('insertar-glosa')}}" accept-charset="UTF-8">
                <div class="columns "> 
                    <div class="column is-2">
                        <label for="anio"><b>Año </b></label>
                    </div>
                    <div class="column is-3"> 
                        <div class="select is-link">
                            <select name="anio">
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
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
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="nombre"><b>Nombre </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="text" name="nombre" class="input is-link" placeholder="eg Tomo1" value="{{ old('nombre') }}">
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
                        <input type="text" name="observacion" class="input is-link" placeholder="Inserte una observación" value="{{ old('observacion') }}">
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_elaboracion"><b>Fecha de elaboración </b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_elaboracion" class="input is-link" value="{{ old('fecha_elaboracion') }}">
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="nomina"><b>Nomina </b></label>                        
                    </div>
                    <div class="column is-3"> 
                        <div class="select is-link">
                            <select name="nomina">
                                <option value="1">Estatal</option>
                                <option value="2">Federal</option>
                                <option value="3">Eventual</option>
                                <option value="4">Regularizados</option>
                            </select>
                        </div>
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="ubicacion_fisica"><b>Ubicación física </b></label>                        
                    </div>
                    <div class="column is-3"> 
                        <input type="text" name="ubicacion_fisica" class="input is-link" value="{{ old('ubicacion_fisica') }}">
                        @error('ubicacion_fisica')
                            <p class="error-message">{{ $message }}</p>
                        @enderror 
                    </div>
                </div>   

                <div class="columns "> 
                    <div class="column is-11">
                        <br>
                        <input class="button is-info" type="submit" value="Guardar" >
                    </div>
                    <div class="column is-1">
                        <a class="button is-warning" href="{{ url('glosas')}}">Volver</a>
                    </div>
                    
                </div>
            </form>
        </div>

    @stop

