@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('regalias.index') }}"><i class="voyager-wallet" aria-hidden="true"></i> Gestion de Regalias</a>
    </li>
    <li class="active">
        <a href="{{ route('regalias.create') }}"><i class="voyager-plus" aria-hidden="true"></i></i> Crear Regalia</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Crear Regalia
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form enctype="multipart/form-data" action="{{ route('regalias.store') }}" method="POST">
                    @csrf                        
                    <fieldset>
                        <legend>CARGA DE INFORME</legend>
                        <div class="form-group  col-md-12 ">
                            <label for="forNombres">Cliente</label>
                            <select class="cliente col-md-12" name="idCliente" id="idCliente" >
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->numero_identificacion." - ".$cliente->nombre." ".$cliente->apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="forInforme">Informe</label>
                            <input type="file" class="form-control" name="fileInforme" id="fileInforme" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Fecha Informe Inicio</label>
                            <input type="date" class="form-control" name="fecha_informe_inicio" id="fecha_informe_inicio" placeholder="Fecha Informe Inicio" value="">
                        </div>
                        <div class="form-group  col-md-12 ">          
                            <label class="control-label" for="name">Fecha Informe Final</label>
                            <input type="date" class="form-control" name="fecha_informe_final" placeholder="Fecha Informe Final" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Valor</label>
                            <input type="number" class="form-control" name="valor" required="" step="any" placeholder="Valor" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <button type="submit" class="btn btn-primary save">Guardar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptCreate.js') }}"></script>
@endsection