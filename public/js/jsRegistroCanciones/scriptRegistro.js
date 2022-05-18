$(document).ready(function () {

    let cantcol = 0;
    let cantcolArtista = 0;
    let cantcolFeaturing = 0;

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

            if(suma == 100){

                let form = $('#formRegistro');

                Swal.fire({
                    title: '¿Quieres guardar los cambios?',
                    text: "Soy consciente de que una vez creado la canción no podré hacer modificaciones.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('Guardado!', '', 'success');
                        form.submit();
                    }
                });
            }else{
                Swal.fire({
                    title: 'Error en los colaboradores',
                    text: 'El porcentaje de colaboración debe ser igual a 100',
                    icon: 'warning'
                });
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
        $("#cantcol").val(cantcol);
    });

    $("#addcol-artista").on('click', function () {
        cantcolArtista += 1;

        let cola =
            `
            <div class="form-group row" id="artista-` + cantcolArtista + `">
                <div class="col-md-12">
                    <label for="nombreartista">Ingresar nombre del artista</label>
                    <br>
                    <input type="text" id="nombreartista-` + cantcolArtista + `" name="nombreartista[]" class="form-control" required>
                </div>
            </div>
            `;

        $("#zoneaddcol-artista").append(cola);
    });

    $("#addcol-featuring").on('click', function () {
        cantcolFeaturing += 1;

        let cola =
            `
            <div class="form-group row" id="featuring-` + cantcolFeaturing + `">
                <div class="col-md-12">
                    <label for="nombrefeaturing">Ingresar nombre del featuring</label>
                    <br>
                    <input type="text" id="nombrefeaturing-` + cantcolFeaturing + `" name="nombrefeaturing[]" class="form-control" required>
                </div>
            </div>
            `;

        $("#zoneaddcol-featuring").append(cola);
    });

    $("#delcol").on("click", function () {

        if (cantcol > 0) {
            $("#cola-" + cantcol).remove();

            cantcol -= 1;
            $("#cantcol").val(cantcol);

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "Primero debes añadir un colaborador"
            });
        }
    });

    $("#delcol-artista").on("click", function () {

        if (cantcolArtista > 0) {
            $("#artista-" + cantcolArtista).remove();

            cantcolArtista -= 1;

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "Primero debes añadir otro artista"
            });
        }
    });

    $("#delcol-featuring").on("click", function () {

        if (cantcolFeaturing > 0) {
            $("#featuring-" + cantcolFeaturing).remove();

            cantcolFeaturing -= 1;

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "Primero debes añadir un Featuring"
            });
        }
    });

});
