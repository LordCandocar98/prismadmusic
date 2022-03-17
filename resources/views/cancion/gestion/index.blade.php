@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('cancion.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Canciones</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Gestion de Canciones
    </h1>
    <a href="{{ route('cancion.create') }}" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Crear</span>
    </a>
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
                                <th class="text-center">Tipo de colaboracion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($canciones as $cancion)
                            <tr role="row">
                                <td class="text-center">{{ $cancion->titulo}}</td>
                                <td class="text-center">{{ $cancion->genero}}</td>
                                <td class="text-center">{{ $cancion->tipo_colaboracion }}</td>

                                <td class="text-center">
                                    <a href="{{ url('cancion/{'.$cancion->id.'}') }}" title="Ver" target="_blank" class="btn btn-sm btn-warning pull-right view">
                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                    </a>
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
