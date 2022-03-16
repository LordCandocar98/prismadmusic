@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('producto.index') }}"><i class="voyager-lab" aria-hidden="true"></i> Gestion de productos</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-lab" aria-hidden="true"></i>
        Gestion de Repertorios
    </h1>
    <a href="{{ route('producto.create') }}" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Crear</span>
    </a>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div class="table-responsive">
                <table id="dataTableProducto" name="dataTableProducto" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">titulo</th>
                                <th class="text-center">Artista Principal</th>
                                <th class="text-center">Genero</th>
                                <th class="text-center">Subgenero</th>
                                <th class="text-center">Producción</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($repertorio as $key => $rep)
                        <tr role="row">
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{ $rep->titulo }}</td>
                                <td class="text-center">{{ $rep->artista_principal }}</td>
                                <td class="text-center">{{ $rep->genero }}</td>
                                <td class="text-center">{{ $rep->subgenero }}</td>
                                <td class="text-center">{{ $rep->annio_produccion }}</td>
                                <td class="text-center center">
                                    <a href="{{ url('producto/'.$rep->id) }}" title="Ver" class="btn btn-sm btn-warning pull-right view">
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
    <script src="{{ asset('js/jsProducto/scriptIndex.js') }}"></script>
@endsection
