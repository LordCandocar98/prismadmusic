$(document).ready(function () {
    $('.genero').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });

    if($('.genero').val() == null){
        $('.genero').val('-1').trigger('change');
    }

    $('.subgenero').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    if($('.subgenero').val() == null){
    $('.subgenero').val('-1').trigger('change');
    }

    $('.formato').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    if($('.formato').val() == null){
        $('.formato').val('-1').trigger('change');
    }

    $('.artista_principal').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    if($('.artista_principal').val() == null){
        $('.artista_principal').val('-1').trigger('change');
    }

    $('#nombre_sello').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });
    if($('#nombre_sello').val() == null){
        $('#nombre_sello').val('-1').trigger('change');
    }
});