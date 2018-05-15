function inicializar() {
    $("#btnEnviar").click(doClickEnviar);
}

function doClickEnviar(e) {
    if ($("#txtPassword").val() ==  
    $("#txtConfirmPassword").val()) {
        $("#frmCrearUsuario").submit();
    } else {
        //Decirle al usuario que los passwords no coinciden
    }
}

$(function () {
    inicializar();
});