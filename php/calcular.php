<?php

  header("Content-Type: application/json");

  $dbconn = pg_connect("
    host=ec2-34-198-186-145.compute-1.amazonaws.com 
    dbname=db9m5c4ioomblq user=artjpzwsplviqj 
    password=acef05613fbc6756d362b3411f1e025eaaa4fc2a6b56aeee2ecfc264b7092b83
  ") or die('Could not connect: ' . pg_last_error());

  $aJson = array();

  // Data Form
  $num1 = ( isset($_GET['numero1']) ) ? intval($_GET['numero1']) : null;
  $num2 = ( isset($_GET['numero2']) ) ? intval($_GET['numero2']) : null;
  $operacion = ( isset($_GET['operacion']) ) ? $_GET['operacion'] : null;
  $result = null;

  if( !empty($num1) && !empty($num2) ){

    switch( $operacion ){
      case 'Suma': $result = $num1 + $num2; break;
      case 'Resta': $result = $num1-$num2; break;
      case 'Multiplicacion': $result = $num1 * $num2; break;
      case 'Division':
        if( $num1 != 0 && $num2 != 0 ){
          $result = $num1 / $num2;
        }else{
          $aJson['status'] = 0;
          $aJson['message'] = 'Por favor, ingrese todos los campos';
        }
        break;
      default: break;
    }

    if( !isset($aJson['message']) ){
      $sFechaActual = date('Y-m-d H:i:s');
      // Sql Insertar
      $sqlOperacionTotal = "SELECT COUNT(id) as totalRegistros FROM operacion ";
      $operacionTotal = pg_query($dbconn, $sqlOperacionTotal);
      $operacionTotal = pg_fetch_all($operacionTotal, PGSQL_ASSOC);
      $numTotalOperaciones = intval($operacionTotal[0]['totalregistros'])+1;

      $sqlInsertOperacion = "INSERT INTO operacion (num1, num2, resultado, operacion, fecha, id)
        VALUES ( {$num1}, {$num2}, '{$result}', '{$operacion}', '{$sFechaActual}', {$numTotalOperaciones})";
      // Ejecutar Sql
      $consulta = pg_query($dbconn, $sqlInsertOperacion);
      pg_close();

      if( $consulta ){
        $mensaje = 'Registro satisfactorio. ';
        $aJson['status'] = 1;
        $aJson['message'] = '$mensaje';
        // Data
        $aJson['id']    = $numTotalOperaciones;
        $aJson['num1']  = $num1;
        $aJson['num2']  = $num2;
        $aJson['fecha'] = $sFechaActual;
        $aJson['resultado'] = $result;
        $aJson['operacion'] = $operacion;
      }else{
        $aJson['status'] = 0;
        $aJson['message'] = "Ocurrió un error! ".pg_last_error();
      }
    }
  }

  echo json_encode($aJson);
?>