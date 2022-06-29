@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('producto.index') }}"><i class="voyager-lab" aria-hidden="true"></i> Gestion de Repertorios</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-lab" aria-hidden="true"></i>
        Gestion de productos
    </h1>
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
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Formato</th>
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
                                <td class="text-center">{{ $rep->formato }}</td>
                                <td class="text-center">{{ $rep->genero }}</td>
                                <td class="text-center">{{ $rep->subgenero }}</td>
                                <td class="text-center">{{ $rep->annio_produccion }}</td>
                                <td class="text-center center">
                                    @if($rep->procesado == 0)
                                    <a href="{{ url('producto/'.$rep->id) }}" title="Procesar" class="btn btn-sm btn-warning pull-right view">
                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Procesar</span>
                                    </a>
                                    @else
                                    <span class="label label-success">Procesado</span>
                                    @endif
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
