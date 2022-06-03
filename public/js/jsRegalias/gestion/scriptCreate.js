$(document).ready(function () {
    $('.cancion').select2({
        placeholder: "Seleccione una canción",
        allowClear: true,
        ajax: {
            url: "/getCanciones",
            type: "get",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term // search term
                };
            },
            processResults: function (response) {
                //console.log(response);
                return {
                    results: response
                };
            },
            cache: true
        }
    });
    //$('.cancion').val('-1').trigger('change');
    $('.cancion').on('change', function (e) {
        var title = $(this).select2('data')[0].text;
        $('#item_title').val(title);
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
