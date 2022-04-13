@extends('layouts.master')
@section('addBreadcrumbs')
<li class="active">
    <a href="{{ route('cancion.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Canciones</a>
</li>
<li class="active">
    <a href="{{ route('cancion.create') }}"><i class="voyager-plus" aria-hidden="true"></i> Crear</a>
</li>
@endsection
@section('page_header')
<h1 class="page-title">
    <i class="voyager-plus" aria-hidden="true"></i>
    Cargar canción
</h1>
@endsection

@section('css')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<link href="{{ asset('css/filepond-plugin-media-preview.css') }}" rel="stylesheet" />
<style>
    body,
    html,
    .form-control {
        color: #1e1f20 !important;
    }

    .parrafo {
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
<form action="{{ route('cancion.store') }}" method="post" id="formRegistro" name="formRegistro"
    enctype="multipart/form-data">

    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <h5 class="card-title">Información general</h5>
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="titulo">Título</label>
                        <br>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="version_subtitulo">Versión/Subtítulo</label>
                        <br>
                        <input type="text" class="form-control" id="version_subtitulo" name="version_subtitulo"
                            value="{{ old('version_subtitulo') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="autor">Autor</label>
                        <br>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="productor">Compositor</label>
                        <br>
                        <input type="text" class="form-control" id="compositor" name="compositor"
                            placeholder="Ejemplo: Wolfgang Amadeus Mozart " value="{{ old('compositor') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="copyright">Arreglista</label>
                        <br>
                        <input type="text" class="form-control" id="arreglista" name="arreglista"
                            placeholder="Ejemplo: Cyro Pereira" value="{{ old('arreglista') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="productor">Productor musical</label>
                        <br>
                        <input type="text" class="form-control" id="productor" name="productor"
                            placeholder="George Martin" value="{{ old('productor') }}">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-3">
                        <label for="pline">Pline</label>
                        <br>
                        <input type="text" class="form-control" id="pline" name="pline" placeholder="..."
                            value="{{ old('pline') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="nombre_colaboracion">Nombre de la Colaboración</label>
                        <br>
                        <input type="text" class="form-control" id="nombre_colaboracion" name="nombre_colaboracion"
                            value="{{ old('nombre_colaboracion') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="annio_produccion">Año de producción</label>
                        <br>
                        <input type="number" step="1" value="2022" class="form-control" id="annio_produccion"
                            name="annio_produccion" value="{{ old('annio_produccion') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_principal_salida">Fecha de salida al mercado <i class="fa fa-question-circle"
                                aria-hidden="true" data-toggle="popover" title="*para vídeo horarios CET"></i></label>
                        <br>
                        <input type="date" class="form-control" id="fecha_principal_salida"
                            name="fecha_principal_salida" value="{{ old('fecha_principal_salida') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="tipo_secundario">Tipo secundario</label>
                        <br>
                        <select class="tipo_secundario" name="tipo_secundario" id="tipo_secundario"
                            style="width: 100%;">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                            <option value="original" {{ old('tipo_secundario') == "original" ? 'selected' : '' }}>
                                Original</option>
                            <option value="karaoke" {{ old('tipo_secundario') == "karaoke" ? 'selected' : '' }}>Karaoke
                            </option>
                            <option value="medley" {{ old('tipo_secundario') == "medley" ? 'selected' : '' }}>Medley
                            </option>
                            <option value="cover" {{ old('tipo_secundario') == "cover" ? 'selected' : '' }}>Cover
                            </option>
                            <option value="otrogrupo" {{ old('tipo_secundario') == "otrogrupo" ? 'selected' : '' }}>
                                Versión por otro grupo</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="instrumental">Instrumental</label>
                        <br>
                        <select class="instrumental" name="instrumental" id="instrumental" style="width: 100%;">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                            <option value="si" {{ old('instrumental') == "si" ? 'selected' : '' }}>Si</option>
                            <option value="no" {{ old('instrumental') == "no" ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="letra_chocante_vulgar">Letra vulgar o chocante</label>
                        <br>
                        <select class="letra_chocante_vulgar" name="letra_chocante_vulgar" id="letra_chocante_vulgar"
                            style="width: 100%;">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                            <option value="si" {{ old('letra_chocante_vulgar') == "si" ? 'selected' : '' }}>Si</option>
                            <option value="no" {{ old('letra_chocante_vulgar') == "no" ? 'selected' : '' }}>No</option>
                            <option value="clear" {{ old('letra_chocante_vulgar') == "clear" ? 'selected' : '' }}>
                                Cleaned Version</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="inicio_previsualizacion">Inicio de la previsualización</label>
                        <br>
                        <input type="number" class="form-control" id="inicio_previsualizacion"
                            name="inicio_previsualizacion" placeholder="En segundos, ejemplo: 3"
                            value="{{ old('inicio_previsualizacion') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="idioma_titulo">Idioma del título</label>
                        <br>
                        <select class="idioma_titulo col-md-12" name="idioma_titulo" id="idioma_titulo">
                            <option value="Español" {{ old('idioma_titulo') == "Español" ? 'selected' : '' }}>Español
                            </option>
                            <option value="Inglés" {{ old('idioma_titulo') == "Inglés" ? 'selected' : '' }}>Inglés
                            </option>
                            <option value="Portugués" {{ old('idioma_titulo') == "Portugués" ? 'selected' : '' }}>
                                Portugués</option>
                            <option value="Italiano" {{ old('idioma_titulo') == "Italiano" ? 'selected' : '' }}>Italiano
                            </option>
                            <option value="Francés" {{ old('idioma_titulo') == "Francés" ? 'selected' : '' }}>Francés
                            </option>
                            <option value="Chino" {{ old('idioma_titulo') == "Chino" ? 'selected' : '' }}>Chino</option>
                            <option value="Japonés" {{ old('idioma_titulo') == "Japonés" ? 'selected' : '' }}>Japonés
                            </option>
                            <option value="Coreano" {{ old('idioma_titulo') == "Coreano" ? 'selected' : '' }}>Coreano
                            </option>
                            <option value="Alemán" {{ old('idioma_titulo') == "Alemán" ? 'selected' : '' }}>Alemán
                            </option>
                            <option value="Árabe" {{ old('idioma_titulo') == "Árabe" ? 'selected' : '' }}>Árabe</option>
                            <option value="Hindi" {{ old('idioma_titulo') == "Hindi" ? 'selected' : '' }}>Hindi</option>
                            <option value="Ruso" {{ old('idioma_titulo') == "Ruso" ? 'selected' : '' }}>Ruso</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="idioma_letra">Idioma de la letra</label>
                        <br>
                        <select class="idioma_letra col-md-12" name="idioma_letra" id="idioma_letra">
                            <option value="Español" {{ old('idioma_letra') == "Español" ? 'selected' : '' }}>Español
                            </option>
                            <option value="Inglés" {{ old('idioma_letra') == "Inglés" ? 'selected' : '' }}>Inglés
                            </option>
                            <option value="Portugués" {{ old('idioma_letra') == "Portugués" ? 'selected' : '' }}>
                                Portugués</option>
                            <option value="Italiano" {{ old('idioma_letra') == "Italiano" ? 'selected' : '' }}>Italiano
                            </option>
                            <option value="Francés" {{ old('idioma_letra') == "Francés" ? 'selected' : '' }}>Francés
                            </option>
                            <option value="Chino" {{ old('idioma_letra') == "Chino" ? 'selected' : '' }}>Chino</option>
                            <option value="Japonés" {{ old('idioma_letra') == "Japonés" ? 'selected' : '' }}>Japonés
                            </option>
                            <option value="Coreano" {{ old('idioma_letra') == "Coreano" ? 'selected' : '' }}>Coreano
                            </option>
                            <option value="Alemán" {{ old('idioma_letra') == "Alemán" ? 'selected' : '' }}>Alemán
                            </option>
                            <option value="Árabe" {{ old('idioma_letra') == "Árabe" ? 'selected' : '' }}>Árabe</option>
                            <option value="Hindi" {{ old('idioma_letra') == "Hindi" ? 'selected' : '' }}>Hindi</option>
                            <option value="Ruso" {{ old('idioma_letra') == "Ruso" ? 'selected' : '' }}>Ruso</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje_intelectualCreador">¿De cuánto será TU porcentaje intelectual?</label>
                        <br>
                        <input type="text" class="form-control" id="porcentaje_intelectualCreador"
                            name="porcentaje_intelectualCreador" placeholder="Numérico, ejemplo: 50 "
                            value="{{ old('porcentaje_intelectualCreador') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="tipo_colaboracionCreador">¿Cuál será TU tipo de colaboración?</label>
                        <br>
                        <select class="idioma_titulo col-md-12" name="tipo_colaboracionCreador"
                            id="tipo_colaboracionCreador" value="{{ old('tipo_colaboracionCreador') }}">
                            <option value="Principal">Principal</option>
                            <option value="Featuring">Featuring</option>
                            <option value="Remixer">Remixer</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%">
        <div class="card-body">
            <h5 class="card-title">Subir audio</h5>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="alert alert-info text-start font-weight-bold" role="alert" style="margin-bottom: 0;">
                        <p>Puede importar los siguientes formatos: WAV, FLAC, AIFF</p>
                        <p>No importar canciones con símbolos especiales como '/%#' y demás. Podría afectar la
                            subida del archivo o directamente no ocurrir la misma.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="pista_mp3">Carga la canción/pista</label>
                    <br>
                    <input type="file" class="filepond my-pond" allowFileEncode name="pista_mp3"
                        data-allow-reorder="true" data-max-file-size="30MB" data-max-files="1" required>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Colaboradores</h5>
            <div class="alert alert-info" role="alert">
                <p>**Recuerda que sólo debes registrar a los colaboradores <a class="alert-link">APARTE DE
                        TI</a> para crear correctamente la canción**</p>
                <p>¡Los colaboradores se registran diligenciando el <a class="alert-link">CORREO
                        ELECTRÓNICO!</a></p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Añadir canción</button>
    </div>
</form>

@endsection
@section('javascript')
<!-- include jQuery library -->
<script src="{{ asset('js/jsRegistroCanciones/scriptRegistro.js') }}"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="{{ asset('js/filepond-plugin-media-preview.js') }}"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginMediaPreview,
        FilePondPluginFileValidateType
    );
    const input = document.querySelector('input[name="pista_mp3"]');

    // Create a FilePond instance
    FilePond.create(input, {
        labelIdle: 'Arrastra y suelta tu archivo o <span class="filepond--label-action">examinar</span>',
        storeAsFile: true,
        maxParallelUploads: 2,
        allowFileTypeValidation: true,
        acceptedFileTypes: ['audio/wav', 'audio/flac', 'audio/aiff'],
        fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise

                resolve(type);
            }),
    });
    FilePond.setOptions({
        server: {
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
@endsection
