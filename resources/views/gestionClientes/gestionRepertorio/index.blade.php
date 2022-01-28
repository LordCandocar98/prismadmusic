@extends('layouts.master')

@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-id-card-o" aria-hidden="true"></i>
        Repertorio
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
</style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="/repertorio" method="post" id="formRegistro" name="formRegistro" enctype="multipart/form-data">
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
                                <label for="titulo">Título de salida al mercado</label>
                                <br>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ejemplo: Lovely"
                                    value="{{ old('titulo') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="version">Versión/Subtitulo</label>
                                <br>
                                <input type="text" class="form-control" id="version" name="version" placeholder="Ejemplo: Muse"
                                    value="{{ old('version') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoDoc">Artista principal</label>
                                <br>
                                <select class="artista_principal col-md-12" name="artista_principal" id="artista_principal"
                                    value="{{ old('artista_principal') }}">
                                    @foreach ($clientes as $clientes)
                                        <option value="{{ $clientes->id }}">{{ $clientes->nombre_artistico }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Género</label>
                                <br>
                                <select class="genero col-md-12" name="genero" id="genero"
                                    value="{{ old('genero') }}">
                                    <option value="g1">Afoxé</option>
                                    <option value="g2">Alternative</option>
                                    <option value="g3">Alternative & Rock in Spanish</option>
                                    <option value="g4">Ambient</option>
                                    <option value="g5">Americana</option>
                                    <option value="g6">Anime</option>
                                    <option value="g7">Arabesk</option>
                                    <option value="g8">Avant-garde</option>
                                    <option value="g9">Axé</option>
                                    <option value="g10">Baião</option>
                                    <option value="g11">Baile Funk</option>
                                    <option value="g12">Bluegrass</option>
                                    <option value="g13">Blues</option>
                                    <option value="g14">Bossa nova</option>
                                    <option value="g15">Breakbeat</option>
                                    <option value="g16">Britpop</option>
                                    <option value="g17">Bugio</option>
                                    <option value="g18">C-Pop</option>
                                    <option value="g19">Cajun</option>
                                    <option value="g20">Canção</option>
                                    <option value="g21">Cantopop/HK-Pop 1</option>
                                    <option value="g2">Celtic</option>
                                    <option value="g1">Celtic Folk</option>
                                    <option value="g2">Chamamé</option>
                                    <option value="g1">Chamarra</option>
                                    <option value="g2">Chamber music</option>
                                    <option value="g1">Children's music</option>
                                    <option value="g2">Chill-Out</option>
                                    <option value="g1">Chinese</option>
                                    <option value="g2">Chorinho</option>
                                    <option value="g1">Choro</option>
                                    <option value="g2">Christian</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoCuenta">Sub-género</label>
                                <br>
                                <select class="subgenero col-md-12" name="subgenero" id="subgenero"
                                    value="{{ old('genero') }}">
                                    <option value="g1">Acid</option>
                                    <option value="g2">Acid house</option>
                                    <option value="g1">Acid Jazz</option>
                                    <option value="g2">Acid Punk</option>
                                    <option value="g1">Acid rap</option>
                                    <option value="g2">Acid rock</option>
                                    <option value="g1">Acid techno</option>
                                    <option value="g2">Afoxé</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="sello">Nombre del sello</label>
                                <br>
                                <select class="tipoDNI col-md-12" name="nombre_sello" id="nombre_sello"
                                    value="{{ old('nombre_sello') }}">
                                    <option value="ns1">Nombre sello 1</option>
                                    <option value="ns2">Nombre sello 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="formato">Formato</label>
                                <br>
                                <select class="formato col-md-12" name="formato" id="formato"
                                    value="{{ old('formato') }}">
                                    <option value="f1">SINGLE</option>
                                    <option value="f2">EP</option>
                                    <option value="f3">ALBUM</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="sello">Fecha de Salida Original</label>
                                <br>
                                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida"
                                    value="{{ old('fecha_salida') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="productor">Productor</label>
                                <br>
                                <input type="text" class="form-control" id="productor" name="productor" placeholder="Ejemplo: Bad Bunny"
                                    value="{{ old('productor') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="copyright">Copyright</label>
                                <br>
                                <input type="text" class="form-control" id="copyright" name="copyright" placeholder="Ejemplo: Lana del rey"
                                    value="{{ old('copyright') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="annio_produccion">Año de producción</label>
                                <br>
                                <input type="number" step="1" value="2022" class="form-control" id="annio_produccion" name="annio_produccion"
                                    value="{{ old('annio_produccion') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="sello">UPC/EAN</label>
                                <br>
                                <input type="text" class="form-control" id="upc_ean" name="upc_ean"
                                    value="{{ old('upc_ean') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="numero_catalogo">Num. de catálogo Productor</label>
                                <br>
                                <input type="text" class="form-control" id="numero_catalogo" name="numero_catalogo"
                                    value="{{ old('numero_catalogo') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="numero_catalogo">Carga una Imagen de Portada</label>
                                <br>
                                <input type="file" class="form-control" id="portada" name="portada"
                                    value="{{ old('portada') }}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Repertorio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegistroRepertorios/scriptRegistro.js') }}"></script>
@endsection
