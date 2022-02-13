@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('regalias.index') }}"><i class="voyager-wallet" aria-hidden="true"></i> Gestion de Regalias</a>
    </li>
    <li class="active">
        <a href="{{ url('regalias/'.$regalia->id) }}"><i class="voyager-edit" aria-hidden="true"></i></i> Editar Regalia</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-edit" aria-hidden="true"></i>
        Editar Regalia
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form enctype="multipart/form-data" action="{{ url('regalias/'.$regalia->id)}}" method="post" >
                    {!! method_field('PUT') !!}
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
                            <label for="forNombres">Cliente</label>
                            <select class="cliente col-md-12" name="idCliente" id="idCliente">
                                <option value="{{ $client->id }}" selected>{{ $persona->numero_identificacion." - ".$persona->nombre." ".$persona->apellido }}</option>
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
                            <input type="date" class="form-control" name="fecha_informe_inicio" id="fecha_informe_inicio" placeholder="Fecha Informe Inicio" value="{{ $regalia->fecha_informe_inicio }}">
                        </div>
                        <div class="form-group  col-md-12 ">          
                            <label class="control-label" for="name">Fecha Informe Final</label>
                            <input type="date" class="form-control" name="fecha_informe_final" placeholder="Fecha Informe Final" value="{{ $regalia->fecha_informe_final }}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Valor</label>
                            <input type="number" class="form-control" name="valor" required="" step="any" placeholder="Valor" value="{{ $regalia->valor }}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <button type="submit" class="btn btn-primary save">Guardar</button>
                            <a href="{{ route('regalias.index') }}" title="cancelar" class="btn btn-danger pull-right">
                                Cancelar
                            </a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptEdit.js') }}"></script>
@endsection