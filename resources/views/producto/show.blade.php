@extends('layouts.master')
@section('addBreadcrumbs')
<li class="active">
    <a href="{{ route('producto.index') }}"><i class="voyager-lab" aria-hidden="true"></i> Gestion de productos</a>
</li>
@endsection
@section('page_header')
<h1 class="page-title">
    <i class="voyager-lab" aria-hidden="true"></i>
    Gestion del Repertorio "{{$repertorio->titulo}}"
</h1>
@endsection
@section('content')
<div class="col-md-12">
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ Storage::url('$repertorio->portada') }}" class="card-img-top" alt="Imagen de portada del repertorio">
                            <div class="card-body">
                                <h3>{{$repertorio->titulo}}</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Versión: </b>{{$repertorio->version}}</li>
                                    <li class="list-group-item"><b>Genero: </b>{{$repertorio->genero}}</li>
                                    <li class="list-group-item"><b>Subgenero: </b>{{$repertorio->subgenero}}</li>
                                    <li class="list-group-item"><b>Fecha salida: </b>{{$repertorio->fecha_lanzamiento}}</li>
                                    <li class="list-group-item"><b>Fecha producción: </b>{{$repertorio->annio_produccion}}</li>
                                    <li class="list-group-item"><b>Productor: </b>{{$repertorio->productor}}</li>
                                    <li class="list-group-item"><b>Copyright: </b>{{$repertorio->copyright}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        @if(count($canciones)>0)
                        <h4>Lista de canciones</h4>
                        <ul class="list-group list-group-flush">
                            <div class="table-responsive">
                                <table id="dataTableCancion" name="dataTableProducto" class="display" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">titulo</th>
                                            <th class="text-center">Versión subtitulada</th>
                                            <th class="text-center">Autor</th>
                                            <th class="text-center">Compositor</th>
                                            <th class="text-center">Arreglista</th>
                                            <th class="text-center">Productor</th>
                                            <th class="text-center">Pline</th>
                                            <th class="text-center">Año de producción</th>
                                            <th class="text-center">Genero</th>
                                            <th class="text-center">Subgenero</th>
                                            <th class="text-center">Genero secundario</th>
                                            <th class="text-center">Subgenero secundario</th>
                                            <th class="text-center">Letra chocante o vulgar</th>
                                            <th class="text-center">Inicio de previsualización</th>
                                            <th class="text-center">Idioma del titulo</th>
                                            <th class="text-center">Idioma de la letra</th>
                                            <th class="text-center">Fecha principal</th>
                                            <th class="text-center">Pista</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($canciones as $key => $cancion)
                                        <tr role="row">
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center">{{ $cancion->titulo }}</td>
                                            <td class="text-center">{{ $cancion->version_subtitulo }}</td>
                                            <td class="text-center">{{ $cancion->autor }}</td>
                                            <td class="text-center">{{ $cancion->compositor }}</td>
                                            <td class="text-center">{{ $cancion->arreglista }}</td>
                                            <td class="text-center">{{ $cancion->productor }}</td>
                                            <td class="text-center">{{ $cancion->pline }}</td>
                                            <td class="text-center">{{ $cancion->annio_produccion }}</td>
                                            <td class="text-center">{{ $cancion->genero }}</td>
                                            <td class="text-center">{{ $cancion->subgenero }}</td>
                                            <td class="text-center">{{ $cancion->genero_secundario }}</td>
                                            <td class="text-center">{{ $cancion->subgenero_secundario }}</td>
                                            <td class="text-center">{{ $cancion->letra_chocante_vulgar }}</td>
                                            <td class="text-center">{{ $cancion->inicio_previsualizacion }}</td>
                                            <td class="text-center">{{ $cancion->idioma_titulo }}</td>
                                            <td class="text-center">{{ $cancion->idioma_letra }}</td>
                                            <td class="text-center">{{ $cancion->fecha_principal_salida }}</td>
                                            <td class="text-center center">
                                                Boton de la cancion {{$cancion->pista_mp3}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </ul>
                        @else
                        <h4>Repertorio sin canciones</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/jsProducto/scriptIndex.js') }}"></script>
@endsection
