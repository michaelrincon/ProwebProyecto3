  
<?php
  session_start();
  include_once('../config/config.php');
  $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);

  $identificador = $_SESSION['Id'];
  $sql = "INSERT INTO tarjetacredito (CupoMaximo,Estado,ClienteId) VALUES (30000000,'aprobado','$identificador') ;";
  $x = mysqli_query($con,$sql);
  if(!$x){
      die('No es posible registrar el usuario'.mysqli_error($con));
      $_SESSION['respuesta'] = 'No se ha podido solicitar la tarjeta';
      header('Location: ../vista/tarjetacredito.php');


  }else{
      $_SESSION['respuesta'] = 'Se ha solicitado la tarjeta exitosamente';     
      header('Location: ../vista/tarjetacredito.php');
  }
?>
  