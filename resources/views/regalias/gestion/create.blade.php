@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('regalias.index') }}"><i class="voyager-wallet" aria-hidden="true"></i> Gestion de Regalias</a>
    </li>
    <li class="active">
        <a href="{{ route('regalias.create') }}"><i class="voyager-plus" aria-hidden="true"></i></i> Crear Regalia</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i> Crear Regalia
    </h1>
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .form-validation{
            font-size: 11px;
            color: #f96868;
        }
        body, html, .form-control, th, td{
            color: #1e1f20!important;
        }
        .btn-link, .checkbox-inline, .checkbox label, .radio-inline, .radio label, label {
            font-weight: normal;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form enctype="multipart/form-data" action="{{ route('regalias.store') }}" method="POST" id="formRegalias">
                    @csrf
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
                    <fieldset>
                        <legend>CARGA DE INFORME</legend>
                        <div class="form-group  col-md-12 ">
                            <label for="idcancion">Cancion</label>
                            <select class="cancion col-md-12" name="idcancion" id="idcancion">
                                <option value="" disabled="" selected="" hidden="">Seleccione una canción</option>
                                @foreach ($canciones as $id => $cancion)
                                <option value="{{ old('idcancion', $id) }}">
                                    {{ old('item_title', $cancion) }}
                                </option>
                                @endforeach

                            </select>
                            <input type="hidden" id="item_title" name ="item_title" value="{{ old('item_title') }}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="colaboradores">Colaboradores</label>
                            <table id="colaboradores">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="form-group col-md-12 ">
                            <label class="control-label" for="fileInforme">Informe</label>
                            <input type="file" class="filepond" name="fileInforme" id="fileInforme" data-max-file-size="100MB" data-max-files="1"/>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label class="control-label" for="fecha_informe_inicio">Mes Informe Inicio</label>
                            <input type="month" class="form-control" name="fecha_informe_inicio" id="fecha_informe_inicio" placeholder="Fecha Informe Inicio" max="{{ date('Y-m'); }}" value="{{ old('fecha_informe_inicio', date('Y-m')) }}">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label class="control-label" for="fecha_informe_final">Mes Informe Final</label>
                            <input type="month" class="form-control" name="fecha_informe_final" id="fecha_informe_final" placeholder="Fecha Informe Final" max="{{ date('Y-m'); }}" value="{{ old('fecha_informe_final', date('Y-m')) ?: '' }}">
                        </div>

                        <div class="form-group col-md-6 {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label class="control-label" for="valor">Valor</label>
                            <input type="text" name="valor" id="valor" class="valor form-control" step="any" value="{{ old('valor') }}" />
                        </div>
                        <div class="form-group  col-md-12 ">
                            <button type="submit" class="btn btn-primary save" id="btnSave">Guardar</button>
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
    <script src="{{ asset('js/jsRegalias/gestion/scriptCreate.js') }}"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
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
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview,
            FilePondPluginMediaPreview,
            FilePondPluginFileValidateType
        );

        pond = FilePond.create(document.querySelector('.filepond'), {
            storeAsFile: true,
            labelIdle: 'Arrastra y suelta tu archivo o <span class="filepond--label-action">examinar</span>',
            maxParallelUploads: 1,
            allowFileTypeValidation: true,
            labelMaxFileSizeExceeded: 'Archivo demasiado pesado',
            labelMaxFileSize: 'El tamaño maximo es de 100MB',
            labelFileTypeNotAllowed: 'Tipo de Archivo no permitido',
            acceptedFileTypes: ['text/csv','application/csv', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise
                    resolve(type);
            })
        });

        FilePond.setOptions(labels_es_ES);
    </script>

    <!-- CDN ALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#btnSave").click(function(event){
            event.preventDefault();

            let form = $('#formRegalias');
            let pivote = true;
            Swal.fire({
                title: '¿Quieres guardar los cambios?',
                text: "Soy consciente de que una vez creado no podré hacer modificaciones.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#idcancion').val() == null) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Falto seleccionar la canción'
                        });
                        pivote = false;
                    }

                    if (!pond.status) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Falto subir el informe'
                        });
                        pivote = false;
                    }

                    if ($('#valor').val() == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Falto ingresar el valor'
                        });
                        pivote = false;
                    }

                    if ($('#fecha_informe_inicio').val() > $('#fecha_informe_final').val()) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'La fecha inicial no puede ser mayor a la fecha final'
                        });
                        pivote = false;
                    }

                    if (pivote == true) {
                        Swal.fire('Guardado!', '', 'success');
                        form.submit();
                    }
                }
        });
    });
    </script>
    <!-- EDN CDN ALERT 2 -->
@endsection
