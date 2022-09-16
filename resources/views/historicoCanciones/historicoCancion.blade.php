@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
@endsection
@section('addBreadcrumbs')
    <li class="active">
        <i class="voyager-plus" aria-hidden="true"></i></i> Historico Canción
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Historico Canción
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form action="{{ url('/hitorico-cancion/store') }}" method="POST">
                    @csrf
                    <fieldset>
                        <legend>CANCIÓN</legend>
                        <div class="form-group col-md-12">
                            <label for="idCancion">Titulo</label>
                            <select class="cliente col-md-12" name="idCancion" id="idCancion" readonly>
                                <option value="{{ $cancion->id }}">
                                    {{ $cancion->titulo}}
                                </option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>INFORMACIÓN A CARGAR</legend>
                        <div class="form-group col-md-12">
                            <label for="annio">Año</label>
                            <select class="cliente col-md-12" name="annio" id="annio" required>
                                @foreach ($annios as $annio)
                                <option value="{{ $annio->id }}" selected>
                                    {{ $annio->descripcion }}
                                </option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="mes">Mes</label>
                            <select class="cliente col-md-12" name="mes" id="mes" required>
                                <option value="1">
                                    Enero
                                </option>
                                <option value="2">
                                    Febrero
                                </option>
                                <option value="3">
                                    Marzo
                                </option>
                                <option value="4">
                                    Abril
                                </option>
                                <option value="5">
                                    Mayo
                                </option>
                                <option value="6">
                                    Junio
                                </option>
                                <option value="7">
                                    Julio
                                </option>
                                <option value="8">
                                    Agosto
                                </option>
                                <option value="9">
                                    Septiembre
                                </option>
                                <option value="10">
                                    Octubre
                                </option>
                                <option value="11">
                                    Noviembre
                                </option>
                                <option value="12">
                                    Diciembre
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label" for="valor">Valor</label>
                            <input type="text" name="valor" id="valor" class="valor form-control" step="any" required/>
                        </div>
                        <div class="form-group col-md-12">
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
    <script>
        $('#idCancion').select2();
        $('#annio, #mes').select2({
            allowClear: true,
            placeholder:  {
                id: -1,
                text: 'Seleccione una opción'
            }
        });
        $('#annio, #mes').val('-1').trigger('change');
        
        
        
        $('.valor').inputmask('decimal', {
            'alias': 'numeric',
            'groupSeparator': ',',
            'autoGroup': true,
            'digits': 2,
            'radixPoint': ".",
            'digitsOptional': false,
            'allowMinus': false,
            'prefix': 'USD ',
            'placeholder': '0',
            'numericInput': true,
            'removeMaskOnSubmit': true,
            'rightAlign': false
        });
    </script>
@endsection
