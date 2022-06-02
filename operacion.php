<?php
// extract($_REQUEST);
// include "conexion/Conexion.php";
// error_reporting(0);

$user = "root";
$pass = "";
$host = "localhost";

// conexion con db
$connection =mysqli_connect($host, $user, $pass);

if (isset($_GET['Calcular'])){
    $val1= $_GET['num1'];
    $val2= $_GET['num2'];
    $op= $_GET['operaciones'];

    if ($val1 != "" && $val2 != ""){
        if ($op == "0"){
            // echo $resultado = "";
            // echo "Por favor, elija una operación.";
            echo '<script language="javascript">alert("Por favor, elija una operación.");</script>';
        }else if ($op == "1"){
            $result=$val1+$val2; 
        }else if ($op == "2"){
            $result=$val1-$val2;
        }else if ($op == "3"){
            $result=$val1*$val2;
        }else if ($op == "4"){
            if ($val1 != 0 && $val2 != 0){
                $result=$val1/$val2;
                // echo $resultado;
            }
            if ($val1 == 0 || $val2 == 0){
                // echo "Por favor, ingrese los valores en los campos.";
                echo '<html language="javascript">alert("Por favor, ingrese los valores en los campos.");</html>';
            }
        }
    }
    
    if(isset($_REQUEST['Limpiar'])){
        $val1= $_REQUEST['num1'];
        $val2= $_REQUEST['num2'];
        $op = $_REQUEST['operaciones'];
        if ($val1 == "" && $val2 == "")  {
            $result = "";
        }
    }
}

    if(isset($_POST['calculadora'])){
        $id = "";
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $_POST['resultado'];
        $operaciones = $_POST['operaciones'];


        $insertData = "INSERT INTO calculadora VALUES('$id','$num1','$num2','$result','$operaciones')";
    }
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <!-- fuente Kanit -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <!-- Estilos bootstrap y css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- librerias de js -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
    <!-- <script src="bootstrap.min.js"></script> -->

    
</head>
<body>

<!-- get formulario-->
        <div class="container">
            <div>
                <h1>Calculadora</h1>
            </div>
            <div class="row">
                <div class="col-md-12 justify-content-center">
                    <form id="form" name="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                        <div class="col-md-4">
                            <div class="col-lg-12 align-items-center">
                                <input type="number" class="form-control" id="num1" name="num1" placeholder="Ingrese el primer valor">
                            </div>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" id="num2" name="num2" placeholder="Ingrese el segundo valor">
                            </div>
                            <div class="col-lg-12">
                                <select id="operaciones" name="operaciones" class="form-control">
                                    <option value="0">Operacion</option>
                                    <option value="1">Suma</option>
                                    <option value="2">Resta</option>
                                    <option value="3">Multiplicación</option>
                                    <option value="4">División</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" id="result" value="<?php echo $result ?>" placeholder="Resultado" readonly>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-success" id="Calcular" name="Calcular">
                                <button type="submit" value="Limpiar" class="btn btn-danger">Limpiar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="content">
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid" style="margin-top:50px;">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-2">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tblOperacion" width="99.85%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Numero 1</th>
                                        <th>Numero 2</th>                                                                    
                                        <th>Resultado</th>
                                        <th>Operacion</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="fila" class="primeraFila">
                                        <td id="num1"><?php echo $val1 ?></td>
                                        <td id="num1"><?php echo $val1 ?></td>
                                        <td id="num2"><?php echo $val2 ?></td>
                                        <td id="result"><?php echo $result ?></td>
                                        <td id="operaciones"><?php echo $operaciones ?></td>
                                        <td id="fecha"><?php echo $_POST['Fecha'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->

</div>

    </body>
</html>
