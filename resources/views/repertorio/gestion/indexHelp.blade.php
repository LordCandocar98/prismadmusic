@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('repertorio.index') }}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> Sube tu canción</a>
    </li>
@endsection

@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
        Sube Tu Canción
    </h1>
    <a href="{{ route('repertorio.create') }}" class="btn btn-success">Crear Repertorio</a>
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
<div class="col-md-12">
    <div class="panel panel-bordered">
        <div class="panel-body">
            @include('partials.message')
            @include('partials.error')

            <div class="row">
                <div class="col-md-12">
                    <h4>Repertorio Existente</h4>
                    <table id="dataTableRegalias" name="dataTableRegalias"
                        class="dataTables_wrapper form-inline dt-bootstrap no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Título</th>
                                <th class="text-center">Género</th>
                                <th class="text-center">Subir Canción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repertorios as $repertorio)
                            <tr role="row">
                                <td class="text-center">{{ $repertorio->titulo}}</td>
                                <td class="text-center">{{ $repertorio->genero}}</td>
                                <td class="text-center">
                                    <a href="{{ route('create_song', $repertorio->id) }}" class="btn btn-primary">Agregar Canción</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptIndex.js') }}"></script>
@endsection
