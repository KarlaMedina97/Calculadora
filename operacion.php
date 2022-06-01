<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- <script src="bootstrap.min.js"></script> -->
    <script src="js/formulario.js"></script>
</head>
<body>
    <h1>Calculadora</h1>
    <br/>
    <div class="col-md-4">
        <form id="form" name="form" action="operacion.php" method="post">
            <div>
                <input type="number" class="form-control" name="numero1" placeholder="Ingrese el primer valor">
            </div>
            <div>
                <input type="number" class="form-control" name="numero2" placeholder="Ingrese el segundo valor">
            </div>
            <div>
                <select name="operaciones" class="form-control">
                    <option value="0">Suma</option>
                    <option value="1">Resta</option>
                    <option value="2">Multiplicación</option>
                    <option value="3">División</option>
                </select>
            </div>
            <br/>
            <div>
                <input type="submit" class="btn btn-success" value="Calcular" name="Calcular">
                <button type="reset" value="Limpiar" class="btn btn-danger">Limpiar</button>
            </div>
            <br/>
            <!-- <div>
                <input class="form-control" type="number" id="resultado" readonly>
            </div> -->
        </form>
    </div>
</body>
</html>

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
?>