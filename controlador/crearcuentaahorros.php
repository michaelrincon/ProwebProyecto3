  
<?php
  session_start();
  include_once('../config/config.php');
  $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
  $saldo =$_POST['saldo'];
  $identificador = $_SESSION['Id'];
  $sql = "INSERT INTO CuentasAhorros (Saldo,ClienteId) VALUES ('$saldo','$identificador') ;";
  $x = mysqli_query($con,$sql);
  if(!$x){
      die('No es posible registrar el usuario'.mysqli_error($con));
      $_SESSION['respuesta'] = 'No se ha podido crear la cuenta';
      header('Location: ../vista/cuentaahorros.php');


  }else{
      $_SESSION['respuesta'] = 'Se ha creado la cuenta exitosamente';     
      header('Location: ../vista/cuentaahorros.php');
  }
?>
  