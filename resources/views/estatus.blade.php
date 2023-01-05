@extends('navbar')
    @section('title')
    <title>Editar</title>
    @stop

    @section('content')
        <div class="box m-5 p-2 has-background-primary-light">
            <form method="get" action="{{route('estatus', $glosa->id)}}" accept-charset="UTF-8">
            

                <div class="columns "> 
                    <div> 
                        <input type="hidden" name="id" value="{{$glosa->id}}">
                    </div>
                    <div class="column is-2">
                        <label for="fecha_entrega_srh"><b>Fecha entrega SRH</b></label>
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_entrega_srh" class="input is-link" value="{{ old('fecha_entrega_srh', $glosa->fecha_entrega_srh) }}">
                        
                    </div>
                </div>

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_devolucion_srh"><b>Fecha devolución SRH</b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_devolucion_srh" class="input is-link" value="{{ old('fecha_devolucion_srh', $glosa->fecha_devolucion_srh) }}">
                        @error('fecha_devolucion_srh')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_entrega_da"><b>Fecha entrega DA</b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_entrega_da" class="input is-link" value="{{ old('fecha_entrega_da', $glosa->fecha_entrega_da) }}">
                        @error('fecha_entrega_da')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>    
                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_devolucion_da"><b>Fecha devolución DA</b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_devolucion_da" class="input is-link" value="{{ old('fecha_devolucion_da', $glosa->fecha_devolucion_da) }}">
                        @error('fecha_devolucion_da')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>    

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_digitalizacion"><b>Fecha digitalización</b></label>
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_digitalizacion" class="input is-link" value="{{ old('fecha_digitalizacion', $glosa->fecha_digitalizacion) }}">
                        @error('fecha_digitalizacion')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_entrega_archivo"><b>Fecha entrega archivo</b></label> 
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_entrega_archivo" class="input is-link" value="{{ old('fecha_entrega_archivo', $glosa->fecha_entrega_archivo) }}">
                        @error('fecha_entrega_archivo')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>   

                <div class="columns ">   
                    <div class="column is-2"> 
                        <label for="fecha_entrega_resp"><b>Fecha entrega resp</b></label>                        
                    </div>
                    <div class="column is-3"> 
                        <input type="date" name="fecha_entrega_resp" class="input is-link" value="{{ old('fecha_entrega_resp', $glosa->fecha_entrega_resp) }}">
                        @error('fecha_entrega_resp')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>   

                <div class="columns "> 
                    <div class="column is-11">
                        <input class="button is-info" type="submit" value="Cambiar estatus" >
                    </div>
                    <div class="column is-1">
                        <a class="button is-warning" href="{{ url('glosas')}}">Volver</a>
                    </div>
                    
                </div>
            </form>
        </div>
    @stop