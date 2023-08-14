@extends('layouts.master')

@section('addBreadcrumbs')
<li class="">
    <a href="{{ route('repertorio.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Repertorios</a>
</li>
<li class="active">
    <a href="{{ url('repertorio/'.$repertorio->id) }}"><i class="fa fa-file-audio-o" aria-hidden="true"></i> Ver Repertorio</a>
</li>
<li class="active">
    <a href="{{ route('cancion.create') }}"><i class="voyager-plus" aria-hidden="true"></i> Crear Canción</a>
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

    .form-validation {
        font-size: 11px;
        color: #f96868;
    }

    body,
    html,
    .form-control,
    th,
    td {
        color: #1e1f20 !important;
    }

    .btn-link,
    .checkbox-inline,
    .checkbox label,
    .radio-inline,
    .radio label,
    label {
        font-weight: normal;
    }
</style>
@endsection

@section('content')
<form action="{{ route('cancion.store') }}" method="post" id="formRegistro" name="formRegistro" enctype="multipart/form-data">
    <input type="hidden" name="repertorio" value="{{$repertorio->id}}">
    <input type="hidden" name="session_email" id="session_email" value="{{ $session->email }}">
    <input type="hidden" id="cantcol" name="cantcol" value="0">
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <h5 class="card-title">Información general</h5>
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 {{ $errors->has('titulo') ? 'has-error' : '' }}">
                        <label for="titulo">Título</label>
                        <br>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                        @if ($errors->has('titulo'))
                        <span class="form-validation">{{ $errors->first('titulo') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('version_subtitulo') ? 'has-error' : '' }}">
                        <label for="version_subtitulo">Versión/Subtítulo <i class="fa fa-question-circle" aria-hidden="true" id="helpVersion" style="cursor: pointer;"></i></label>
                        <br>
                        <input type="text" class="form-control" id="version_subtitulo" name="version_subtitulo" value="{{ old('version_subtitulo') }}">
                        @if ($errors->has('version_subtitulo'))
                        <span class="form-validation">{{ $errors->first('version_subtitulo') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('autor') ? 'has-error' : '' }}">
                        <label for="autor">Autor</label>
                        <br>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}">
                        @if ($errors->has('autor'))
                        <span class="form-validation">{{ $errors->first('autor') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 {{ $errors->has('compositor') ? 'has-error' : '' }}">
                        <label for="compositor">Compositor</label>
                        <br>
                        <input type="text" class="form-control" id="compositor" name="compositor" placeholder="Ejemplo: Wolfgang Amadeus Mozart " value="{{ old('compositor') }}">
                        @if ($errors->has('compositor'))
                        <span class="form-validation">{{ $errors->first('compositor') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('arreglista') ? 'has-error' : '' }}">
                        <label for="arreglista">Arreglista</label>
                        <br>
                        <input type="text" class="form-control" id="arreglista" name="arreglista" placeholder="Ejemplo: Cyro Pereira" value="{{ old('arreglista') }}">
                        @if ($errors->has('arreglista'))
                        <span class="form-validation">{{ $errors->first('arreglista') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('productor') ? 'has-error' : '' }}">
                        <label for="productor">Productor musical</label>
                        <br>
                        <input type="text" class="form-control" id="productor" name="productor" placeholder="George Martin" value="{{ old('productor') }}">
                        @if ($errors->has('productor'))
                        <span class="form-validation">{{ $errors->first('productor') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('pline') ? 'has-error' : '' }}">
                        <label for="pline">Pline <i class="fa fa-question-circle" aria-hidden="true" id="helpPline" style="cursor: pointer;"></i></label>
                        <br>
                        <input type="text" class="form-control" id="pline" name="pline" placeholder="..." value="{{ old('pline') }}">
                        @if ($errors->has('pline'))
                        <span class="form-validation">{{ $errors->first('pline') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 {{ $errors->has('annio_produccion') ? 'has-error' : '' }}">
                        <label for="annio_produccion">Año de producción</label>
                        <br>
                        <input type="number" step="1" class="form-control" id="annio_produccion" name="annio_produccion" value="{{ old('annio_produccion', date('Y')) }}" min="{{ date('Y') - 100 }}" max="{{ date('Y') }}">
                        @if ($errors->has('annio_produccion'))
                        <span class="form-validation">{{ $errors->first('annio_produccion') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('fecha_principal_salida') ? 'has-error' : '' }}">
                        <label for="fecha_principal_salida">Fecha de salida al mercado <i class="fa fa-question-circle" aria-hidden="true" id="helpFlanz" style="cursor: pointer;"></i></label>
                        <br>
                        <input type="date" class="form-control" id="fecha_principal_salida" name="fecha_principal_salida" min="{{date('Y-m')}}-{{date('d')+6}}" value="{{ old('fecha_principal_salida') }}">
                        @if ($errors->has('fecha_principal_salida'))
                        <span class="form-validation">{{ $errors->first('fecha_principal_salida') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('idioma_titulo') ? 'has-error' : '' }}">
                        <label for="idioma_titulo">Idioma del título</label>
                        <br>
                        <select class="idioma_titulo col-md-12" name="idioma_titulo" id="idioma_titulo" style="width: 100%;">
                            <option value="Español" {{ old('idioma_titulo') == "Español" ? 'selected' : '' }}>Español</option>
                            <option value="Inglés" {{ old('idioma_titulo') == "Inglés" ? 'selected' : '' }}>Inglés</option>
                            <option value="Portugués" {{ old('idioma_titulo') == "Portugués" ? 'selected' : '' }}>Portugués</option>
                            <option value="Italiano" {{ old('idioma_titulo') == "Italiano" ? 'selected' : '' }}>Italiano</option>
                            <option value="Francés" {{ old('idioma_titulo') == "Francés" ? 'selected' : '' }}>Francés</option>
                            <option value="Chino" {{ old('idioma_titulo') == "Chino" ? 'selected' : '' }}>Chino</option>
                            <option value="Japonés" {{ old('idioma_titulo') == "Japonés" ? 'selected' : '' }}>Japonés</option>
                            <option value="Coreano" {{ old('idioma_titulo') == "Coreano" ? 'selected' : '' }}>Coreano</option>
                            <option value="Alemán" {{ old('idioma_titulo') == "Alemán" ? 'selected' : '' }}>Alemán</option>
                            <option value="Árabe" {{ old('idioma_titulo') == "Árabe" ? 'selected' : '' }}>Árabe</option>
                            <option value="Hindi" {{ old('idioma_titulo') == "Hindi" ? 'selected' : '' }}>Hindi</option>
                            <option value="Ruso" {{ old('idioma_titulo') == "Ruso" ? 'selected' : '' }}>Ruso</option>
                        </select>
                        @if ($errors->has('idioma_titulo'))
                        <span class="form-validation">{{ $errors->first('idioma_titulo') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('idioma_letra') ? 'has-error' : '' }}">
                        <label for="idioma_letra">Idioma de la letra</label>
                        <br>
                        <select class="idioma_letra col-md-12" name="idioma_letra" id="idioma_letra" style="width: 100%;">
                            <option value="Español" {{ old('idioma_letra') == "Español" ? 'selected' : '' }}>Español</option>
                            <option value="Inglés" {{ old('idioma_letra') == "Inglés" ? 'selected' : '' }}>Inglés</option>
                            <option value="Portugués" {{ old('idioma_letra') == "Portugués" ? 'selected' : '' }}>Portugués</option>
                            <option value="Italiano" {{ old('idioma_letra') == "Italiano" ? 'selected' : '' }}>Italiano</option>
                            <option value="Francés" {{ old('idioma_letra') == "Francés" ? 'selected' : '' }}>Francés</option>
                            <option value="Chino" {{ old('idioma_letra') == "Chino" ? 'selected' : '' }}>Chino</option>
                            <option value="Japonés" {{ old('idioma_letra') == "Japonés" ? 'selected' : '' }}>Japonés</option>
                            <option value="Coreano" {{ old('idioma_letra') == "Coreano" ? 'selected' : '' }}>Coreano</option>
                            <option value="Alemán" {{ old('idioma_letra') == "Alemán" ? 'selected' : '' }}>Alemán</option>
                            <option value="Árabe" {{ old('idioma_letra') == "Árabe" ? 'selected' : '' }}>Árabe</option>
                            <option value="Hindi" {{ old('idioma_letra') == "Hindi" ? 'selected' : '' }}>Hindi</option>
                            <option value="Ruso" {{ old('idioma_letra') == "Ruso" ? 'selected' : '' }}>Ruso</option>
                        </select>
                        @if ($errors->has('idioma_letra'))
                        <span class="form-validation">{{ $errors->first('idioma_letra') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 {{ $errors->has('tipo_secundario') ? 'has-error' : '' }}">
                        <label for="tipo_secundario">Tipo secundario</label>
                        <br>
                        <select class="tipo_secundario" name="tipo_secundario" id="tipo_secundario" style="width: 100%;">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                            <option value="original" {{ old('tipo_secundario') == "original" ? 'selected' : '' }}>Original</option>
                            <option value="karaoke" {{ old('tipo_secundario') == "karaoke" ? 'selected' : '' }}>Karaoke</option>
                            <option value="medley" {{ old('tipo_secundario') == "medley" ? 'selected' : '' }}>Medley</option>
                            <option value="cover" {{ old('tipo_secundario') == "cover" ? 'selected' : '' }}>Cover</option>
                            <option value="otrogrupo" {{ old('tipo_secundario') == "otrogrupo" ? 'selected' : '' }}>Versión por otro grupo</option>
                        </select>
                        @if ($errors->has('tipo_secundario'))
                        <span class="form-validation">{{ $errors->first('tipo_secundario') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('instrumental') ? 'has-error' : '' }}">
                        <label for="instrumental">Instrumental <i class="fa fa-question-circle" aria-hidden="true" id="helpInstrumental" style="cursor: pointer;"></i></label>
                        <br>
                        <select class="instrumental" name="instrumental" id="instrumental" style="width: 100%;">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                            <option value="si" {{ old('instrumental') == "si" ? 'selected' : '' }}>Si</option>
                            <option value="no" {{ old('instrumental') == "no" ? 'selected' : '' }} {{ old('instrumental') == "" ? 'selected' : '' }}>No</option>
                        </select>
                        @if ($errors->has('instrumental'))
                        <span class="form-validation">{{ $errors->first('instrumental') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('letra_chocante_vulgar') ? 'has-error' : '' }}">
                        <label for="letra_chocante_vulgar">Letra vulgar o chocante</label>
                        <br>
                        <select class="letra_chocante_vulgar" name="letra_chocante_vulgar" id="letra_chocante_vulgar" style="width: 100%;">
                            <option value="none" selected disabled hidden>Seleccione una opción</option>
                            <option value="si" {{ old('letra_chocante_vulgar') == "si" ? 'selected' : '' }}>Si</option>
                            <option value="no" {{ old('letra_chocante_vulgar') == "no" ? 'selected' : '' }}>No</option>
                            <option value="clear" {{ old('letra_chocante_vulgar') == "clear" ? 'selected' : '' }}>
                                Cleaned Version</option>
                        </select>
                        @if ($errors->has('letra_chocante_vulgar'))
                        <span class="form-validation">{{ $errors->first('letra_chocante_vulgar') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 {{ $errors->has('inicio_previsualizacion') ? 'has-error' : '' }}">
                        <label for="inicio_previsualizacion">Inicio de la previsualización</label>
                        <br>
                        <input type="number" class="form-control" id="inicio_previsualizacion" name="inicio_previsualizacion" placeholder="En segundos, ejemplo: 3" value="{{ old('inicio_previsualizacion') }}">
                        @if ($errors->has('inicio_previsualizacion'))
                        <span class="form-validation">{{ $errors->first('inicio_previsualizacion') }}</span>
                        @endif
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
                <div class="col-md-12" style="margin: 0;">
                    <label for="pista_mp3">Carga la canción/pista <i class="fa fa-question-circle" aria-hidden="true" id="upSong" style="cursor: pointer;"></i></label>
                    <br>
                    <input type="file" class="filepond" name="pista_mp3" required>
                    <small class="form-text text-muted" style="color: black;">No importar canciones con símbolos
                        especiales como '/%#' y demás. Podría afectar la subida del archivo.</small>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%; padding-bottom: 2em; {{ $errors->has('artistaPrincipal') ? 'has-error' : '' }}">
        <div class="card-body">
            <h5 class="card-title">Artista Principales</h5>
            <div class="row">
                <div class="col-md-12 pb-5">
                    <label for="artistaPrincipal">Nombre del artista principal</label>
                    <br>
                    <input type="text" class="form-control" id="artistaPrincipal" name="artistaPrincipal" placeholder="Digitar nombre del artista principal" value="{{ old('artistaPrincipal') }}">
                    @if ($errors->has('artistaPrincipal'))
                    <span class="form-validation">{{ $errors->first('artistaPrincipal') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="zoneaddcol-artista">Agregar otro artista principal </label>
                    <input type="button" value="Agregar" class="btn btn-success" id="addcol-artista">
                    <input type="button" value="Eliminar" class="btn btn-danger" id="delcol-artista">
                </div>
                <div class="col-md-12" id="zoneaddcol-artista">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%; padding-bottom: 2em; {{ $errors->has('featuring') ? 'has-error' : '' }}">
        <div class="card-body">
            <h5 class="card-title">Featuring</h5>
            <div class="row">
                <div class="col-md-12">
                    <label for="zoneaddcol-featuring">Agregar featuring </label>
                    <input type="button" value="Agregar" class="btn btn-success" id="addcol-featuring">
                    <input type="button" value="Eliminar" class="btn btn-danger" id="delcol-featuring">
                </div>
                <div class="col-md-12" id="zoneaddcol-featuring">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%; padding-bottom: 2em; {{ $errors->has('porcentaje_intelectualCreador') ? 'has-error' : '' }}">
        <div class="card-body">
            <h5 class="card-title">Colaboradores</h5>
            <div class="row">
                <div class="col-md-12 pb-5">
                    <label for="porcentaje_intelectualCreador">¿De cuánto será TU porcentaje del Fonograma?</label>
                    <br>
                    <input type="text" class="form-control" id="porcentaje_intelectualCreador" name="porcentaje_intelectualCreador" placeholder="Numérico, ejemplo: 50 " value="{{ old('porcentaje_intelectualCreador') }}" required>
                    @if ($errors->has('porcentaje_intelectualCreador'))
                    <span class="form-validation">{{ $errors->first('porcentaje_intelectualCreador') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="cant_col">Invitar Colaborador: </label>
                    <input type="button" value="Agregar" class="btn btn-success" id="addcol">
                    <input type="button" value="Eliminar" class="btn btn-danger" id="delcol">
                </div>
                <div class="col-md-12" id="zoneaddcol">

                </div>
                <small class="form-text text-muted" style="color: black;">El porcentaje total debe ser igual al 100%</small>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="addsong">Añadir canción</button>
    </div>
</form>

@endsection

@section('javascript')
<script src="{{ asset('js/jsRegistroCanciones/scriptRegistro.js') }}"></script>

<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="{{ asset('js/filepond-plugin-media-preview.js') }}"></script>
<script>
    const labels_es_ES = {
        labelIdle: 'Arrastra y suelta tus archivos o <span class = "filepond--label-action"> Examinar <span>',
        labelInvalidField: "El campo contiene archivos inválidos",
        labelFileWaitingForSize: "Esperando tamaño",
        labelFileSizeNotAvailable: "Tamaño no disponible",
        labelFileLoading: "Cargando",
        labelFileLoadError: "Error durante la carga",
        labelFileProcessing: "Cargando",
        labelFileProcessingComplete: "Carga completa",
        labelFileProcessingAborted: "Carga cancelada",
        labelFileProcessingError: "Error durante la carga",
        labelFileProcessingRevertError: "Error durante la reversión",
        labelFileRemoveError: "Error durante la eliminación",
        labelTapToCancel: "toca para cancelar",
        labelTapToRetry: "tocar para volver a intentar",
        labelTapToUndo: "tocar para deshacer",
        labelButtonRemoveItem: "Eliminar",
        labelButtonAbortItemLoad: "Abortar",
        labelButtonRetryItemLoad: "Reintentar",
        labelButtonAbortItemProcessing: "Cancelar",
        labelButtonUndoItemProcessing: "Deshacer",
        labelButtonRetryItemProcessing: "Reintentar",
        labelButtonProcessItem: "Cargar",
        labelMaxFileSizeExceeded: "El archivo es demasiado grande",
        labelMaxFileSize: "El tamaño máximo del archivo es {filesize}",
        labelMaxTotalFileSizeExceeded: "Tamaño total máximo excedido",
        labelMaxTotalFileSize: "El tamaño total máximo del archivo es {filesize}",
        labelFileTypeNotAllowed: "Archivo de tipo no válido",
        fileValidateTypeLabelExpectedTypes: "Espera {allButLastType} o {lastType}",
        imageValidateSizeLabelFormatError: "Tipo de imagen no compatible",
        imageValidateSizeLabelImageSizeTooSmall: "La imagen es demasiado pequeña",
        imageValidateSizeLabelImageSizeTooBig: "La imagen es demasiado grande",
        imageValidateSizeLabelExpectedMinSize: "El tamaño mínimo es {minWidth} × {minHeight}",
        imageValidateSizeLabelExpectedMaxSize: "El tamaño máximo es {maxWidth} × {maxHeight}",
        imageValidateSizeLabelImageResolutionTooLow: "La resolución es demasiado baja",
        imageValidateSizeLabelImageResolutionTooHigh: "La resolución es demasiado alta",
        imageValidateSizeLabelExpectedMinResolution: "La resolución mínima es {minResolution}",
        imageValidateSizeLabelExpectedMaxResolution: "La resolución máxima es {maxResolution}",
    };

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
    let pond = FilePond.create(input, {
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

    FilePond.setOptions(labels_es_ES);

    FilePond.setOptions({
        server: {
            url: '/uploadsong',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>

<!-- CDN ALERT2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#addsong").click(function(event) {
        event.preventDefault();
        let cantcol = $("#cantcol").val();
        let suma = parseFloat($("#porcentaje_intelectualCreador").val());
        for (let i = 1; i <= cantcol; i++) {
            suma += parseFloat($("#po-" + i).val());

            if ($("#email-" + cantcol).val() == $("#session_email").val()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "No se puede agregar el correo como colaborador"
                });
                $("#email-" + cantcol).val('');
            }
        }

        if (pond.status == 4) {
            if (suma == 100) {

                let form = $('#formRegistro');

                Swal.fire({
                    title: '¿Quieres guardar los cambios?',
                    text: "Soy consciente de que una vez creado la canción no podré hacer modificaciones.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // form.submit();
                    }
                });
            } else {
                Swal.fire({
                    title: 'Error en los colaboradores',
                    text: 'El porcentaje de colaboración debe ser igual a 100',
                    icon: 'warning'
                });
            }
        } else if (pond.status == 0) {
            Swal.fire({
                title: 'Subir audio',
                text: 'Falto cargar el fonograma',
                icon: 'warning'
            });
        } else if (pond.status == 1 || pond.status == 3) {
            Swal.fire({
                title: 'Audio en proceso',
                text: 'El fonograma esta en proceso de subida',
                icon: 'warning'
            });
        } else {
            Swal.fire({
                title: 'Audio con error',
                text: 'El fonograma presenta error',
                icon: 'danger'
            });
        }

    });
    $('#helpFlanz').click(function() {
        Swal.fire(
            'Fecha de salida al mercado',
            '<ul style="text-align:left"><li>Para videos horarios CET</li><li>La fecha de salida al mercado debe ser al menos 5 días después de hoy.</li></ul>',
            'question'
        )
    });
    $('#upSong').click(function() {
        Swal.fire(
            'Subir audio',
            'Puede importar los siguientes formatos: WAV, FLAC, AIFF.',
            'question'
        )
    });
    $('#helpVersion').click(function() {
        Swal.fire(
            '¿Cuál es la versión del lanzamiento?',
            'Ejemplo: Versión en vivo, versión acústica, versión salsa, etc.',
            'question'
        )
    });
    $('#helpPline').click(function() {
        Swal.fire(
            'Pline',
            'Persona que paga la producción. ejemplo: puede ser el mismo artista.',
            'question'
        )
    });
    $('#helpInstrumental').click(function() {
        Swal.fire(
            '¿Es Instrumental?',
            'Si tu pista no tiene voz seleccionas “Si” pero si tu pista tiene voz seleccionas “No”',
            'question'
        )
    });
</script>
<!-- EDN CDN ALERT 2 -->
@endsection