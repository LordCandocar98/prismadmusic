@extends('layouts.master')
@section('css')
<style>
    .card-title {
        font-size: 2em;
    }

    .card-text {
        font-size: 1.2rem;
    }

</style>
@endsection
@section('addBreadcrumbs')
<div class="active">
    <a href="{{ route('repertorio.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Repertorios</a>
</div>
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

<div class="container">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ url('storage/portadas/'.$repertorio->portada) }}" alt="Portada"
                    style="width: 100%;height: auto;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $repertorio->titulo }}</h5>
                    <p class="card-text">{{ $repertorio->version }}</p>
                    <div class="row">
                        <div class="col-md-4" style="margin-bottom: 0;">
                            <div><b>Versión:</b> {{ $repertorio->version }}</div>
                            <div><b>Genero:</b> {{ $repertorio->genero }}</div>
                            <div><b>Subgenero:</b> {{ $repertorio->subgenero }}</div>
                            <div><b>Nombre del sello:</b> {{ $repertorio->nombre_sello }}</div>
                            <div><b>Formato:</b> {{ $repertorio->formato }}</div>
                            <div><b>Productor:</b> {{ $repertorio->productor }}</div>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 0;">
                            <div><b>Copyright:</b> {{ $repertorio->copyright }}</div>
                            <div><b>Año de producción:</b> {{ $repertorio->annio_produccion }}</div>
                            <div><b>UPC/EAN:</b> {{ $repertorio->upc_ean }}</div>
                            <div><b>Fecha de lanzamiento:</b> {{ $repertorio->numero_catalogo }}</div>
                            <div><b>Numero de catalogo</b> {{ $repertorio->fecha_lanzamiento }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fa fa-headphones" aria-hidden="true"></i> Música</h5>
            @if( (count($canciones)<1 and $repertorio->formato == 'SINGLE') or (count($canciones)<6 and $repertorio->formato == 'EP') or $repertorio->formato == 'ALBUM')
                <a class="btn btn-primary float-right mb-3" href="{{ route('create_song', $repertorio->id) }}">Agregar canción</a>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($canciones as $key => $cancion)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $cancion->titulo }}</td>
                        <td>{{ $cancion->autor }}</td>
                        <td style="width: 1px;">
                            <audio controls src="{{ url('storage/canciones/'.$cancion->pista_mp3) }}"></audio>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
@endsection
