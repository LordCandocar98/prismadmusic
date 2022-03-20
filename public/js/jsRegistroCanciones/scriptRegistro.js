$(document).ready(function () {
    $('.cliente_id').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.cliente_id').val('-1').trigger('change');

    $('.repertorio_id').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });
    
    if ($('.repertorio_id').val() == null) {
        $('.repertorio_id').val('-1').trigger('change');
    }

    $('.featuring').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.featuring').val('-1').trigger('change');

    $('.remixer').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.remixer').val('-1').trigger('change');

    $('.autor').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.autor').val('-1').trigger('change');

    $('.genero').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });
    if ($('.genero').val() == null) {
        $('.genero').val('-1').trigger('change');
    }
    $('.subgenero').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });
    if ($('.subgenero').val() == null) {
        $('.subgenero').val('-1').trigger('change');
    }
    $('.genero_secundario').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });

    if ($('.genero_secundario').val() == null) {
        $('.genero_secundario').val('-1').trigger('change');
    }
    $('.subgenero_secundario').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });

    if ($('.subgenero_secundario').val() == null) {
        $('.subgenero_secundario').val('-1').trigger('change');
    }
    $('.idioma_titulo').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });
    $('.idioma_titulo').val('-1').trigger('change');

    $('.idioma_letra').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.idioma_letra').val('-1').trigger('change');

});
