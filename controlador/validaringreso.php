<?php
    include_once('../config/config.php');
    $con = mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
    session_start();
    if (isset($_POST['cliente'])) {
        $user = $_POST['username'];
        $passw = $_POST['password'];
        $user = mysqli_real_escape_string($con,$user);
        $password = mysqli_real_escape_string($con,$passw);
        $sql = "SELECT * FROM Clientes WHERE Usuario = '$user'";
        $select_user_query = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($select_user_query);
        echo $password." ".$row['Contrasena'];
        if(password_verify($password, $row['Contrasena'])){
            $_SESSION['Id'] = $row['Id'];
            $_SESSION['Usuario'] = $row['Usuario'];
            $_SESSION['Rol'] = $row['Rol'];
            echo "bien";
            header('Location: ../vista/perfil.php');

        }
        else {
            header("Location: ../index.php");
            //echo "Ingrese los datos nuevamenteeee";
        }
    }elseif(isset($_POST['invitado'])){
            $cedula= $_POST['cedula'];
            $email = $_POST['invitado_email'];
            $sql= "SELECT * from Visitantes where Email = '$email'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            if(mysqli_num_rows($query)!=0)
            {
               if($row['Cedula'] == $cedula){
                    $_SESSION['Cedula'] = $_POST['cedula'];
                    $_SESSION['Email'] = $_POST['invitado_email'];
                    $_SESSION['Rol'] = 'Invitado';
                    header('Location: ../vista/invitado.php');
                    
               }else{
                    header("Location: ../index.php");
               }
            }
            else{
                    $sql3 = "INSERT INTO Visitantes (Email,Cedula)
                    VALUES ('$email','$cedula')";
                    $registrar_usuario = mysqli_query($con,$sql3);
                    if(!$registrar_usuario){
                        echo "no entró";
                        die('No es posible registrar el usuario'.mysqli_error($con));
                    }else{
                        $_SESSION['Cedula'] = $_POST['cedula'];
                        $_SESSION['Email'] = $_POST['invitado_email'];
                        $_SESSION['Rol'] = 'Invitado';
                       header('Location: ../vista/invitado.php');
                    }
                }
    }


   
   