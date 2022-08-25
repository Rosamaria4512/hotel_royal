@extends('adminlte::page')

@section('title', 'Sitios')

@section('content_header')
    <h2>Editar sitios</h2>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('sitio.update', $site) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                Municipio:
                <input type="text" value="{{$site->municipio}}" placeholder="Ingrese municipio..." class="form-control" name="municipio">
                <small class="text-danger">{{ $errors->first('municipio') }} </small>
                Lugar:
                <input type="text" value="{{$site->lugar}}" placeholder="ingrese lugar" class="form-control" name="lugar">
                <small class="text-danger">{{ $errors->first('lugar') }} </small>
                Nombre:
                <input type="text" value="{{$site->nombre}}" placeholder="Ingrese Nombre" class="form-control" name="nombre">
                <small class="text-danger">{{ $errors->first('nombre') }} </small>
                Direccion:
                <input type="text" value="{{$site->direccion}}" placeholder="Ingrese direccion" class="form-control" name="direccion">
                <small class="text-danger">{{ $errors->first('direccion') }} </small>
                Telefono:
                <input type="number" value="{{$site->telefono}}" placeholder="Ingrese direccion" class="form-control" name="telefono">
                <small class="text-danger">{{ $errors->first('telefono') }} </small>
                Correo:
                <input type="text" value="{{$site->correo}}" placeholder="Ingrese correo" class="form-control" name="correo">
                <small class="text-danger">{{ $errors->first('correo') }} </small>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <label for="">Fotografia:</label><br>
                    <span class="btn btn-secondary btn-file">
                        <i class="far fa-images"></i>
                        <input accept="image/*" onchange="vistaPrevia(event)" type="file" name="foto">
                    </span>
                    <small class="text-danger">{{ $errors->first('foto') }} </small>
                </div>
                <div class="imagen col-md-6 col-lg-6 col-sm-12">
                    <label for="">vista previa fotografia:</label><br>
                    <img src="" id="img-foto" alt="">
                </div>

                Descripcion:
                <input type="text"value="{{$site->descripcion}}"  placeholder="haga una descripcion" class="form-control" name="descripcion">
                <small class="text-danger">{{ $errors->first('descripcion') }} </small>
                Tipo actividad :
                <input type="text" value="{{$site->tipo_actividad}}" placeholder="ingrese actividad" class="form-control" name="tipo_actividad">
                <small class="text-danger">{{ $errors->first('tipo_actividad') }} </small>
                Horario de atencion
                <input type="time" value="{{$site->horario_atencion}}" placeholder="Ingrese horario" class="form-control" name="horario_atencion">
                <small class="text-danger">{{ $errors->first('horario_atencion') }} </small>
                Estado:
                <input type="number" value="{{$site->estado}}" placeholder="Ingrese estado" class="form-control" name="estado">
                <small class="text-danger">{{ $errors->first('estado') }} </small><br>


                <div class="col-md-12-mt-4 text-center">
                    <button type="submit" class="btn btn-danger">Editar</button>
                </div>


            </form>
        </div>
    </div>
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
