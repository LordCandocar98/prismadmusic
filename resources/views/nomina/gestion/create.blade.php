@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-university" aria-hidden="true"></i></i> Gestion de Nominas</a>
    </li>
    <li class="active">
        <a href="{{ route('nomina.create') }}"><i class="voyager-plus" aria-hidden="true"></i></i> Crear Nomina</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Crear Nomina
    </h1>
@endsection
@section('content')
<div class="col-md-12">
    <div class="panel panel-bordered">
        <div class="panel-body">
            <form enctype="multipart/form-data" action="{{ route('nomina.store') }}" method="POST">
                @csrf                        
                <fieldset>
                    <legend>CARGA DE DESPRENDIBLE</legend>
                    <div class="form-group  col-md-12 ">
                        <label for="forNombres">Cliente</label>
                        <select class="cliente col-md-12" name="idCliente" id="idCliente" >
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->numero_identificacion." - ".$cliente->nombre." ".$cliente->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  col-md-12 ">
                        <label class="control-label" for="forDesprendible">Desprendible</label>
                        <input type="file" class="form-control" name="fileDesprendible" id="fileDesprendible" accept="application/pdf" />
                    </div>
                    <div class="form-group  col-md-12 ">
                        <label class="control-label" for="name">Fecha Desprendible</label>
                        <input type="date" class="form-control" name="fecha_Desprendible" id="fecha_Desprendible" placeholder="Fecha Desprendible" value="">
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
    <script src="{{ asset('js/jsNomina/gestion/scriptCreate.js') }}"></script>
@endsection