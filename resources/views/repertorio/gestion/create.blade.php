@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href="{{ route('repertorio.index') }}"><i class="fa fa-music" aria-hidden="true"></i> Gestion de Repertorios</a>
    </li>
    <li class="active">
        <a href="{{ route('repertorio.create') }}"><i class="voyager-plus" aria-hidden="true"></i> Crear</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus" aria-hidden="true"></i>
        Producto
    </h1>
@endsection

@section('css')
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
<link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet"/>
<style>

    body, html, .form-control{
        color: #1e1f20!important;
    }

    .parrafo{
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
</style>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form action="{{ route('repertorio.store') }}" method="post" id="formRegistro" name="formRegistro" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6 {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                <label for="titulo" class="{{ $errors->has('titulo') ? 'has-error' : '' }}">Título de salida al mercado</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ejemplo: Lovely"
                                    value="{{ old('titulo') }}">
                                @if ($errors->has('titulo'))
                                    <span class="form-validation">{{ $errors->first('titulo') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('version') ? 'has-error' : '' }}">
                                <label for="version">Versión/Subtitulo</label>
                                <input type="text" class="form-control" id="version" name="version" placeholder="Ejemplo: Muse"
                                    value="{{ old('version') }}">
                                @if ($errors->has('version'))
                                    <span class="form-validation">{{ $errors->first('version') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 {{ $errors->has('genero') ? 'has-error' : '' }}">
                                <label for="genero" class="{{ $errors->has('genero') ? 'text-danger' : '' }}">Género</label>
                                <br>
                                <select class="genero" name="genero" id="genero" style="width: 100%;">
                                    <option value="none" selected disabled hidden>Seleccione una opción</option>
                                    @foreach ($genre as $ge)
                                        <option value="{{ $ge->nombre }}">{{ $ge->nombre }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('genero'))
                                    <span class="form-validation">{{ $errors->first('genero') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('subgenero') ? 'has-error' : '' }}">
                                <label for="subgenero" class="{{ $errors->has('subgenero') ? 'text-danger' : '' }}">Sub-género</label>
                                <br>
                                <select class="subgenero" name="subgenero" id="subgenero" style="width: 100%;">
                                    <option value="none" selected disabled hidden>Seleccione una opción</option>
                                    @foreach ($subgenre as $sge)
                                        <option value="{{ $sge->nombre }}">{{ $sge->nombre }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('subgenero'))
                                    <span class="form-validation">{{ $errors->first('subgenero') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('nombre_sello') ? 'has-error' : '' }}">
                                <label for="nombre_sello" class="{{ $errors->has('nombre_sello') ? 'text-danger' : '' }}">Nombre del Sello discográfico</label>
                                <input type="text" class="form-control" id="nombre_sello" name="nombre_sello" placeholder="Ejemplo: Rimas Entertainment"
                                value="{{ old('nombre_sello') }}">
                                @if ($errors->has('nombre_sello'))
                                    <span class="form-validation">{{ $errors->first('nombre_sello') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 {{ $errors->has('formato') ? 'has-error' : '' }}">
                                <label for="formato" class="{{ $errors->has('formato') ? 'text-danger' : '' }}">Formato</label>
                                <br>
                                <select class="formato" name="formato" id="formato" style="width: 100%;">
                                <option value="none" selected disabled hidden>Seleccione una opción</option>
                                    <option value="SINGLE" {{ old('formato') == "SINGLE" ? 'selected' : '' }}>SINGLE</option>
                                    <option value="EP"{{ old('formato') == "EP" ? 'selected' : '' }}>EP</option>
                                    <option value="ALBUM"{{ old('formato') == "ALBUM" ? 'selected' : '' }}>ALBUM</option>
                                </select>
                                @if ($errors->has('formato'))
                                    <span class="form-validation">{{ $errors->first('formato') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('annio_produccion') ? 'has-error' : '' }}">
                                <label for="annio_produccion" class="{{ $errors->has('annio_produccion') ? 'text-danger' : '' }}">Año de producción</label>
                                <input type="number" step="1" value="2022" class="form-control" id="annio_produccion" name="annio_produccion"
                                    value="{{ old('annio_produccion') }}">
                                @if ($errors->has('annio_produccion'))
                                    <span class="form-validation">{{ $errors->first('annio_produccion') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('productor') ? 'has-error' : '' }}">
                                <label for="productor" class="{{ $errors->has('productor') ? 'text-danger' : '' }}">Productor</label>
                                <input type="text" class="form-control" id="productor" name="productor" placeholder="Ejemplo: Bad Bunny"
                                    value="{{ old('productor') }}">
                                @if ($errors->has('productor'))
                                    <span class="form-validation">{{ $errors->first('productor') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 {{ $errors->has('copyright') ? 'has-error' : '' }}">
                                <label for="copyright" class="{{ $errors->has('copyright') ? 'text-danger' : '' }}">Copyright</label>
                                <input type="text" class="form-control" id="copyright" name="copyright" value="{{ old('copyright') }}">
                                @if ($errors->has('copyright'))
                                    <span class="form-validation">{{ $errors->first('copyright') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('numero_catalogo') ? 'has-error' : '' }}">
                                <label for="numero_catalogo" class="{{ $errors->has('numero_catalogo') ? 'text-danger' : '' }}">Num. de catálogo Productor <i class="fa fa-question-circle" aria-hidden="true" data-toggle="popover" title="Si no sabes qué poner en el Número de Catálogo por favor déjarlo vacío."></i></label>
                                <input type="text" class="form-control" id="numero_catalogo" name="numero_catalogo"
                                    value="{{ old('numero_catalogo') }}">
                                @if ($errors->has('numero_catalogo'))
                                    <span class="form-validation">{{ $errors->first('numero_catalogo') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('upc_ean') ? 'has-error' : '' }}">
                                <label for="upc_ean" class="{{ $errors->has('upc_ean') ? 'text-danger' : '' }}">UPC/EAN <i class="fa fa-question-circle" aria-hidden="true" data-toggle="popover" title="Si no sabes qué poner en UPC por favor déjarlo vacío."></i></label>

                                <input type="text" class="form-control" id="upc_ean" name="upc_ean"
                                    value="{{ old('upc_ean') }}">
                                @if ($errors->has('upc_ean'))
                                    <span class="form-validation">{{ $errors->first('upc_ean') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label for="fecha_lanzamiento" class="{{ $errors->has('fecha_lanzamiento') ? 'text-danger' : '' }}">Fecha de Lanzamiento <i class="fa fa-question-circle" aria-hidden="true" data-toggle="popover" title="La fecha de lanzamiento debe ser al menos 5 días después de hoy."></i></label>
                                <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento"
                                    value="{{ old('fecha_lanzamiento') }}" min="{{date('Y-m')}}-{{date('d')+6}}">
                                @if ($errors->has('fecha_lanzamiento'))
                                    <span class="form-validation">{{ $errors->first('fecha_lanzamiento') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" {{ $errors->has('portada') ? 'has-error' : '' }}>
                            <div class="col-md-8">
                                <div class="alert alert-info" role="alert">
                                    <p>Requisitos y especificaciones para la carátula:</p>
                                    <ul>
                                        <li>Formato de archivo: JPG, PNG</li>
                                        <li>Tamaño de al menos: 3000x3000 píxeles</li>
                                        <li>Tamaño del archivo: No puede superar los 35 MB</li>
                                        <li>Color: RGB (incluyendo imagenes en blanco y negro</li>
                                        <li>Resolución: 72 dpi</li>
                                    </ul>
                                    <p>La carátula no puede tener ningún tipo de logos, información de páginas web, fechas de lanzamiento ni publicidad de algún tipo.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="portada" class="{{ $errors->has('portada') ? 'text-danger' : '' }}">Carga una Imagen de Portada</label>
                                <input type="file" class="filepond my-pond" allowFileEncode id="cover" name="cover" data-max-file-size="35MB" data-max-files="1" accept="image/png, image/jpeg" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="checkbox" name="confirmation" id="confirmation">
                                <label for="confirmation">Soy consciente de que una vez creado el Repertorio no podré hacer modificaciones.</label>
                                @if ($errors->has('confirmation'))
                                    <span class="form-validation" style="display: block;">{{ $errors->first('confirmation') }}</span>
                                @endif
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

    <!-- CDN ALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- EDN CDN ALERT 2 -->

    <!-- CDN FILEPOND -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <!-- Fin CDN FILEPOND -->

    <script>
    $(function(){

        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize
        );

        FilePond.create(document.querySelector('.filepond'), {
            labelIdle: 'Arrastra y suelta tu archivo o <span class="filepond--label-action">examinar</span>',
            storeAsFile: true,
            allowFileTypeValidation: true,
            labelMaxFileSizeExceeded: 'Archivo demasiado pesado',
            labelMaxFileSize: 'El tamaño maximo es de 35MB',
            acceptedFileTypes: ['image/jpg', 'image/png', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise
                    resolve(type);
                }),
        });

        FilePond.setOptions({
            server: {
                  url: "{{ url('uploadcover') }}",
                  process: {
                      headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        method: 'POST',
                      },
                      onerror: (response) => { Swal.fire({
                                icon: 'error',
                                title:'Error',
                                text: JSON.parse(response).message.cover[0]
                            });
                        },
                    }
              }
          });
    });
    </script>
@endsection