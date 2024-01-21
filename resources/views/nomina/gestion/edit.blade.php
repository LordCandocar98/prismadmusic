@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('nomina.index') }}"><i class="fa fa-university" aria-hidden="true"></i></i> Gestion de
            Nominas</a>
    </li>
    <li class="active">
        <a href="{{ route('nomina.create') }}"><i class="voyager-edit" aria-hidden="true"></i></i> Editar Nomina</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-edit" aria-hidden="true"></i>
        Cargar Nomina
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
                <form enctype="multipart/form-data" action="{{ url('nomina/' . $nomina->id) }}" method="post">
                    {!! method_field('PUT') !!}
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
                        <legend>CARGA DE DESPRENDIBLE</legend>
                        <div class="form-group  col-md-12 ">
                            <label for="idCliente">Cliente</label>
                            <select class="cliente col-md-12" name="idCliente" id="idCliente">
                                <option value="{{ $client->id }}" selected>
                                    {{ $persona->numero_identificacion . ' - ' . $persona->nombre . ' ' . $persona->apellido }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="fileDesprendible">Desprendible</label>
                            <input type="file" name="fileDesprendible" id="fileDesprendible" />
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="fecha_Desprendible">Fecha Desprendible</label>
                            <input type="date" class="form-control" name="fecha_Desprendible" id="fecha_Desprendible"
                                placeholder="Fecha Desprendible" value="">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="valor">Valor</label>
                            <input type="number" class="form-control" name="valor" id="valor" required="" step="any" readonly
                                placeholder="Valor" value="{{ $nomina->valor }}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <button type="submit" class="btn btn-primary save">Guardar</button>
                            <a href="{{ route('nomina.index') }}" title="cancelar" class="btn btn-danger pull-right">
                                Cancelar
                            </a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegalias/gestion/scriptEdit.js') }}"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
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
            FilePondPluginFileEncode,
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview,
            FilePondPluginMediaPreview,
            FilePondPluginFileValidateType
        );

        const input = document.querySelector('input[name="fileDesprendible"]');

        // Create a FilePond instance
        let pond = FilePond.create(input, {
            storeAsFile: true,
            labelIdle: 'Arrastra y suelta tu archivo o <span class="filepond--label-action">examinar</span>',
            maxParallelUploads: 1,
            allowFileTypeValidation: true,
            acceptedFileTypes: ['application/pdf', 'image/*'],
        });

        FilePond.setOptions(labels_es_ES);

    </script>
@endsection
