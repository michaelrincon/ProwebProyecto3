<?php
  session_start();
  include_once('../config/config.php');
  $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
  $destino=$_POST['destino'];
  $monto=$_POST['monto'];
  echo $origen." ".$destino;


    $sql = "SELECT * FROM tarjetacredito WHERE Id ='$destino';";
    $arreglo = mysqli_query($con,$sql);
    $row = mysqli_fetch_array( $arreglo);
    $x = $row['CupoUsado'] + $monto;
    $sql = "UPDATE tarjetacredito SET CupoUsado = '$x' WHERE Id=".$destino.";";
    if (mysqli_query($con, $sql)) {
        $_SESSION['respuesta'] = 'Se ha comprado exitosamente';
        echo 'Se ha comprado exitosamente';
    }
    else {
        $_SESSION['respuesta'] = 'No se ha podido comprar.';
        echo 'No se ha podido comprar.';
    }

  
  header('Location: ../vista/tarjetacredito.php');

?>