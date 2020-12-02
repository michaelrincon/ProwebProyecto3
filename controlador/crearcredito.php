  
<?php
  session_start();
  include_once('../config/config.php');
  $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
  $saldo =$_POST['saldo'];
  $interes =$_POST['interes'];
  $fecha =$_POST['fecha'];
  $identificador = $_SESSION['Id'];
  $sql = "INSERT INTO creditos (Saldo,Interes,Estado,FechaPago,ClienteId) VALUES ('$saldo','$interes','pendiente','$fecha','$identificador') ;";
  $x = mysqli_query($con,$sql);
  if(!$x){
      die('No es posible registrar el usuario'.mysqli_error($con));
      $_SESSION['respuesta'] = 'No se ha podido crear el credito';
      header('Location: ../vista/creditos.php');


  }else{
      $_SESSION['respuesta'] = 'Se ha creado el credito exitosamente';     
      header('Location: ../vista/creditos.php');
  }
?>
  