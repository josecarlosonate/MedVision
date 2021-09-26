$(document).ready(function() {
    //recorrer img y nombre
    $('.imgPersona, .nombrePersona').on('click', function() {
        mostrarInfo($(this).attr('id'));
    });

    //buscar persona
    $('#btnBuscar').on('click', function() {
        buscarPersona();
    });

});

//mostar mas info de la persona ala dar click
function mostrarInfo(id) {
    let num = id.slice(-1);
    $('#caja' + num).toggle(1100);
}

//buscar info de persona por id
function buscarPersona() {
    let id = $('#idPer').val();
    if (!id) {
        Swal.fire({
            title: '¡Error!',
            text: 'El campo Id Persona no puede estar vacio',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    } else {
        $.ajax({
            async: true,
            url: "ajax/personas.ajax.php",
            type: "POST",
            data: {
                accion: 'consultar',
                id: id,
            },
            success: function(response) {
                if (!response) {
                    Swal.fire({
                        title: '¡Información!',
                        text: 'No se encontro ningun registro con el id: ' + id + ', intente consultar con otro id .',
                        icon: 'info',
                        confirmButtonText: 'OK'
                    })
                } else {
                    let res = JSON.parse(response);
                    console.log(res.houses);

                    if (res.isMarried === false) {
                        var casado = 'NO';
                    } else {
                        casado = 'SI';
                    }
                    var fecha = Date.parse(res.birthDate);
                    var date = new Date(fecha);
                    //elimino contenido de listado de persona
                    $('.cajaInfo').empty();
                    let valor = '';
                    valor = `
                                <div class="col-md-12">
                                    <div class="card">
                                        <h5 class="card-header">Detalles de la persona con ID: ${res.personID} </h5>
                                        <div class="card-body"> 
                                            <p class="card-text"><b>Primer Nombre:</b> ${res.fisrstName}</p>
                                            <p class="card-text"><b>Apellido:</b> ${res.lastName}</p>
                                            <p class="card-text"><b>Documento:</b> ${res.document}</p>
                                            <p class="card-text"><b>Cumpleaños:</b> ${date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear()} </p>
                                            <p class="card-text"><b>Casado:</b> ${casado}</p>
                                            <p class="card-text text-success"><b>Detalles de residencia</b></p>
                                            <p class="card-text"><b>Descripción:</b> ${res.houses[0]['description']}</p>
                                            <p class="card-text"><b>Dirección:</b> ${res.houses[0]['address']}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                    $('.cajaInfo').html(valor);
                }
            }
        });
    }


}

// validar formulario
// mensajes español
$(document).ready(function() {
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo  es obligatorio.",
        number: "Por favor, escribe un número entero válido.",
        maxlength: jQuery.validator.format(
            "Por favor, no escribas más de {0} caracteres."
        ),
        minlength: jQuery.validator.format(
            "Por favor, no escribas menos de {0} caracteres."
        ),
    });
});
$("#formularioRegistro").validate({
    rules: {
        nombre: {
            required: true,
            minlength: 3,
        },
        apellido: {
            required: true
        },
        doc: {
            required: true,
            number: true
        },
        casado: {
            required: true
        },
        fecha: {
            required: true
        },
        descri: {
            required: true,
            minlength: 3,
            maxlength: 20
        },
        direccion: {
            required: true,
            minlength: 4,
        }
    }
});

// guardar datos de persona
$("#btnGuardar").click(function() {
    if ($("#formularioRegistro").valid() === false) {
        return;
    }
    //datos
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let doc = $("#doc").val();
    let casado = $("#casado").val();
    let fecha = $("#fecha").val();
    let descri = $("#descri").val();
    let direccion = $("#direccion").val();

    // objeto de datos
    let objDatos = {
        document: doc,
        fisrstName: nombre,
        lastName: apellido,
        birthDate: fecha,
        isMarried: casado == 1 ? true : false,
        height: 0,
        description: descri,
        address: direccion,
        ownerID: 0,
        owner: 'No',
    };


    enviarAjax(JSON.stringify(objDatos));

    //enviar por ajax para guardar
    function enviarAjax(datos) {
        $.ajax({
            async: true,
            url: "ajax/personas.ajax.php",
            type: "POST",
            data: {
                accion: "nuevo",
                persona: datos,
            },
            success: function(response) {
                console.log(response);
            }
        });
    }

})