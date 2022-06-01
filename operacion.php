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
    <div class="container">
        <div>
            <h1>Calculadora</h1>
        </div>
        <div class="row">
            <div class="col-md-12 fix justify-content-center">
                <form id="form" name="form" action="operacion.php" method="post">
                    <div class="col-md-8 form-group">
                        <div class="col-lg-8">
                            <input type="number" class="form-control" name="numero1" placeholder="Ingrese el primer valor">
                        </div>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" name="numero2" placeholder="Ingrese el segundo valor">
                        </div>
                        <div class="col-lg-8">
                            <select name="operaciones" class="form-control">
                                <option value="0">Operacion</option>
                                <option value="1">Suma</option>
                                <option value="2">Resta</option>
                                <option value="3">Multiplicación</option>
                                <option value="4">División</option>
                            </select>
                        </div>
                        <div class="col-lg-8">
                            <input type="submit" class="btn btn-success" value="Calcular" name="Calcular">
                            <button type="reset" value="Limpiar" class="btn btn-danger">Limpiar</button>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="number" id="resultado" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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

            case 1:echo op_mate::sumar($val1,$val2); break;
            case 2:echo op_mate::restar($val1,$val2);break;
            case 3:echo op_mate::multiplicar($val1,$val2);break;
            case 4:echo op_mate::dividir($val1,$val2);break;
        }
    }
    
?>