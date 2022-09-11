@extends('layouts.master')
@section('addBreadcrumbs')
    <li class="active">
        <a href=""><i class="fa fa-music" aria-hidden="true"></i> Canciones</a>
    </li>
@endsection
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-music" aria-hidden="true"></i>
        Historico canción
    </h1>
    <a href="/admin" class="btn btn-warning">
        <i class="voyager-home"></i> <span class="hidden-xs hidden-sm">Volver al inicio</span>
    </a>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div id="admin" class="tab-pane fade active in">
                    <div class="form-group row panel-heading">
                        <input type="hidden" id="id_cancion" value="{{ $cancion->id }}">
                        <legend>Detalles de canción</legend>
                        <div class="panel-title col-sm-4">
                            <h3><code>Título</code></h3>
                            {{ $cancion->titulo }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Versión / Subtítulo</code></h3>
                            {{ $cancion->version_subtitulo }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Tipo secundario</code></h3>
                            {{ $cancion->tipo_secundario }}
                        </div>
                    </div>
                    <div class="form-group row panel-heading">
                        <div class="panel-title col-sm-4">
                            <h3><code>Instrumental</code></h3>
                            {{ $cancion->instrumental }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Autor</code></h3>
                            {{ $cancion->autor }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Compositor</code></h3>
                            {{ $cancion->compositor }}
                        </div>
                        <legend></legend>
                    </div>
                    <div class="form-group row panel-heading">
                        <div class="panel-title col-sm-4">
                            <h3><code>Arreglista</code></h3>
                            {{ $cancion->arreglista }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Productor</code></h3>
                            {{ $cancion->productor }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Pline</code></h3>
                            {{ $cancion->pline }}
                        </div>
                        <legend></legend>
                    </div>
                    <div class="form-group row panel-heading">
                        <div class="panel-title col-sm-4">
                            <h3><code>Año de producción</code></h3>
                            {{ $cancion->annio_produccion }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Género</code></h3>
                            {{ $cancion->genero }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Subgénero</code></h3>
                            {{ $cancion->subgenero }}
                        </div>
                        <legend></legend>
                    </div>
                    <div class="form-group row panel-heading">
                        <div class="panel-title col-sm-4">
                            <h3><code>Género secundario</code></h3>
                            {{ $cancion->genero_secundario }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Subgénero secundario</code></h3>
                            {{ $cancion->subgenero_secundario }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Letra chocante o vulgar</code></h3>
                            {{ $cancion->letra_chocante_vulgar }}
                        </div>
                        <legend></legend>
                    </div>
                    <div class="form-group row panel-heading">
                        <div class="panel-title col-sm-4">
                            <h3><code>Inicio de la previsualización</code></h3>
                            {{ $cancion->inicio_previsualizacion }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Idioma del título</code></h3>
                            {{ $cancion->idioma_titulo }}
                        </div>
                        <div class="panel-title col-sm-4">
                            <h3><code>Fecha principal de salida</code></h3>
                            {{ $cancion->fecha_principal_salida }}
                        </div>
                        <legend></legend>
                    </div>
                </div>
                <legend>Historico de la canción</legend>
                <div class="table-responsive">
                    <table id="tablaCanciones" name="tablaCanciones" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Año</th>
                                <th class="text-center">Mes</th>
                                <th class="text-center">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
<script>
    $('#tablaCanciones').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            paging: true,
            serverSide: true,
            processing: true,
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            cache: false,
            ajax: {
                url: '/datatable/cancion/' + $('#id_cancion').val(),
                type: 'GET',
                data: function(data) {},
                async: true,
            },
            columns: [
                {data: 'annio',orderable: true, searchable: true, className: 'text-center'},
                {data: 'mes_reporte', orderable: true, searchable: true, className: 'text-center'},
                {data: 'valores', orderable: true, searchable: true, className: 'text-center'},
            ],
            autoWidth: false,
            drawCallback: function(settings) {
                $('.valor').inputmask('decimal', {
                    'alias': 'numeric',
                    'groupSeparator': ',',
                    'autoGroup': true,
                    'digits': 2,
                    'radixPoint': ".",
                    'digitsOptional': false,
                    'allowMinus': false,
                    'prefix': 'USD ',
                    'placeholder': '0',
                    'numericInput': true,
                    'removeMaskOnSubmit': true,
                    'rightAlign': false
                });
            }
        });
</script>
@endsection
