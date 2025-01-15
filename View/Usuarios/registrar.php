<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


  <div class="alert alert-danger d-none" role="alert" id="error">

  </div>


    <div class="card-header bg-secondary text-white text-center mt-3">
      <h3 class="display-6 mb-0">Registrar accidente</h3>
    </div>

    <div class="card-body">
      <?php
        if (isset($_SESSION['errores'])) {
          echo "<div class='alert alert-danger' role='alert'>";
          foreach ($_SESSION['errores'] as $error) {
            echo $error;
            echo "<br>";
          }
          echo "</div>";
          unset($_SESSION['errores']);
        }
      ?>

    <div class="card shadow-lg">
      <form action="<?php echo getUrl('Usuarios', 'Usuarios', 'postCreate', false, 'ajax'); ?>" method="post">
        <div class="row mt-4">
          <!-- Columna 1 -->
          <div class="col-md-6">
            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="tipo_docu" class="form-label">Tipo de Documento</label>
              <select class="form-select" name="tipo_documento" id="tipo_docu">
                <option value="" selected disabled>Seleccione un tipo de documento</option>
                <?php
                  foreach ($tipo_documento as $tipo) {
                    echo "<option value='" . htmlspecialchars($tipo['id_tipo_documento']) . "'>" . htmlspecialchars($tipo['nombre_tipo_documento']) . "</option>";
                  }
                ?>
              </select>
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="name" class="form-label">Primer Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Primer nombre" required>
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="apellido" class="form-label">Primer Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Primer apellido" required>
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="date" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
          </div>

          <!-- Columna 2 -->
          <div class="col-md-6">
            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="documento" class="form-label">Documento de Identidad</label>
              <input type="number" class="form-control" id="documento" name="documento" placeholder="Documento de identidad" required>
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="surname" class="form-label">Segundo Nombre</label>
              <input type="text" class="form-control" id="surname" name="secondName" placeholder="Segundo nombre">
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="segundoApellido" class="form-label">Segundo Apellido</label>
              <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo apellido">
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
            </div>

            <div class="mb-3 ms-3 md-3 mt-3">
              <label for="Rtpwd" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="Rtpwd" name="Rptpwd" placeholder="Contraseña" required>
            </div>
          </div>
        </div>

        <!-- Dirección -->
        <div class="container mb-3 ms-3 md-3 mt-3">
          <label for="direccion" class="form-label">Dirección</label>
          <div class="row">
            <div class="col-5">
              <select class="form-select" name="tipo_via" id="tipo_via">
                <option value="" selected disabled>Seleccione un tipo de vía</option>
                <?php
                  foreach ($tipo_via as $tipo) {
                    echo "<option value='" . htmlspecialchars($tipo['nombre_via']) . "'>" . htmlspecialchars($tipo['nombre_via']) . "</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col-3">
              <input type="text" class="form-control" id="" name="num1" placeholder="Número" required>
            </div>

            <div class="col-3">
              <input type="text" class="form-control" id="" name="letra1" placeholder="Complemento">
            </div>
          </div>

          <div style="display: flex; margin-top: 10px;" class="container">
            <label for="" class="#">#</label>
            <div class="col ms-2">
              <input type="text" class="form-control" id="" name="num2" placeholder="Número" required>
            </div>

            <div class="col ms-2">
              <input type="text" class="form-control" id="" name="letra2" placeholder="Complemento">
            </div>

            <label for="" class="ms-2">-</label>

            <div class="col ms-2">
              <input type="text" class="form-control" id="" name="num3" placeholder="Número" required>
            </div>

            <div class="col ms-2">
              <input type="text" class="form-control" id="" name="letra3" placeholder="Complemento">
            </div>
          </div>
        </div>

        <!-- Botones de acción -->
        <div class="text-center" style="margin-top:30px">
          <button type="submit" class="btn btn-dark w-50">Registrar</button>
        </div>

      </form>

    </div>

