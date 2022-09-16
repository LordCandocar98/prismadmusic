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
            {data: 'fecha_principal_salida', orderable: true, searchable: true, className: 'text-center'},
            {data: 'link_preguardado', orderable: true, searchable: true, className: 'text-center'},
            {data: 'participacion', orderable: true, searchable: true, className: 'text-center'},
            {data: 'accion', orderable: false, searchable: false, className: 'text-center'},
        ],
        autoWidth: false
    });
});