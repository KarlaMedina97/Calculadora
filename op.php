<?php

include("clases.php");
    if (isset($_REQUEST['Calcular'])){

        $val1= $_REQUEST['numero1'];
        $val2= $_REQUEST['numero2'];
        $operacion= $_REQUEST['operaciones'];

        switch($operacion){

            case 0:echo op_mate::sumar($val1,$val2); break;
            case 1:echo op_mate::restar($val1,$val2);break;
            case 2:echo op_mate::multiplicar($val1,$val2);break;
            case 3:echo op_mate::dividir($val1,$val2);break;
        }
    }

// $valor1 = $_POST['valor1'];
// $valor2 = $_POST['valor2'];
// $operacion = $_POST['operacion'];
// $resultado = 0;

// if ($valor1 != "" && $valor2 != ""){
//     }if ($operacion == "Suma"){
//         $resultado=$valor1+$valor2; 
//     }else if ($operacion == "Resta"){
//         $resultado=$valor1-$valor2;
//     }else if ($operacion == "Multiplicacion"){
//         $resultado=$valor1*$valor2;
//     }else if ($operacion == "Division"){
//         if ($valor1 != 0 && $valor2 != 0){
//             $resultado=$valor1/$valor2;
//         }
//         echo "Por favor, ingrese todos los datos.";
//     }
//     echo "No se ha podido resolver la operación, por favor, ingrese todos los datos."

?>