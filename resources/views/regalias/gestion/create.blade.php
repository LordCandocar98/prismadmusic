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
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all('<li>:message</li>') as $message)
                                        {!! $message !!}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @csrf
                    <fieldset>
                        <legend>CARGA DE INFORME</legend>
                        <div class="form-group  col-md-12 ">
                            <label for="idcancion">Cancion</label>
                            <select class="cancion col-md-12" name="idcancion" id="idcancion">
                            </select>
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="forInforme">Informe</label>
                            <input type="file" class="form-control" name="fileInforme" id="fileInforme"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </div>
                        <div class="form-group col-md-12 ">
                            <label class="control-label" for="name">Fecha Informe Inicio</label>
                            <input type="date" class="form-control" name="fecha_informe_inicio" id="fecha_informe_inicio"
                                placeholder="Fecha Informe Inicio"
                                value="{{ old('fecha_informe_inicio', date('d/m/Y')) }}">
                        </div>
                        <div class="form-group col-md-12 ">
                            <label class="control-label" for="name">Fecha Informe Final</label>
                            <input type="date" class="form-control" name="fecha_informe_final"
                                placeholder="Fecha Informe Final" value="{{ old('fecha_informe_final', date('d/m/Y')) }}">
                        </div>

                        <div class="form-group col-md-12 {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label class="control-label" for="name">Valor</label>
                            <input type="text" name="valor" id="valor" class="valor form-control" step="any"
                                value="{{ old('valor') }}" />
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
    <script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
    <script src="{{ asset('js/jsNomina/gestion/scriptCreate.js') }}"></script>
    <script src="{{ asset('js/jsRegalias/gestion/scriptCreate.js') }}"></script>
@endsection
