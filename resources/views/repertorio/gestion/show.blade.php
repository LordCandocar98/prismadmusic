@extends('layouts.master')

@section('addBreadcrumbs')
<li class="">
    <a href="{{ route('repertorio.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Repertorios</a>
</li>
<li class="active">
    <a href="{{ url('repertorio/'.$repertorio->id) }}"><i class="fa fa-file-audio-o" aria-hidden="true"></i> Ver Repertorio</a>
</li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i> Vista general de repertorio
    </h1>
    <a href="{{ route('repertorio.index') }}" class="btn btn-warning">
        <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">Volver a la lista</span>
    </a>
@endsection

@section('css')
    <style>
        .card-title {
            font-size: 2em;
        }

        .card-text {
            font-size: 1.2rem;
        }
        body, html, .form-control, th, td{
            color: #1e1f20!important;
        }
        .btn-link, .checkbox-inline, .checkbox label, .radio-inline, .radio label, label {
            font-weight: normal;
        }
    </style>
@endsection

@section('content')

<div class="container">
    @include('partials.message')
    @include('partials.error')
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
                        <span class="badge badge-success" style="float: right;font-size: 1.5rem;">Terminado</span>
                    @endif
                    @if($repertorio->terminado == 2)
                        <span class="badge badge-danger" style="float: right;font-size: 1.5rem;">Anulado</span>
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
            <div class="col-md-6">
                @if(($repertorio->terminado == 0) and ($users->id  == auth()->user()->id))

                <form action="{{ route('annulProduct', $repertorio->id) }}" method="post" id="form-Aproduct">
                    @csrf    
                    <input class="btn btn-danger float-left" style="margin: 1em;" id="btnAnnulProduct" type="submit" value="Anular Producto">
                </form>

                @endif
            </div>
            <div class="col-md-6">
                @if(($repertorio->terminado == 0) and ($users->id  == auth()->user()->id) and (count($canciones)>1))

                <form action="{{ route('finishProduct', $repertorio->id) }}" method="post" id="form-fproduct">
                    @csrf
                    <input class="btn btn-success float-right" style="margin: 1em;" id="btnFinishProduct" type="submit" value="Finalizar Producto">
                </form>

                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h5 class="card-title"><i class="fa fa-headphones" aria-hidden="true"></i> Música</h5>

            @if(($repertorio->terminado == 0) and ($users->id  == auth()->user()->id))
                <a class="btn btn-primary float-right mb-3" href="{{ route('create_song', $repertorio->id) }}">Agregar canción</a>
            @endif
        </div>

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
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#btnFinishProduct").click(function(event){
        event.preventDefault();
        event.stopPropagation();

        let form = $('#form-fproduct');
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            text: "Soy consciente de que una vez finalizado no podré hacer modificaciones.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $("#btnAnnulProduct").click(function(event){
        event.preventDefault();
        event.stopPropagation();

        let form = $('#form-Aproduct');
        Swal.fire({
            title: '¿Quieres anular o cancelar el repertorio?',
            text: "Soy consciente que al cancelar no podré hacer modificaciones y no será tomada en cuenta.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>

@endsection
