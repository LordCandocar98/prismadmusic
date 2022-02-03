$(document).ready(function () {
    $('.cliente').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: "Seleciona un Cliente"
        },
    });
    $('.cliente').val('-1').trigger('change');
    
});
