<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php include_once '../Lib/helpers.php'; ?>

<div class="card shadow-lg" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Señalizacion nueva</h3>
    </div>

    <div class="card-body">

    <?php
        if(isset($_SESSION['errores'])){
            echo "<div class = 'alert alert-danger' role='alert'>";
            foreach ($_SESSION['errores'] as $error) {
                echo $error;
                echo "<br>";
            }
            echo "</div>";
            unset($_SESSION['errores']);
        }
    ?>

        <form action="<?php echo getUrl("Solicitudes", "Solicitudes", "postCreateSenializacion"); ?>" method="post" class="mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="cat_senializacion" class="form-label">Tipo de Orientacion</label>
                <select class="form-select" name="cat_senializacion" id="cat_senializacion">
                    <option disabled selected>Seleccione tipo de Orientacion</option>
                    <?php
                      foreach ($orientacion as $tipo) {
                          echo "<option value='" .$tipo['id_orientacion_senializacion']. "'>" .$tipo['nombre_orientacion_senializacion']."</option>";
                      }
                  ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="cat_sen" class="form-label">Categoria Señalizacion</label>
                <select class="form-select" name="cat_sen" id="cat_sen">
                    <option disabled selected>Seleccione categoria Señalizacion</option>
                    <?php
                      foreach ($cat_sen as $sen) {
                          echo "<option value='" .$sen['id_categoria_senializacion']. "'>" .$sen['nombre_categoria_senializacion']."</option>";
                      }
                  ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="t_sen" class="form-label">Tipo de Señalizacion</label>
                <select class="form-select" name="t_sen" id="t_sen">
                    <option disabled selected>Seleccione tipo de señalizacion</option>
                    <?php
                      foreach ($tipo_sen  as $tsen) {
                          echo "<option value='" .$tsen['id_tipo_senializacion']. "'>" .$tsen['nombre_tipo_senializacion']."</option>";
                      }
                  ?>
                </select>
            </div>
        </div>


        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribe un comentario"></textarea>
        </div>


        <div class ="row mt-3">
            <div class ="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Imagen</label>
                <input type="file" class="form-control" name="imagen">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Registrar</button>
        </div>
    </form>
                    </div>
        </div>

        
