<?php
  session_start();
  include_once('../config/config.php');
  $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
  $destino=$_POST['destino'];
  $monto=$_POST['monto'];
  echo $origen." ".$destino;


    $sql = "SELECT * FROM creditos WHERE Id ='$destino';";
    $arreglo = mysqli_query($con,$sql);
    $row = mysqli_fetch_array( $arreglo);
    $x = $row['Saldo'] - $monto;
    $sql = "UPDATE creditos SET Saldo = '$x' WHERE Id=".$destino.";";
    if (mysqli_query($con, $sql)) {
        $_SESSION['respuesta'] = 'Se ha consignado exitosamente';
        echo 'Se ha consignado exitosamente';
    }
    else {
        $_SESSION['respuesta'] = 'No se ha podido consignar.';
        echo 'No se ha podido consignar.';
    }

  
  header('Location: ../vista/creditosvisitantes.php');

?>