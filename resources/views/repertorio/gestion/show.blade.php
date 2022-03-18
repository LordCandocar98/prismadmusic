
@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('repertorio.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Repertorios</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Vista general de repertorio
    </h1>
    <a href="{{ route('repertorio.index') }}" class="btn btn-warning">
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
                        {{ $repertorio->titulo }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Versión / Subtítulo</h3><br>
                        {{ $repertorio->version }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Género</h3><br>
                        {{ $repertorio->genero }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Subgénero</h3><br>
                        {{ $repertorio->subgenero }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Nombre del sello</h3><br>
                        {{ $repertorio->nombre_sello }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Formato</h3><br>
                        {{ $repertorio->formato }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Productor</h3><br>
                        {{ $repertorio->productor }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Copyright</h3><br>
                        {{ $repertorio->copyright }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Pline</h3><br>
                        {{ $repertorio->pline }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Año de producción</h3><br>
                        {{ $repertorio->annio_produccion }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Año de producción</h3><br>
                        {{ $repertorio->annio_produccion }}
                    </div>
                    <div class="col-sm-6">
                        <h3>UPC/EAN</h3><br>
                        {{ $repertorio->upc_ean }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <h3>Número de catálogo</h3><br>
                        {{ $repertorio->numero_catalogo }}
                    </div>
                    <div class="col-sm-6">
                        <h3>Fecha de lanzamiento</h3><br>
                        {{ $repertorio->fecha_lanzamiento }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="text-start font-weight-bold">
                            <p style="font-weight:bold">Colaboraciones</p>
                            <ul>
                                <table class="table">
                                    <thead>
                                        <thead>
                                            <tr>
                                              <th scope="col"><a class="alert-link">#</a></th>
                                              <th scope="col"><a class="alert-link">Artista</a></th>
                                              <th scope="col"><a class="alert-link">Tipo de colaboración</a></th>
                                              <th scope="col"><a class="alert-link">Spotify</a></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        @foreach ( $colaboraciones as $colaboracionesj)
                                            @php
                                                $usuario = \App\Models\User::where('email', $colaboracionesj->cliente_email)->first();
                                                $persona = \App\Models\Persona::where('user_id',$usuario->id)->first();
                                                $cliente = \App\Models\Cliente::where('persona_id',$persona->id)->first();
                                            @endphp
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $cliente->nombre_artistico }}</td>
                                                <td>{{ $colaboracionesj->tipo_colaboracion }}</td>
                                                <td>{{ $colaboracionesj->spotify_colaboracion }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
