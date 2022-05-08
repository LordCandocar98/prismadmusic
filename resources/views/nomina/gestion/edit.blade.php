@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-university" aria-hidden="true"></i></i> Gestion de
            Nominas</a>
    </li>
    <li class="active">
        <a href="{{ route('nomina.create') }}"><i class="voyager-edit" aria-hidden="true"></i></i> Editar Nomina</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-edit" aria-hidden="true"></i>
        Cargar Nomina
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form enctype="multipart/form-data" action="{{ url('nomina/' . $nomina->id) }}" method="post">
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
                        <legend>CARGA DE DESPRENDIBLE</legend>
                        <div class="form-group  col-md-12 ">
                            <label for="forNombres">Cliente</label>
                            <select class="cliente col-md-12" name="idCliente" id="idCliente">
                                <option value="{{ $client->id }}" selected>
                                    {{ $persona->numero_identificacion . ' - ' . $persona->nombre . ' ' . $persona->apellido }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="forDesprendible">Desprendible</label>
                            <input type="file" class="form-control" name="fileDesprendible" id="fileDesprendible"
                                accept="application/pdf" />
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Fecha Desprendible</label>
                            <input type="date" class="form-control" name="fecha_Desprendible" id="fecha_Desprendible"
                                placeholder="Fecha Desprendible" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="valor">Valor</label>
                            <input type="number" class="form-control" name="valor" id="valor" required="" step="any" readonly
                                placeholder="Valor" value="{{ $nomina->valor }}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <button type="submit" class="btn btn-primary save">Guardar</button>
                            <a href="{{ route('nomina.index') }}" title="cancelar" class="btn btn-danger pull-right">
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
