<?php

include_once '../lib/conf/connection.php';
//como lo trabajamos en modelo fachada, incluir todas las librerias, html 
include_once '../Lib/helpers.php';

?>

<style>
  body {
    background-image: url("https://propacifico.org/wp-content/uploads/2024/02/adobestock-284418692-scaled.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  input[type="date"]::placeholder {
    color: rgba(0, 0, 0, 0.8);
  }

  input[type="text"]::placeholder {
    color: rgba(0, 0, 0, 0.8);
  }

  .contM {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .cont1 {
    margin-left: 20px;
    justify-content: center;
    align-items: center;
    width: 50%;
  }

  .cont2 {
    margin-right: 20px;
    padding-left: 5px;
    width: 50%;
    margin-bottom: 166px;
  }

  .form-control {
    border-collapse: collapse;
    border-bottom: 1px solid black;
    border-radius: 0px;
    background: rgba(255, 255, 255, 0.5);
    font-family: 'Oswald', sans-serif;
    color: black;
  }

  .form-control::placeholder {
    color: rgba(0, 0, 0, 0.8);
  }

  .enviar {
    border-radius: 20px;
  }

  .row {
    width: 55%;
    margin-top: 15px;
    padding: 30px 0px;
    border-radius: 40px;
    background: rgba(255, 255, 255, 0.4);
  }

  form h2 {
    color: #3b4d54;
    font-size: 40px;
    font: small-caps 350% serif;
    margin: 20px;
  }

  button {
    width: 120px;
    height: 35px;
    font-size: 15px;
    background: rgba(255, 255, 255, 0.8);
    margin-top: 15px;
    margin-bottom: 15px;
  }

  div.botonRegre button {
    width: 120px;
    height: 35px;
    font-size: 15px;
    background: rgba(255, 255, 255, 0.8);
    margin-top: 15px;
    margin-bottom: 15px;
    color: black;
  }

  @media(max-width:600px) {
    body {
      font-size: 10px;
    }

    h2 {
      font-size: 15px;
    }

    input[type=text], input[type=password], input[type=email] {
      font-size: 13px;
      border-radius: 30px;
    }

    button {
      width: 80px;
      height: 30px;
      float: right;
      font-size: 10px;
      margin-bottom: 10px;
    }
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/global.js"></script>
</head>

<body>
  <center>
    <div class='alert alert-danger d-none' role='alert' id='error'></div>

    <div class="container">
      <?php
      if (isset($_SESSION['errores'])) {
        echo "<div class='alert alert-danger' role='alert'>";
        foreach ($_SESSION['errores'] as $error) {
          echo $error . "<br>";
        }
        echo "</div>";
        unset($_SESSION['errores']);
      }
      ?>

      <div class="row">
        <form action="<?php echo getUrl('Usuarios', 'Usuarios', 'postCreate', false, 'ajax'); ?>" method="post" class="col-xs-12 col-sm-12 col-md-12">
          <h2>Registrar</h2>

          <div class="contM">
            <div class="cont1">
              <div class="form-group">
                <select class="form-control" name="tipo_documento" id="tipo_docu">
                  <option selected disabled>Seleccione un tipo de documento</option>
                  <?php
                  foreach ($tipo_documento as $tipo) {
                    echo "<option value='" . $tipo['id_tipo_documento'] . "'>" . $tipo['nombre_tipo_documento'] . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Primer nombre *" name="name">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="apellido" placeholder="Primer apellido *" name="apellido">
              </div>

              <div class="form-group">
                <input type="date" class="form-control" id="date" placeholder="Fecha de nacimiento *" name="date">
              </div>

              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email *" name="email">
              </div>
            </div>

            <div class="cont2">
              <div class="form-group">
                <input type="number" class="form-control" id="documento" placeholder="Documento de identidad *" name="documento">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="surname" placeholder="Segundo nombre" name="secondName">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="segundoApellido" placeholder="Segundo apellido *" name="segundoApellido">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="telefono" placeholder="Telefono *" name="telefono">
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="Rtpwd" placeholder="Contraseña *" name="Rptpwd">
              </div>

              <button type="submit" id="btn-env">Enviar <i class="glyphicon glyphicon-send"></i></button>
            </div>
          </div>
        </form>

        <button type="submit" id="btn-reg">Volver</button>
      </div>
    </div>
  </center>
</body>

</html>
