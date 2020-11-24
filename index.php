<?php
include_once dirname(__FILE__) . '../config/config.php';
// Crear conexión
$con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS);
$sql="CREATE DATABASE ".NOMBRE_DB;
// Verificar conexión
if (mysqli_connect_errno())
{
echo "Error en la conexión: ". mysqli_connect_error();
}else{
echo "CONEXIÓN CON LA BASE DE DATOS EXITOSA!\n";
}

if (mysqli_query($con,$sql)) {
echo "Base de datos".NOMBRE_DB." creada\n";
}
$con= mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
//creación tablas
$sql = "CREATE TABLE Clientes (Id INT(11) NOT NULL AUTO_INCREMENT,Usuario VARCHAR(30),Contrasena VARCHAR(200),Rol VARCHAR(30),UNIQUE(Usuario), PRIMARY KEY (Id))";
if (mysqli_query($con, $sql)) {
    echo "Tabla Clientes creada\n";
} else {
    echo "Error" . mysqli_error($con)."\n";
}
$sql = "CREATE TABLE Invitados ( Email VARCHAR(30) NOT NULL,Cedula INT(10) NOT NULL, PRIMARY KEY (Email));";
if (mysqli_query($con, $sql)) {
    echo "Tabla Invitados creada\n";
} else {
    echo "Error" . mysqli_error($con)."\n";
}
$sql = "CREATE TABLE CuentasAhorros (Id INT(11) NOT NULL AUTO_INCREMENT,Saldo decimal(40,10) NOT NULL, ClienteId INT(11),PRIMARY KEY (Id),FOREIGN KEY (ClienteId) REFERENCES Clientes(Id) ON DELETE CASCADE);";
if (mysqli_query($con, $sql)) {
    echo "Tabla CuentasAhorros creada\n";
} else {
    echo "Error" . mysqli_error($con)."\n";
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="./css/signin.css" rel="stylesheet">

        <title>Login</title>
        <style>
        .ingreso{
            display: flex;
            justify-content:center;
        }
        </style>
    </head>
    <body class="text-center">
        <div class="ingreso">
            <div class="container form-signin">
                <form class="form" method="post" action="./controlador/validaringreso.php">
                    <h1 >Ingresa al sistema</h1>
                    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Usuario" required>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
                    <br>
                    <button class="btn btn-success" name="cliente"  type="submit">Login</button>
                    <a href="./vista/registro.php" class="btn btn-info">Regístrate</a>
                </form>
            </div>
            <div class="container form-signin">
                <form class="form" method="post" action="./controlador/validaringreso.php">
                    <h1>Acceder Como Invitado</h1>
                    <div class="form-group">
                        <input type="number" id="inputPassword" name="cedula" class="form-control" placeholder="Cédula" required>
                        <input type="email" id="inputEmail" name="invitado_email" class="form-control" placeholder="Email" required>
                        <br>
                        <button class="btn btn-success" name="invitado" type="submit">Acceder como Invitado</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>