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

    $('.tipo_secundario').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.tipo_secundario').val('-1').trigger('change');

    $('.instrumental').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.instrumental').val('-1').trigger('change');

    $('.letra_chocante_vulgar').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.letra_chocante_vulgar').val('-1').trigger('change');

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
