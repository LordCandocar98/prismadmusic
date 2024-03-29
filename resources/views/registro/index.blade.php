@extends('registro.master')

@section('page_header')
<h1 class="page-title">
    <i class="fa fa-id-card-o" aria-hidden="true"></i>
    ¡Completa tu registro!
</h1>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
<style>
    .parrafo {
        font-size: 80%;
        text-align: justify;
        text-justify: inter-word;
        color: gray;
    }

    .identado {
        text-indent: 10px;
    }

    #canvas {
        border: 1px solid black;
    }

    .modal.in {
        display: flex !important;
        justify-content: center;
        align-items: center;
    }

    .modal-dialog-scrollable .modal-content {
        max-height: 100%;
        overflow: hidden;
    }

    .modal-dialog-scrollable .modal-body {
        overflow-y: auto;
        max-height: 400px;
    }

    body, html, .form-control{
        color: #1e1f20!important;
    }
    .iti{
        width: 100%;
    }
</style>
@endsection

@section('content')
<div class="col-md-12">
    <div class="panel panel-bordered">
        <div class="panel-body">
            <form enctype="multipart/form-data" action="{{ url($accion)}}" method="post" id="formRegistro" name="formRegistro">
            @if ($condicional_metodo == 1)
                {!! method_field('PATCH') !!}
            @endif
                <div class="col-md-12">
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
                <div class="modal-body">
                    @if ($message = Session::get('ErrorInsert'))
                    <div class="col-12 alert-danger alert-dissmissable fade show" role="alert">
                        <h5>Errores:</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="nombre">Nombre</label>
                            <br>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Ejemplo: Pepito" value="{{ old('nombre') }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido">Apellido</label>
                            <br>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Ejemplo: Pérez" value="{{ old('apellido') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="pais">País</label>
                            <br>
                            <select class="pais form-control" name="pais" id="pais">
                                @if(old('pais'))
                                    <option value="{{ old('pais') }}" selected>{{ old('pais') }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="departamento">Departamento</label>
                            <br>
                            <select class="departamento form-control" name="departamento">
                                @if(old('pais'))
                                    <option value="{{ old('departamento') }}" selected>{{ old('departamento') }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="ciudad">Ciudad</label>
                            <br>
                            <select class="ciudad form-control" name="ciudad">
                                @if(old('ciudad'))
                                    <option value="{{ old('ciudad') }}" selected>{{ old('ciudad') }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="tipoDoc">Tipo de documento de identificación</label>
                            <br>
                            <select class="tipoDNI col-md-12" name="tipo_documento" id="tipo_documento">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                                <option value="cc" {{ old('tipo_documento') == "cc" ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                <option value="tp" {{ old('tipo_documento') == "tp" ? 'selected' : '' }}>Pasaporte</option>
                                <option value="ce" {{ old('tipo_documento') == "ce" ? 'selected' : '' }}>Cédula de Extranjería</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="numIdent">Número de identificación</label>
                            <br>
                            <input type="text" class="form-control" id="numero_identificacion"
                                name="numero_identificacion" placeholder="Ejemplo: 1121962355"
                                value="{{ old('numero_identificacion') }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="telefono">Número de Celular</label>
                            <br>
                            <input type="tel" class="form-control" id="telefono" name="telefono" style="width: 100%;"
                                placeholder="Ejemplo: 3123254607" value="{{ old('telefono') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="nombreArtistico">Nombre Artístico</label>
                            <br>
                            <input type="text" class="form-control" id="nombre_artistico" name="nombre_artistico"
                                placeholder="Ejemplo: Maluma" value="{{ old('nombre_artistico') }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="linkSpoty">Link de Spotify</label>
                            <br>
                            <input type="text" class="form-control" id="link_spoty" name="link_spoty"
                                placeholder="Ejemplo: open.spotify.com/artist/XXX" value="{{ old('link_spoty') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="hidden" id="firma" name="firma" value="{{ old('firma') }}">

                        <!-- Checkboxes of Privacidad, TérminosyCond, Contratos -->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group-text">
                                    <input type="checkbox" id="acepta_TermsPrivCond" name="acepta_TermsPrivCond"
                                        value="1" />
                                    <label for="PrivTerm">Tengo 18 años o más y <a class="font-weight-bold"
                                            data-toggle="modal" data-target="#modalTerminosyCondiciones">Acepto los
                                            términos y condiciones</a> junto con la <a class="font-weight-bold"
                                            data-toggle="modal" data-target="#modalPolitica">Política de Privacidad de
                                            Prismad Music</a></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group-text">
                                    <input type="checkbox" id="acepta_Contrato" name="acepta_Contrato" value="1" />
                                    <label for="Contrato">Soy consciente y acepto el <a class="font-weight-bold"
                                            data-toggle="modal" data-target="#modalContrato">Acuerdo exclusivo de
                                            administración de derechos fonográficos</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="btn-snd" type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@include('registro.modal.tcondiciones')
@include('registro.modal.privacidad')
@include('registro.modal.contrato')
@endsection

@section('javascript')
<script src="{{ asset('js/signature_pad/signature_pad.js') }}"></script>
<script src="{{ asset('js/jsRegistroPersonas/scriptRegistro.js') }}"></script>
<script src="{{ asset('js/jsRegistroPersonas/scriptCanvas.js') }}"></script>

<script src="{{ asset('js/intlTelInput.js') }}"></script>
<script>
  var input = document.querySelector("#telefono");
  window.intlTelInput(input, {
    // any initialisation options go here
    initialCountry:"Co",
  });
</script>

@endsection
