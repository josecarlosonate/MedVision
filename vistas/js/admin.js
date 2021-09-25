$(document).ready(function() {
    //recorrer img y nombre
    $('.imgPersona, .nombrePersona').on('click', function() {
        mostrarInfo($(this).attr('id'));
    });

});

//mostar mas info de la persona ala dar click
function mostrarInfo(id) {
    let num = id.slice(-1);
    $('#caja' + num).toggle(1100);
}