@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
@endsection
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-university" aria-hidden="true"></i></i> Gestion de
            Nominas</a>
    </li>
    <li class="active">
        <a href="{{ route('nomina.create') }}"><i class="voyager-plus" aria-hidden="true"></i></i> Solicitar pago</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Solicitar pago
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form action="{{ route('nomina.store') }}" method="POST">
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
                        <legend>FORMULARIO DE SOLICITUD DE PAGO</legend>
                        <div class="form-group col-md-12 {{ $errors->has('idCliente') ? 'has-error' : '' }}">
                            <label for="forNombres">Cliente</label>
                            <select class="cliente col-md-12" name="idCliente" id="idCliente">
                                <option value="{{ $cliente->id_cliente }}">
                                    {{ $cliente->numero_identificacion . ' - ' . $cliente->nombre . ' ' . $cliente->apellido }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('tipo_cuenta') ? 'has-error' : '' }}">
                            <label for="tipo_cuenta">Tipo de cuenta</label>
                            <select class="tipo col-md-12" name="tipo_cuenta" id="tipo_cuenta">
                                <option value="Ahorros">Ahorros</option>
                                <option value="Corriente">Corriente</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('nombre_banco') ? 'has-error' : '' }}">
                            <label class="control-label" for="nombre_banco">Nombre del banco</label>
                            <input type="text" class="form-control" name="nombre_banco" step="any"
                                placeholder="Nombre del banco" value="{{ old('nombre_banco') }}">
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('numero_cuenta') ? 'has-error' : '' }}">
                            <label class="control-label" for="numero_cuenta">Número de cuenta</label>
                            <input type="text" class="form-control" name="numero_cuenta" step="any"
                                placeholder="Número de cuenta" value="{{ old('numero_cuenta') }}">
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label class="control-label" for="name">Valor</label>
                            <input type="text" name="valor" id="valor" class="valor form-control" step="any" value="{{ old('valor') }}" />
                        </div>

                        {{-- <input-mask class="form-control" alias="currency" prefix="$ "></input-mask> --}}
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary save">Solicitar</button>
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
    <script>
        $('.valor').inputmask('decimal', {
            'alias': 'numeric',
            'groupSeparator': '.',
            'autoGroup': true,
            'digits': 0,
            'radixPoint': ",",
            'digitsOptional': false,
            'allowMinus': false,
            'prefix': 'USD ',
            'placeholder': '0',
            'numericInput': true,
            'removeMaskOnSubmit': true,
            'rightAlign' : false
        });
    </script>
@endsection
