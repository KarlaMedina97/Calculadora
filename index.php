<?php
// extract($_REQUEST);
// include "conexion/Conexion.php";
//error_reporting(0);
require_once("index.html");

$conexion= mysqli_connect('localhost','root', '', 'calculadora');
// date_default_timezone_get('America/Colombia');

if (isset($_GET['Calcular'])){
    $val1= $_GET['num1'];
    $val2= $_GET['num2'];
    $op= $_GET['operaciones'];

    if ($val1 != "" && $val2 != ""){
        if ($op == "Suma"){
            $result=$val1+$val2; 
        }else if ($op == "Resta"){
            $result=$val1-$val2;
        }else if ($op == "Multiplicacion"){
            $result=$val1*$val2;
        }else if ($op == "Division"){
            if ($val1 != 0 && $val2 != 0 && $val1 > 0 && $val2 >0){
                $result=$val1/$val2;
                // echo $resultado;
            }
            echo '<html language="javascript">alert("Por favor, ingrese los valores en los campos.");</html>';
            // echo "Por favor, ingrese los valores en los campos.";
        }else if($val1 == "" && $val2 == "" && $op == 0){
            echo '<html language="javascript">alert("Por favor, ingrese los valores en los campos.");</html>';
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
                                    <option value="Suma">Suma</option>
                                    <option value="Resta">Resta</option>
                                    <option value="Multiplicacion">Multiplicación</option>
                                    <option value="Division">División</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" id="result" value="<?php echo $result ?>" placeholder="Resultado" readonly>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-success" id="Calcular" name="Calcular">
                                <button type="submit" value="Limpiar" class="btn btn-danger">Limpiar</button>
                            </div>
                            <div class="col-lg-12">
                                <input type="hidden" class="form-control" id="fecha" placeholder="<?php echo $fecha=date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <center>
        <div id="content">
    <!-- End of Topbar -->
    <div>
        <h1>Operaciones</h1>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid" style="margin-top:50px;">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
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
                                <?php
                                    
                                    if ($val1 != "" && $val2 != "" && $val1 != 0 && $val2 != 0)  {
                                        $insert_sql = "INSERT INTO operacion Values (null, '$val1', '$val2', '$result', '$op', '$fecha')";
                                        $consulta = mysqli_query($conexion, $insert_sql);
                                    }
                
                                    $sql = "SELECT * FROM operacion ORDER by id DESC LIMIT 10";
                                    $resultado = mysqli_query($conexion, $sql);

                                    while($mostrar=mysqli_fetch_array($resultado)){
                                ?>
                                <tbody>
                                    <tr id="fila" class="primeraFila">
                                        <td><?php echo $mostrar['id']?></td>
                                        <td><?php echo $mostrar['num1']?></td>
                                        <td><?php echo $mostrar['num2']?></td>
                                        <td><?php echo $mostrar['resultado']?></td>
                                        <td><?php echo $mostrar['operacion']?></td>
                                        <td><?php echo $mostrar['fecha']?></td>
                                    </tr>
                                <?php 
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</center>

</body>
</html>
