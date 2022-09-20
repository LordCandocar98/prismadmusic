$(document).ready( function () {

    $('#idCliente').select2();
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
            url: '/datatable/canciones-cliente',
            type: 'GET',
            data: function(data) {
                data.email = $('#correo').val()
            },
            async: true,
        },
        columns: [
            {data: 'titulo',orderable: true, searchable: true, className: 'text-center'},
            {data: 'annio_produccion', orderable: true, searchable: true, className: 'text-center'},
            {data: 'total', orderable: true, searchable: true, className: 'text-center'},
            {data: 'link_preguardado', orderable: true, searchable: true, className: 'text-center'},
            {data: 'participacion', orderable: true, searchable: true, className: 'text-center'},
            {data: 'accion', orderable: false, searchable: false, className: 'text-center'},
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
});