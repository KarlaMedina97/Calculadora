<?php
// session_start();
// extract($_REQUEST);
// include "conexion/Conexion.php";
// error_reporting(0);

$dbconn = pg_connect ("host=ec2-34-198-186-145.compute-1.amazonaws.com dbname=db9m5c4ioomblq user=artjpzwsplviqj 
        password=acef05613fbc6756d362b3411f1e025eaaa4fc2a6b56aeee2ecfc264b7092b83") or die('Could not connect: ' . pg_last_error());

    if (isset($_GET['Calcular'])){
        $num1= $_GET['num1'];
        $num2= $_GET['num2'];
        $operacion= $_GET['operacion'];

        if ($num1 != "" && $num2 != ""){
            if ($operacion == "Suma"){
                $resultado=$num1+$num2; 
            }else if ($operacion == "Resta"){
                $resultado=$num1-$num2;
            }else if ($operacion == "Multiplicacion"){
                $resultado=$num1*$num2;
            }else if ($operacion == "Division"){
                if ($num1 != 0 && $num2 != 0 && $num1 > 0 && $num2 >0){
                    $resultado=$num1/$num2;
                    // echo $resultado;
                }
                echo '<html language="javascript">alert("Por favor, ingrese los numeros en los campos.");</html>';
                // echo "Por favor, ingrese los numores en los campos.";
            }else if($num1 == "" && $num2 == "" && $operacion == 0){
                echo '<html language="javascript">alert("Por favor, ingrese los numeros en los campos.");</html>';
            }
    }
    
    if(isset($_REQUEST['Limpiar'])){
        $num1= $_REQUEST['num1'];
        $num2= $_REQUEST['num2'];
        $operacion = $_REQUEST['operacion'];
        if ($num1 == "" && $num2 == "")  {
            $resultado = "";
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
                                <input type="number" class="form-control" id="num1" name="num1" placeholder="Ingrese el primer numero">
                            </div>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" id="num2" name="num2" placeholder="Ingrese el segundo numero">
                            </div>
                            <div class="col-lg-12">
                                <select id="operacion" name="operacion" class="form-control">
                                    <option name="0">operacion</option>
                                    <option name="Suma">Suma</option>
                                    <option name="Resta">Resta</option>
                                    <option numue="Multiplicacion">Multiplicación</option>
                                    <option numue="Division">División</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" id="resultado" name="<?php echo $resultado ?>" placeholder="Resultado" readonly>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-success" id="Calcular" name="Calcular">
                                <button type="submit" numue="Limpiar" class="btn btn-danger">Limpiar</button>
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
    <!-- End of Top bar -->
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
                            <?php
                                
                                if ($num1 != "" && $num2 != "" && $num1 != 0 && $num2 != 0)  {
                                    $consulta = sprintf("INSERT INTO operacion
                                    VALUES('%s','%s','%s','%s','%s','%s','%s')",$_REQUEST['id'],$_REQUEST['num1'],$_REQUEST['num2'],$_REQUEST['resultado'],$_REQUEST['operacion'],$_REQUEST['fecha']);
                                    $consulta = pg_query($consulta);
                                    if($consulta){
                                    echo "El registro ha sido agregado";
                                    }else{
                                        echo "Ocurrió un error! ".pg_last_error();
}
                                    }
                                    // $consulta = pg_query($dbconn, "INSERT INTO operacion values ($_POST$id, '$num1', '$num2', '$resultado', '$operacion', '$fecha')");
                                    // for ($i=0; $i == $id; $i++) { 
                                    // }
                                    // $insertar = "INSERT INTO operacion values (null,'$num1', '$num2', '$resultado', '$operacion', '$fecha')";
                                    
                                //    function pg_insert_with_schema($dbconn, $operacion, $updates)
                                //     {
                                //     $schema = 'public';
                                //     if (strpos($operacion, '.') !== false)
                                //         list($schema, $operacion) = explode('.', $operacion);

                                //         if (count($updates) == 0) {
                                //             $sqli = "INSERT INTO $schema.\"$operacion\" DEFAULT VALUES";
                                //                 return pg_query($sqli);
                                //             } else {
                                //     $sqli = "INSERT INTO $schema.\"$operacion\" ";
                                            
                                //     $sqli .= '("';
                                //     $sqli .= join('", "', array_keys($updates));
                                //     $sqli .= '")';

                                //     $sqli .= ' values (';
                                //     for($i = 0; $i < count($updates); $i++)
                                //     $sqli .= ($i != 0? ', ':'').'$'.($i+1);
                                //     $sqli .= ')';
                                //     return pg_query_params($dbconn, $sqli, array_values($updates));
                                //     }
                                // }                                        
                            // }
            
                                $sql = "SELECT * FROM operacion ORDER by id DESC LIMIT 10";
                                $result = pg_query($dbconn, $sql);

                                echo "<table class='table table-bordered' id='tblOperacion' width='99.85%'>\n";
                                echo "\t\t<thead>\n";
                                    echo "\t\t<tr>\n";
                                        echo "\t\t<th>id</th>\n";
                                        echo "\t\t<th>Primer Número</th>\n";
                                        echo "\t\t<th>Segundo Número</th>\n";
                                        echo "\t\t<th>Resultado</th>\n";
                                        echo "\t\t<th>Operación</th>\n";
                                        echo "\t\t<th>Fecha</th>\n";
                                    echo "\t\t</tr>\n";
                                echo "\t\t</thead>\n";
                                echo "\t\t<tbody>\n";
                                while($mostrar = pg_fetch_array($result, null, PGSQL_ASSOC)){
                                    echo "\t<tr>\n";
                                    foreach ($mostrar as $id){
                                        echo "\t\t<td>$id</td>\n";
                                        echo "\t\t<td>$num1</td>\n";
                                        echo "\t\t<td>$num2</td>\n";
                                        echo "\t\t<td>$resultado</td>\n";
                                        echo "\t\t<td>$operacion</td>\n";
                                        echo "\t\t<td>$fecha</td>\n";
                                    }
                                    echo "\t</tr>\n";
                                }
                                echo "\t\t</tbody>\n";
                                echo "</table>\n";
                            ?>
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
