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
        },
    });
    $('.repertorio_id').val('-1').trigger('change');

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
        },
    });
    $('.genero').val('-1').trigger('change');

    $('.subgenero').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.subgenero').val('-1').trigger('change');

    $('.genero_secundario').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.genero_secundario').val('-1').trigger('change');

    $('.subgenero_secundario').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.subgenero_secundario').val('-1').trigger('change');

    $('.idioma_titulo').select2({
        allowClear: true,
        placeholder: {
            id: -1,
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
