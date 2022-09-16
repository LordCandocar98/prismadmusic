@extends('layouts.master')

@section('addBreadcrumbs')
    <li class="active">
        <i class="fa fa-bar-chart" aria-hidden="true"></i> Clientes Historico Colaboraciones
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-bar-chart" aria-hidden="true"></i>
        Clientes Historico Colaboraciones
    </h1>
@endsection
@section('content')
    <div class="col-md-12">  
        <div class="panel panel-bordered"> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatable" name="datatable" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Correo</th>
                                <th>Avatar</th>
                                <th>Estado del registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js\jsHistoricoCancion\scriptIndexHistorico.js') }}"></script>
@endsection
