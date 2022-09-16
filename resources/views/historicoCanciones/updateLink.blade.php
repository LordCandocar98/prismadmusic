@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
@endsection
@section('addBreadcrumbs')
    <li class="active">
        <i class="voyager-plus" aria-hidden="true"></i></i> Carga Link Preguardado
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Carga Link Preguardado
    </h1>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form action="{{ url('/hitorico-cancion/update/' . $cancion->id) }}" method="POST">
                    {!! method_field('PUT') !!}
                    @csrf
                    <fieldset>
                        <legend>CARGA LINK PREGUARDADO</legend>
                        <div class="form-group col-md-12">
                            <label for="idCliente">Cliente</label>
                            <select class="cliente col-md-12" name="idCliente" id="idCliente" readonly>
                                <option value="{{ $user->id }}" selected>
                                    {{ $persona->nombre . " " . $persona->apellido }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="titulo">Titulo</label>
                            <select class="cliente col-md-12" name="titulo" id="titulo" readonly>
                                <option value="{{ $cancion->id }}">
                                    {{ $cancion->titulo}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label" for="linkPreguardado">Link Preguardado</label>
                            <input type="text" class="form-control" id="linkPreguardado" name="linkPreguardado" placeholder="Link Preguardado" value="" required>
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
        $('#titulo, #idCliente').select2();
    </script>
@endsection
