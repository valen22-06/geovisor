<?php
include_once '../lib/conf/connection.php';
include_once '../Lib/helpers.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Usuario</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- SweetAlert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

  <div class="container">
    <div class="card shadow-lg" style="max-width: 700px; margin: auto;">
      <div class="card-header bg-dark text-white text-center">
        <h3>Registrar Usuario</h3>
      </div>

      <div class="card-body">
        <?php if (isset($_SESSION['errores'])): ?>
          <div class="alert alert-danger">
            <?php
            foreach ($_SESSION['errores'] as $error) {
              echo htmlspecialchars($error) . "<br>";
            }
            unset($_SESSION['errores']);
            ?>
          </div>
        <?php endif; ?>

        <form action="<?php echo getUrl('Usuarios', 'Usuarios', 'postCreate', false, 'ajax'); ?>" method="post">
          <div class="row">
            <!-- Column 1 -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="tipo_docu" class="form-label">Tipo de Documento</label>
                <select class="form-select" name="tipo_documento" id="tipo_docu" >
                  <option value="" selected disabled>Seleccione un tipo de documento</option>
                  <?php
                  foreach ($tipo_documento as $tipo) {
                    echo "<option value='" . htmlspecialchars($tipo['id_tipo_documento']) . "'>" . htmlspecialchars($tipo['nombre_tipo_documento']) . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Primer nombre" required>
              </div>

              <div class="mb-3">
                <label for="apellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Primer apellido" required>
              </div>

              <div class="mb-3">
                <label for="date" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="documento" class="form-label">Documento de Identidad</label>
                <input type="number" class="form-control" id="documento" name="documento" placeholder="Documento de identidad" required>
              </div>

              <div class="mb-3">
                <label for="surname" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="surname" name="secondName" placeholder="Segundo nombre">
              </div>

              <div class="mb-3">
                <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo apellido">
              </div>

              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
              </div>

              <div class="mb-3">
                <label for="Rtpwd" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="Rtpwd" name="Rptpwd" placeholder="Contraseña" required>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-dark">Registrar</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Volver</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
