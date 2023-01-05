@extends('navbar')
    @section('title')
    <title>Contabilidad</title>
    @stop

    @section('content')
    <div class="box m-5 p-2">

        <h4 class="title is-3">Contabilidad</h4>

        <br>

        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

        <thead>
            <tr>
                <th>Concepto</th>
                <th>Casos</th>
                <th>Total</th>
            </tr>
        </thead>
        @foreach ($resultado as $row)
        
            <tr>
                
                <td>{{ $row->concepto }}</td>
                <td>{{ $row->casos }}  </td>
                <td>{{ number_format($row->total,2) }} </td>
                
            </tr>
        @endforeach
        </table> 

    </div>
    @stop   