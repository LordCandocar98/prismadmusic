$(document).ready(function () {

    let cantcol = 0;

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

    $('.instrumental').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });

    $('.letra_chocante_vulgar').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });

    $('.idioma_titulo').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: 'Seleccione una opción'
        },
    });

    $('.idioma_letra').select2({
        allowClear: true,
        placeholder: {
            id: -1,
        },
    });

    $("#porcentaje_intelectualCreador").change(function () {
        let suma = parseFloat($("#porcentaje_intelectualCreador").val());
        for (let i = 1; i <= cantcol; i++) {
            suma += parseFloat($("#po-" + i).val());
        }
        if (suma == 100) {
            $("#addsong").prop('disabled', false);
        } else {
            $("#addsong").prop('disabled', true);
        }
    });

    $("#addcol").on('click', function () {
        cantcol += 1;

        let cola =
            `
            <div class="form-group row" id="cola-` + cantcol + `">
                <div class="col-md-8">
                    <label for="emailcol">Correo electrónico del colaborador</label>
                    <br>
                    <input type="email" id="email-` + cantcol + `" name="infocol[]" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="porccol">Porcentaje del colaborador</label>
                    <br>
                    <input type="number" id="po-` + cantcol + `" name="infocol[]" class="form-control" min="0" max="100" required>
                </div>
            </div>
            `;

        $("#zoneaddcol").append(cola);

        $("#po-" + cantcol).change(function () {
            let suma = parseFloat($("#porcentaje_intelectualCreador").val());
            for (let i = 1; i <= cantcol; i++) {
                suma += parseFloat($("#po-" + i).val());
            }
            if (suma == 100) {
                $("#addsong").prop('disabled', false);
            } else {
                $("#addsong").prop('disabled', true);
            }
        });

        $("#email-" + cantcol).change(function () {
            if ($("#email-" + cantcol).val() == $("#session_email").val()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "No se puede agregar el correo como colaborador"
                });
                $("#email-" + cantcol).val('');
            }
        });
    });

    $("#delcol").on("click", function () {

        if (cantcol > 0) {
            $("#cola-" + cantcol).remove();

            cantcol -= 1;

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "Primero debes añadir un colaborador"
            });
        }
    });

});
