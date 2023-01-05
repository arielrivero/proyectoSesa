@extends('navbar')
    @section('title')
    <title>Cargar archivo</title>
    @stop

    @section('content')
        <div class="box m-5 p-2">
          <form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="columns has-background-primary-light">
              <div class="column is-3">
                <label for="archivo"><b>Archivo: </b></label>
                <input type="file" name="archivo" class="input is-link" required>
              </div>
              <div class="column is-2">
                <br>
                <input class="button is-primary" type="submit" value="Enviar" >
              </div>
            </div>
              
          </form>
        </div>
    @stop   
        