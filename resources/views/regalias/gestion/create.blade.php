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
                    <div class="form-group  col-md-12 ">
                        <label for="forInforme">Informe</label>
                        <input type="file" name="fileInforme" id="fileInforme" accept="application/pdf" />  
                    </div>
                    <div class="form-group  col-md-12 ">
                        <label class="control-label" for="name">Fecha Informe Inicio</label>
                        <input type="date" class="form-control" name="fecha_informe_inicio" placeholder="Fecha Informe Inicio" value="">
                    </div>
                    <div class="form-group  col-md-12 ">
                        <button type="submit" class="btn btn-primary save">Guardar</button>
                    </div>
                    <div class="form-group  col-md-12 ">          
                        <label class="control-label" for="name">Fecha Informe Final</label>
                        <input type="date" class="form-control" name="fecha_informe_final" placeholder="Fecha Informe Final" value="">
                    </div>
                    <div class="form-group  col-md-12 ">
                        <label class="control-label" for="name">Valor</label>
                        <input type="number" class="form-control" name="valor" required="" step="any" placeholder="Valor" value="">
                    </div>
                </form>
            </div>
        @endsection
