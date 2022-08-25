@extends('adminlte::page')

@section('title', 'Editar Sitios')

@section('content_header')
    <h1>Listar Sitios</h1>
@stop

@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show"
role="alert">
{{session('message')}}

<button type="button" class="close" data-dismiss="alert" aria-
label="Close">

<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Municipio</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fotografia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($site as $sites)
                        <tr>
                            <td>{{ $sites->municipio }}</td>
                            <td>{{ $sites->lugar }}</td>
                            <td><a href="{{ route('sitio.show', $sites) }}"> {{ $sites->nombre }}</a></td>


                            <td>{{ $sites->descripcion }}</td>
                            <td>
                                <div class="imagen">
                                    <img class=" img-fluid" src="{{ asset('img/' . $sites->foto) }}" alt="">
                                </div>
                            </td>
                            <td class="grid">
                                <a href="{{ route('sitio.edit', $sites->id) }}" class="btn btn-secondary">
                                    <i class="far fa-edit"></i></a>
                                <form action="{{ route('sitio.destroy', $site) }}" method="POST">
                                    @csrf @method('delete')
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $sites->links() }} --}}
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
