$(document).ready( function () {
    $('#datatable').DataTable({
        paging      : true,
        lengthChange: true,
        searching   : true,
        ordering    : true,
        info        : true,
        processing: true,
        serverSide: true,
        scrollX:        true,
        scrollCollapse: true,
        ajax: {
            url: '/admin/datable-clientes',
            type: 'GET',
        },
        language: {
            "sProcessing":     "Procesando...",
            "show":             "mostrar",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "infoFiltered":    "(Filtrando _MAX_ En Total)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        columns: [
        {
            data: 'documento_identidad',
            orderable: true,
            searchable: true,
            className: 'text-center'
        },
        {
            data: 'nombre_completo',
            orderable: false,
            searchable: true,
            className: 'text-center'
        },
        {
            data: 'email',
            orderable: true,
            searchable: true,
            className: 'text-center'
        },
        {
            data: 'saldo_total',
            orderable: true,
            searchable: false,
            className: 'text-center'
        }
    ]});
});