function calculadora() {
    $.ajax({
        url: "operacion.php",
        data: $("#resultado").serialize(),
        type: "post",
        dataType: "json",
        cache: false,
        success: function (resultado) {
            console.log(resultado);
            if (resultado) {
                alertify.success(resultado.mensaje);
                refrescar();
            } else {
                alertify.error('Problemas al agregar');
            }
        },
        error: function (resultado) {
            console.log(resultado);
        }
    });
}