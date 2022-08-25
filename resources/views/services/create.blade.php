@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h2>Registro de servicios</h2>
@stop

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <form action="{{ route('servicio.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        Servicio:
        <input type="text" placeholder="Ingrese el nombre del servicio..." class="form-control" name="servicio">
        <small class="text-danger">{{ $errors->first('servicio') }} </small>

        Precio:
        <input type="text" placeholder="precio del servicio" class="form-control" name="precio">
        <small class="text-danger">{{ $errors->first('precio') }} </small>

        <div class="col-md-6 col-lg-6 col-sm-12">
            <label for="">Fotografia:</label><br>
            <span class="btn btn-secondary btn-file">
                <i class="far fa-images"></i>
                <input accept="image/*" onchange="vistaPrevia(event)" type="file"  name="foto">
            </span>
            <small class="text-danger">{{ $errors->first('foto') }} </small>
        </div>
        <div class="imagen col-md-6 col-lg-6 col-sm-12">
            <label for="">vista previa fotografia:</label><br>
            <img src="" id="img-foto" alt="">
        </div>

        Sitio:
        <select name="sites_id" class="form-control">
            <option selected="true" disabled="disabled">Seleccione un sitio </option>
            @foreach ($sitios as $sitio)
                <option value="{{ $sitio->id }}">{{ $sitio->nombre }}</option>
            @endforeach
        </select>
        <small class="text-danger">{{ $errors->first('sites_id') }}</small><br>

        <div class="col-md-12-mt-4 text-center">
            <button type="submit" class="btn btn-danger">Registrar</button>
        </div>


    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
            width: 100px;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .btn-file i {
            font-size: 23px;
        }

        .imagen img {
            max-width: 100%;
            max-height: 50vh;
        }
    </style>
@stop

@section('js')
    <script>
        function ocultarAlerta() {
            document.querySelector(".alert").style.display = 'none';
        }
        setTimeout(ocultarAlerta, 3000);

        // vista previa de la imagen
        let vistaPrevia = () => {
            let leerImg = new FileReader();
            let id_img = document.getElementById('img-foto');
            leerImg.onload = () => {
                if (leerImg.readyState == 2) {
                    id_img.src = leerImg.result;
                }
            }
            leerImg.readAsDataURL(event.target.files[0])
        }
    </script>
@stop
