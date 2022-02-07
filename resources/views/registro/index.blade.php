@extends('registro.master')

@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-id-card-o" aria-hidden="true"></i>
        ¡Completa tu registro!
    </h1>
@endsection

@section('css')
<style>
    .parrafo{
        font-size: 80%;
        text-align: justify;
        text-justify: inter-word;
        color: gray;
    }

    .identado {
        text-indent: 10px;
    }

    #canvas{
        border: 1px solid black;
    }

    .modal.in{
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
</style>
@endsection

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"> --}}
<div class="col-md-12">
    <div class="panel panel-bordered">
        <div class="panel-body">
                <form action="/registro" method="post" id="formRegistro" name="formRegistro">
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
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ejemplo: Pepito"
                                    value="{{ old('nombre') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="apellido">Apellido</label>
                                <br>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ejemplo: Pérez"
                                    value="{{ old('apellido') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="pais">País</label>
                                <br>
                                <select class="pais form-control" name="pais" id="pais">
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="departamento">Departamento</label>
                                <br>
                                <select class="departamento form-control" name="departamento"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="ciudad">Ciudad</label>
                                <br>{{--
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Bogotá"
                                    value="{{ old('ciudad') }}"> --}}
                                    <select class="ciudad form-control" name="ciudad"></select>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Tipo de documento de identificación</label>
                                <br>
                                <select class="tipoDNI col-md-12" name="tipo_documento" id="tipo_documento"
                                    value="{{ old('tipo_documento') }}">
                                    <option value="cc">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="tp">TP</option>
                                    <option value="ce">CE</option>
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
                                <label for="numCelular">Número de Celular</label>
                                <br>
                                <input type="text" class="form-control" id="telefono" name="telefono"
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

                        {{-- <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="nombre_banco">Nombre del Banco</label>
                                <br>
                                <input type="text" class="form-control" id="nombre_banco" name="nombre_banco"
                                    placeholder="Ejemplo: Bancolombia" value="{{ old('nombre_banco') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="archivo_banco">Certificación Bancaria</label>
                                <br>
                                <input type="text" class="form-control" id="archivo_banco" name="archivo_banco"
                                value="{{ old('archivo_banco') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoCuenta">Tipo de cuenta bancaria</label>
                                <br>
                                <select class="tipoDeCuentaBanco form-select col-md-12" name="tipo_cuenta_bancaria"
                                    id="tipo_cuenta_bancaria" value="{{ old('tipo_cuenta_bancaria') }}">
                                    <option value="ahorros">Ahorros</option>
                                    <option value="corriente">Corriente</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="numeroCuenta">Número de cuenta bancaria</label>
                                <br>
                                <input type="text" class="form-control" id="numero_cuenta_bancaria"
                                    name="numero_cuenta_bancaria" placeholder="Ejemplo: 05700002715"
                                    value="{{ old('numero_cuenta_bancaria') }}">
                            </div> --}}
                            <!-- Checkboxes of Privacidad y TérminosyCond, Contratos -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="acepta_TermsPrivCond" name="acepta_TermsPrivCond" value="1"/>
                                        <label for="PrivTerm">Tengo 18 años o más y <a class="font-weight-bold" data-toggle="modal" data-target="#modalTerminosyCondiciones">Acepto los términos y condiciones</a> junto con la <a class="font-weight-bold" data-toggle="modal" data-target="#modalPolitica">Política de Privacidad de Prismad Music</a></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="acepta_Contrato" name="acepta_Contrato" value="1"/>
                                        <label for="Contrato">Soy consciente y acepto el <a class="font-weight-bold" data-toggle="modal" data-target="#modalContrato">Acuerdo exclusivo de administración de derechos fonográficos</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @include('registro.modal.tcondiciones')
    @include('registro.modal.privacidad')
    @include('registro.modal.contrato')
@endsection

@section('javascript')
    <script src="{{ asset('js/jsRegistroPersonas/scriptRegistro.js') }}"></script>
    <script src="{{ asset('js/jsRegistroPersonas/scriptCanvas.js') }}"></script>
@endsection
