<?php
    session_start();
    include_once('../config/config.php');
    $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
    $sql = "SELECT * FROM creditos WHERE Cedulavisi =".$_SESSION['Cedula'].";";
    $arreglo = mysqli_query($con,$sql);
    $new_array = array();
    while( $row = mysqli_fetch_array( $arreglo)){
        $new_array[]=$row; // Inside while loop
    }
    $_SESSION['creditos'] = $new_array;


    $sql = "SELECT * FROM creditos;";
    $arreglo = mysqli_query($con,$sql);
    $new_array = array();
    while( $row = mysqli_fetch_array( $arreglo)){
        $new_array[]=$row; // Inside while loop
    }
    $_SESSION['TodasCreditos'] = $new_array;
?>