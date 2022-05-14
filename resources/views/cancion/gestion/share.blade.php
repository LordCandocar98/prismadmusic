@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('shareSong') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Canciones</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Colaboración de Canciones
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTableShare" name="dataTableShare" class="dataTables_wrapper form-inline dt-bootstrap no-footer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Título</th>
                                <th class="text-center">Género</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($colas as $cola)
                        <tr role="row">
                            <td class="text-center">{{ $cola->titulo}}</td>
                            <td class="text-center">{{ $cola->genero}}</td>
                            <td class="text-center">{{ $cola->annio_produccion }}</td>
                            <td class="text-center">{{ $cola->porcentaje_intelectual }}</td>
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
