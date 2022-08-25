@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sitio: {{''. $site->nombre}}</h1>
    <p>Descripcion: {{''. $site->descripcion}}</p>
   
@stop

@section('content')
<h2>serivicio por  sitio</h2>
<table class="table table-light">
    <tbody>
        @foreach ($services->servicio)

        <tr>
            <td>{{$services->servicio}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop