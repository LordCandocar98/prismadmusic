@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('regalias-externas.index') }}"><i class="voyager-wallet" aria-hidden="true"></i> Gestion de Regalias Externas</a>
    </li>
    <li class="active">
        <a href="{{ route('regalias-externas.create') }}"><i class="voyager-plus" aria-hidden="true"></i></i> Crear Regalia Externa</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i> Crear Regalia Varia
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
        .campo {
        display: block;
        } 
        .campo2 {
        display: none;
        } 
    </style>
  
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{ route('regalias-externas.store') }}" method="POST" id="formRegalias2">
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
                            <label for="idcliente2">Cliente</label>
                            <div class="form-group  col-md-12 ">
                                <select class="cliente col-md-12" name="idcliente2" id="idcliente2">
                                    <option value="" disabled="" selected="" hidden="">Seleccione un cliente</option>
                                    @foreach ($clientes as $cliente_id => $nombre)
                                        <option value="{{$cliente_id }}">
                                            {{ $nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('valor2') ? 'has-error' : '' }}">
                                <label class="control-label" for="valor2">Valor</label>
                                <input type="text" name="valor2" id="valor2" class="valor form-control" step="any" value="{{ old('valor2') }}" />
                            </div>
                            <input type="hidden" name="bandera_buton" id="bandera_buton" value="0" />
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
        $(document).ready(function() {
            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const btnSave = document.getElementById("btnSave");
            btnSave.addEventListener("click", function () {
            event.preventDefault();
            
            
            let form2 = $('#formRegalias2');
            let pivote2 = true;
            Swal.fire({
                title: '¿Quieres guardar los cambios?',
                text: "Soy consciente de que una vez creado no podré hacer modificaciones.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                        if ($('#idcliente2').val() == null) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Falto seleccionar el cliente'
                            });
                            pivote2 = false;
                        } 
                        if ($('#valor2').val() == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Falto ingresar el valor'
                            });
                            pivote2 = false;
                        }

                     if (pivote2 == true) {
                            Swal.fire('Guardado!', '', 'success');
                            form2.submit();
                        }
                }
            });    
        });
        });
    </script>
    
    <!-- EDN CDN ALERT 2 -->
@endsection
