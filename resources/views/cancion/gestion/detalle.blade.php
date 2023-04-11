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
                <legend>Detalles de canción</legend>
                <div class="table-responsive">
                    <table id="infoSong" name="infoSong" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><strong>Título</strong></th>
                                <th class="text-center">{{ $cancion->titulo ?? '' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><strong>Versión / Subtítulo</strong></td>
                                <td class="text-center">{{ $cancion->version_subtitulo ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Tipo secundario</strong></td>
                                <td class="text-center">{{ $cancion->tipo_secundario ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Instrumental</strong></td>
                                <td class="text-center">{{ $cancion->instrumental ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Autor</strong></td>
                                <td class="text-center">{{ $cancion->autor ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Compositor</strong></td>
                                <td class="text-center">{{ $cancion->compositor ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Arreglista</strong></td>
                                <td class="text-center">{{ $cancion->arreglista ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Productor</strong></td>
                                <td class="text-center">{{ $cancion->productor ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Pline</strong></td>
                                <td class="text-center">{{ $cancion->pline ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Año de producción</strong></td>
                                <td class="text-center">{{ $cancion->annio_produccion ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Género</strong></td>
                                <td class="text-center">{{ $cancion->genero ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Subgénero</strong></td>
                                <td class="text-center">{{ $cancion->subgenero ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Género secundario</strong></td>
                                <td class="text-center">{{ $cancion->genero_secundario ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Subgénero secundario</strong></td>
                                <td class="text-center">{{ $cancion->subgenero_secundario ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Letra chocante o vulgar</strong></td>
                                <td class="text-center">{{ $cancion->letra_chocante_vulgar ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Inicio de la previsualización</strong></td>
                                <td class="text-center">{{ $cancion->inicio_previsualizacion ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Idioma del título</strong></td>
                                <td class="text-center">{{ $cancion->idioma_titulo ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><strong>Fecha principal de salida</strong></td>
                                <td class="text-center">{{ $cancion->fecha_principal_salida ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <legend>Historico de la canción</legend>
                @if (Auth::user()->role_id === 3)
                <a href="{{ url('/hitorico-cancion/show/' . $cancion->id) }}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>Crear Historico de Canción</span>
                </a>
                @endif
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
            url: '/datatable/cancion/' + '{{ $cancion->id }}',
            type: 'GET',
            data: function(data) {},
            async: true,
        },
        columns: [
            {data: 'descripcion',orderable: true, searchable: true, className: 'text-center'},
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

    $('#infoSong').DataTable({
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
        paging: false,
        searching: false,
        ordering: false,
        info: false,
        cache: false,
        "columnDefs": [
            { "width": "30%", "targets": 0 }
        ]
    });
</script>
@endsection
