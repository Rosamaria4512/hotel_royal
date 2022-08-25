@extends('adminlte::page')

@section('title', 'servicios')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}

            <button type="button" class="close" data-dismiss="alert" aria- label="Close">

                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Servicio</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Sitio</th>
                        <th scope="col">Fotografia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $s)
                        <tr>
                            <td scope="row">{{ $s->servicio }}</td>
                            <td>{{ $s->precio }}</td>
                            <td>{{ $s->sites_id }}</td>

                             <td>
                                <div class="imagen">
                                    <img class=" img-fluid" src="{{ asset('img/'.$s->foto) }}" alt="">
                                </div>
                            </td> 
                          </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $servicios->links() }}
        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        img {
            width: 100px;
            /* ANCHO_IMAGEN */
            border: solid silver 1px;
            height: 100px;
            /* ALTO_IMAGEN */
            background-position: center center;
            /* Centrado
        de imagen*/
            background-repeat: no-repeat;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px;
        }

        .grid a,
        button {
            width: 40px;
        }
    </style>
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
