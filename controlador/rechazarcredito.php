<?php   
    session_start();
    $Id = $_GET['IdCredito'];
    $_SESSION['IdCredito']= $_GET['IdCredito'];
    include_once('../config/config.php');
    $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
    $sql = "DELETE FROM creditos WHERE Id=".$Id.";";
        if (mysqli_query($con, $sql)) {
            $_SESSION['respuesta'] = 'Se ha rechazado el credito con exito';     
        }
        else {
            echo mysqli_error($con);
            $_SESSION['respuesta'] = 'Error al rechazar el credito';        
        }
    
    header('Location: ../vista/creditosadmin.php');

    
?>