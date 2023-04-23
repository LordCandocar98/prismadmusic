$(document).ready(function () {

    var colaboradores= $('#colaboradores').DataTable({
        paging: false,
        "searching": false,
        "info": true,
        "lengthChange": false,
        "ordering": false,
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
        order: [[ 0, 'desc' ]]
    });

    $('.cancion').select2({
        placeholder: "Seleccione una canción",
        allowClear: false,
    });
    
    //$('.cancion').val('-1').trigger('change');
    $('.cancion').on('change', function (e) {
        var title = $(this).select2('data')[0].text;
        $('#item_title').val(title);

        colaboradores.clear().draw();

        let cancion = $('#idcancion').val();

        $.ajax({
            url: "/getColaboradores?cancion=" + cancion,
            type: "GET",
            success: function(response) {
                // Se ejecuta cuando se recibe la respuesta exitosa
                console.log(response);
                
                $.each(response, function (key, input) {
                    colaboradores.row.add([
                        input.nombre,
                        input.correo,
                        input.porcentaje
                    ]).draw(false);
                });
            },
            error: function(xhr, status, error) {
                // Se ejecuta si hay un error
                console.log(error);
            }
        });
    });

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
});
