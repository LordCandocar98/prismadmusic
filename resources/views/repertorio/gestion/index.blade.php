@extends('layouts.master')
@section('addBreadcrumbs')
<li class="active">
    <a href="{{ route('repertorio.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Repertorios</a>
</li>
@endsection

@section('page_header')
<h1 class="page-title">
    <i class="fa fa-music" aria-hidden="true"></i>
    Subir Tu Canción
</h1>
<a href="{{ route('repertorio.create') }}" class="btn btn-success btn-add-new">
    <i class="voyager-plus"></i> <span>Crear</span>
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

    body,
    html,
    .form-control,
    th,
    td {
        color: #1e1f20 !important;
    }

    .btn-link,
    .checkbox-inline,
    .checkbox label,
    .radio-inline,
    .radio label,
    label {
        font-weight: normal;
    }
</style>
@endsection

@section('content')
<div class="col-md-12">
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="table-responsive">
                <table id="dataTableRegalias" name="dataTableRegalias" class="dataTables_wrapper form-inline dt-bootstrap no-footer" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Título</th>
                            <th class="text-center">Género</th>
                            <th class="text-center">Tipo de colaboración</th>
                            <th class="text-center">Año de producción</th>
                            <th class="text-center">Completado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repertorios as $repertorio)
                        <tr role="row">
                            <td class="text-center">{{ $repertorio->titulo}}</td>
                            <td class="text-center">{{ $repertorio->genero}}</td>
                            <td class="text-center">{{ $repertorio->tipo_colaboracion }}</td>
                            <td class="text-center">{{ $repertorio->annio_produccion }}</td>
                            <td class="text-center">
                                @if($repertorio->terminado == 2)
                                <i class="fa fa-times" aria-hidden="true"></i>
                                @elseif($repertorio->terminado == 1)
                                <i class="fa fa-check" aria-hidden="true"></i>
                                @else
                                <i class="fa fa-minus" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <div>
                                    @if($repertorio->terminado == 1)
                                    <a href="{{ url('repertorio/'.$repertorio->id) }}" title="Ver" class="btn btn-sm btn-info view">
                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                    </a>
                                    @else
                                    <a href="{{ url('repertorio/'.$repertorio->id) }}" title="Editar" class="btn btn-sm btn-warning view">
                                        <i class="voyager-pen"></i> <span class="hidden-xs hidden-sm">Editar</span>
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
@endsection