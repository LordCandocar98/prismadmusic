@extends('layouts.master')
@section('addBreadcrumbs')
<li class="active">
    <a href="{{ route('producto.index') }}"><i class="voyager-lab" aria-hidden="true"></i> Gestion de Repertorio</a>
</li>
@endsection
@section('page_header')
<h1 class="page-title">
    <i class="voyager-lab" aria-hidden="true"></i>
    Gestión del Producto - "{{$repertorio->titulo}}"
</h1>
@endsection
@section('content')

<div class="container">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ url('storage/portadas/min'.$repertorio->portada) }}" alt="Portada"
                    style="width: 100%;height: auto;">
                    @if(auth()->user()->role_id == 3)
                    <a style="margin-top: 10px;" href="{{ url('storage/portadas/'.$repertorio->portada) }}" download="{{$repertorio->portada}}">
                        Descargar Caratula <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                    @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    @if($repertorio->terminado == 1)
                        <span class="badge badge-secondary badge-success" style="float: right;font-size: 1.5rem;">Terminado</span>
                    @endif
                    <h5 class="card-title">{{ $repertorio->titulo }}</h5>
                    <p class="card-text">{{ $repertorio->version }}</p>
                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 0;">
                            <div><b>Versión:</b> {{ $repertorio->version }}</div>
                            <div><b>Género:</b> {{ $repertorio->genero }}</div>
                            <div><b>Subgénero:</b> {{ $repertorio->subgenero }}</div>
                            <div><b>Nombre del sello:</b> {{ $repertorio->nombre_sello }}</div>
                            <div><b>Formato:</b> {{ $repertorio->formato }}</div>
                            <div><b>Productor:</b> {{ $repertorio->productor }}</div>
                        </div>
                        <div class="col-md-6" style="margin-bottom: 0;">
                            <div><b>Copyright:</b> {{ $repertorio->copyright }}</div>
                            <div><b>Año de producción:</b> {{ $repertorio->annio_produccion }}</div>
                            <div><b>UPC/EAN:</b> {{ $repertorio->upc_ean }}</div>
                            <div><b>Fecha de lanzamiento:</b> {{ $repertorio->fecha_lanzamiento }}</div>
                            <div><b>Número de catálogo</b> {{ $repertorio->numero_catalogo }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(($repertorio->terminado == 0) and ($users->id  == auth()->user()->id) and (count($canciones)>1))

                <form action="{{ route('finishProduct', $repertorio->id) }}" method="get" id="form-fproduct">
                    <input class="btn btn-success float-right" style="margin: 2em;" id="btnFinishProduct" type="submit" value="Finalizar Producto">
                </form>

                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fa fa-headphones" aria-hidden="true"></i> Música</h5>

            @if(($repertorio->terminado == 0) and ($users->id  == auth()->user()->id))
                <a class="btn btn-primary float-right mb-3" href="{{ route('create_song', $repertorio->id) }}">Agregar canción</a>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Canción</th>
                        @if(auth()->user()->role_id == 3)
                        <th scope="col">Descargar</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($canciones as $key => $cancion)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $cancion->titulo }}</td>
                        <td>{{ $cancion->autor }}</td>
                        <td style="width: 1px;">
                            <audio controls src="{{ url('storage/canciones/'.$cancion->pista_mp3) }}"></audio>
                        </td>
                        @if(auth()->user()->role_id == 3)
                        <td style="text-align: center;font-size: 1.5rem;">
                            <a href="{{ url('storage/canciones/'.$cancion->pista_mp3) }}" download="{{$cancion->titulo}}">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form enctype="multipart/form-data" action="{{ url('producto/' . $repertorio->id) }}" method="post">
                {!! method_field('PUT') !!}
                @csrf
                <div class="form-group  col-md-12">
                    <button type="submit" class="btn btn-primary save">Procesar</button>
                    <a href="{{ route("producto.index") }}" title="cancelar" class="btn btn-danger pull-right">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/jsProducto/scriptIndex.js') }}"></script>
@endsection
