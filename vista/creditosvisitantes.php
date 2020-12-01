<?php
  include_once '../controlador/creditosvisitantes.php';
  $Usuario = ($_SESSION['Email']);
  $_SESSION['creditos'];
  $_SESSION['TodasCreditos'];

  $respuesta='';
  if(isset($_SESSION['respuesta'])) {
    $respuesta .= '<script> alert("' .$_SESSION['respuesta']. '")</script>';
    echo $respuesta;
    unset($_SESSION['respuesta']);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Creditos</title>

<style>
    .botones{
        display: flex;
        justify-content:center;
    }
    .cuentas, .consignar{
        display: flex;
        justify-content:center;
    }
    
</style>
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="./perfil.php"><?php echo $Usuario; ?></a>
          <a class="p-2 text-dark" href="./cuentaahorros.php">Cuenta de ahorros</a>
          <a class="p-2 text-dark" href="./creditos.php">Créditos</a>
          <a class="p-2 text-dark" href="./tarjetacredito.php">Tarjetas de crédito</a>
          <a class="p-2 text-dark" href="./mensajes.php">Mensajes</a>
          <?php if($_SESSION['Rol']=='Administrador') echo '<a class="p-2 text-dark" href="./administrador.php">Administrador</a>';?>
      </nav>
      <a class="btn btn-outline-danger" href="../controlador/salir.php">Salir</a>
    </div>
    <div class="cuentas">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(sizeof( $_SESSION['creditos'])>0){
                foreach ( $_SESSION['creditos'] as $key) {
                    echo '<tr>';
                      echo '<th >'.$key['Id']."</th>";
                      echo "<td> $ ".number_format($key['Saldo'],2)." JaveCoins </td> ";
                      echo '</tr>';
                  }
            }
            
          ?>
        </tbody>
      </table>
    </div>
        <div class="botones">

            <a class="option-btn btn btn-success" href="./crearcreditovisitantes.php">Crear credito</a>

      </div>
      <div class="consignar">
        <div>
          <h2>Consignar a un credito</h2>
          <form class="container form-signin" action="../controlador/consignarcreditovisitante.php" method="post">
            <label for="amount">Monto a Consignar</label>
            <input type="number" name="monto" id="amount" placeholder="Monto" class="form-control" required>
            <label >Credito a pagar</label>
            <select name="destino" class="form-control" id="origin" required>
              <?php
                foreach ($_SESSION['creditos'] as $key ) {
                  echo '<option>'. $key['Id'] .'</option>';
                }
              ?>
            </select><br>
            <div class="botones">
              <button type="submit" class="submit-btn btn btn-info">Consignar</button>
            </div>
          </form>
        </div>
    </div>

  </body>
</html>