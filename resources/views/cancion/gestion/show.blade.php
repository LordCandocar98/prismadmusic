
@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('cancion.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Canciones</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Vista general de canción
    </h1>
    <a href="{{ route('cancion.index') }}" class="btn btn-warning">
        <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">Volver a la lista</span>
    </a>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Título</h3><br>
                        {{ $cancion->titulo }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Versión / Subtítulo</h3><br>
                        {{ $cancion->version_subtitulo }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Tipo secundario</h3><br>
                        {{ $cancion->tipo_secundario }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Instrumental</h3><br>
                        {{ $cancion->instrumental }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Autor</h3><br>
                        {{ $cancion->autor }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Compositor</h3><br>
                        {{ $cancion->compositor }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Arreglista</h3><br>
                        {{ $cancion->arreglista }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Productor</h3><br>
                        {{ $cancion->productor }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Pline</h3><br>
                        {{ $cancion->pline }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Año de producción</h3><br>
                        {{ $cancion->annio_produccion }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Género</h3><br>
                        {{ $cancion->genero }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Subgénero</h3><br>
                        {{ $cancion->subgenero }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Género secundario</h3><br>
                        {{ $cancion->genero_secundario }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Subgénero secundario</h3><br>
                        {{ $cancion->subgenero_secundario }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Letra chocante o vulgar</h3><br>
                        {{ $cancion->letra_chocante_vulgar }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Inicio de la previsualización</h3><br>
                        {{ $cancion->inicio_previsualizacion }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Idioma del título</h3><br>
                        {{ $cancion->idioma_titulo }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Idioma de la letra</h3><br>
                        {{ $cancion->idioma_letra }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <h3>Fecha principal de salida</h3><br>
                        {{ $cancion->fecha_principal_salida }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="alert alert-success text-start font-weight-bold" role="alert">
                            <p style="font-weight:bold">Colaboraciones:</p>
                            <ul>
                                @foreach ( $colaboraciones as $colaboracionesj)
                                @php $cliente = \App\Models\Cliente::find($colaboracionesj->cliente_id);@endphp
                                <br><li><a class="alert-link">Artista</a><br>{{ $cliente->nombre_artistico }}<br><a class="alert-link">Tipo de colaboración:</a> {{ $colaboracionesj->tipo_colaboracion }}  <a class="alert-link">Porcentaje intelectual:</a> {{ $colaboracionesj->porcentaje_intelectual }}%</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
@endsection
