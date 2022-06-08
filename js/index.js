$(document).ready(function(){

  $('#btn-limpiar').on('click', function (){
    $('#numero1').val('');
    $('#numero2').val('');
    $('#operacion').val('');
    $('#txt-result').val('');
  });

  // Form
  $('#form-calculadora').submit(function (){
    if($('#operacion').val('Division')){
      if (($("#numero1").val() <= 0) || ($("#numero2").val() <= 0)){
          $("#modal-division").modal('show');
        // Swal.fire({
        //   title: 'Error!',
        //   text: 'Por favor, ingrese un valor mayor a cero.',
        //   icon: 'error',
        //   confirmButtonText: 'Aceptar'
        // });
      }
    }
    $.ajax({
      url: 'php/calcular.php',
      data: $('#form-calculadora').serialize(),
      type: 'get',
      beforeSend: function(){},
      success: function(data){
        console.log( 'success: ', data );
        $('#txt-result').val(data.resultado);
        // Append
        let sHtmlBodyHistorial = '<tr>';
        sHtmlBodyHistorial += "<td>" + data.id +"</td>";
        sHtmlBodyHistorial += "<td>" + data.num1 +"</td>";
        sHtmlBodyHistorial += "<td>" + data.num2 +"</td>";
        sHtmlBodyHistorial += "<td>" + data.operacion +"</td>";
        sHtmlBodyHistorial += "<td>" + data.resultado +"</td>";
        sHtmlBodyHistorial += "<td>" + data.fecha +"</td>";
        sHtmlBodyHistorial += '</tr>';
        $('#tbody-historial').prepend(sHtmlBodyHistorial);
      },
      error: function(data){
        console.log( 'error: ', data );
      }
    });
    return false;
  });
  
});