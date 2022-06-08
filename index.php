<?php
  $dbconn = pg_connect("
    host=ec2-34-198-186-145.compute-1.amazonaws.com 
    dbname=db9m5c4ioomblq user=artjpzwsplviqj 
    password=acef05613fbc6756d362b3411f1e025eaaa4fc2a6b56aeee2ecfc264b7092b83
  ") or die('Could not connect: ' . pg_last_error());
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>

    <!-- get formulario-->
    <div class="container mt-5">
      <form class='mt-auto mb-auto' id="form-calculadora">
        <div>
          <h1 class='m-2'>Calculadora</h1>
        </div>
        <div class="row w-50 ms-auto me-auto">
          <div class="col-12 mb-2">
            <input type="number" class="form-control" id="numero1" name="numero1" placeholder="Ingrese el primer numero" required>
          </div>
          <div class="col-12 mb-2">
            <input type="number" class="form-control" id="numero2" name="numero2" placeholder="Ingrese el segundo numero" required>
          </div>
          <div class="col-12 mb-2">
            <select id="operacion" name="operacion" class="form-control" required>
              <option value="">Operacion</option>
              <option value="Suma">Suma</option>
              <option value="Resta">Resta</option>
              <option value="Multiplicacion">Multiplicación</option>
              <option value="Division">División</option>
            </select>
          </div>
          <div class="col-12 mb-2">
            <input type="text" class="form-control" id="txt-result" placeholder="Resultado" disabled>
          </div>
          <div class="col-12 mb-2">
            <button type="submit" class="btn btn-success" id="btn-calcular">Calcular</button>
            <button type="button" class="btn btn-danger" id="btn-limpiar">Limpiar</button>
          </div>
        </div>
      </form>
    </div>

    <!-- modal -->
    <div id="modal-division" class="modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger">Error al ingresar datos!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Por favor, ingrese valores mayores a cero.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->

    <!-- Historial -->
    <div class='container'>
      <div class="card text-center">
        <div class="card-header text-white bg-primary h2">
          Operaciones
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
          <table class='table table-bordered m-0' id='tblOperacion' width='99.85%'>
            <thead>
              <tr>
                <th>#</th>
                <th>Primer Número</th>
                <th>Segundo Número</th>
                <th>Operación</th>
                <th>Resultado</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody id='tbody-historial'>
              <?php
                // --- SQL
                $sqlOperacion = "SELECT * FROM operacion ORDER by id DESC LIMIT 10";
                $resultado = pg_query($dbconn, $sqlOperacion);
                while( $mostrar = pg_fetch_array( $resultado, null, PGSQL_ASSOC) ){
                  echo "<tr>";
                  echo "<td>".$mostrar['id']."</td>";
                  echo "<td>".$mostrar['num1']."</td>";
                  echo "<td>".$mostrar['num2']."</td>";
                  echo "<td>".$mostrar['operacion']."</td>";
                  echo "<td>".$mostrar['resultado']."</td>";
                  echo "<td>".$mostrar['fecha']."</td>";
                  echo "</tr>";
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- librerias de js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
