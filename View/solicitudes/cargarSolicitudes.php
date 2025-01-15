<?php

$_SESSION['punto_x'] = $_GET['x'];
$_SESSION['punto_y'] = $_GET['y'];

?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h5 class="display-6 mb-0 d-flex justify-content-center align-items-center">Gestión de Solicitudes</h5>
        </div>
        <div class="card-body">
            <div class="col-md-6 mb-3 mx-auto">
                <label for="tipo_solicitud" class="form-label fw-bold d-flex justify-content-center align-items-center">Seleccione el tipo de solicitud:</label>
                <select class="form-control" name="tipo_soli" id="tipo_solicitud" data-url="<?php echo getUrl("Solicitudes","Solicitudes","cargarFormulario",false,"ajax")?>">
            <option selected disabled>Seleccione un tipo de solicitud</option>
            <option value="1">Accidente</option> 
            <option value="2">Nueva señalizacion</option>
            <option value="3">Señalizacion en mal estado</option>
            <option value="4">Reductor nuevo</option>
            <option value="5">Reductor en mal estado</option>
            <option value="6">Via en mal estado</option>
            
    </select>
            </div>
            <div id="form_sol"></div>
        </div>
    </div>
</div>