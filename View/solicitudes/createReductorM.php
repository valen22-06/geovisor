<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php include_once '../Lib/helpers.php'; ?>

<div class="card shadow-lg" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Reductor en mal estado</h3>
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
    <form action="<?php echo getUrl("ReductorM", "ReductorM", "postCreate");?>" method="post" class="mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="cat_reductor" class="form-label">categoria de reductor</label>
                <select class="form-select" name="cat_reductor" id="cat_reductor">
                    <option disabled selected>Seleccione categoria de reductor</option>
                    <?php
                      foreach ($cat_reductor as $cat) {
                          echo "<option value='" .$cat['id_categoria_reductores']. "'>" .$cat['nombre_categoria_reductores']."</option>";
                      }
                  ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tipo_reductor" class="form-label">Tipo reductor</label>
                <select class="form-select" name="tipo_reductor" id="tipo_reductor">
                    <option disabled selected>Seleccione tipo reductor</option>
                    <?php
                      foreach ($tipo_reductor as $sen) {
                          echo "<option value='" .$sen['id_tipo_reductor']. "'>" .$sen['nombre_tipo_reductor']."</option>";
                      }
                  ?>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="tipo_danio" class="form-label">Tipo de daño</label>
                <select class="form-select" name="tipo_danio" id="tipo_danio">
                    <option disabled selected>Seleccione un tipo de daño</option>
                    <?php
                      foreach ($danio as $dan) {
                          echo "<option value='" .$dan['id_danio']. "'>" .$dan['nombre_danio']."</option>";
                      }
                  ?>
                    
                </select>
            </div>
        </div>

        <!-- <div class="row mb-3">
        <div class="col-md-6">
                <label for="tipo_via" class="form-label">Tipo de vía</label>
                <select class="form-select" name="tipo_via" id="tipo_via">
                    <option disabled selected>Seleccione un tipo de vía</option>
                    <?php
                      foreach ($tipo_via as $tipo) {
                          echo "<option value='" .$tipo['nombre_via']. "'>" .$tipo['nombre_via']."</option>";
                      }
                  ?>
                    
                </select>
            </div>
            
        </div> -->

        <!-- <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" class="form-control" id="numVia" placeholder="Número de la vía" name="numVia">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="letra" placeholder="Letra" name="letra">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="complemento" placeholder="Complemento" name="complemento">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="num" placeholder="Número" name="num">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" class="form-control" id="letra2" placeholder="Letra" name="letra2">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="complemento2" placeholder="Complemento" name="complemento2">
            </div>
        </div> -->

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribe un comentario"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Registrar</button>
        </div>
    </form>
                    </div>
        </div>