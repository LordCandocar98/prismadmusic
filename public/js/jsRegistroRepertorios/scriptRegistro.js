$(document).ready(function () {
    $('.tipo_colaboracion').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.tipo_colaboracion').val('-1').trigger('change');

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

    $('.formato').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.formato').val('-1').trigger('change');

    $('.artista_principal').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.artista_principal').val('-1').trigger('change');

    $('.featuring').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    $('.featuring').val('-1').trigger('change');
});