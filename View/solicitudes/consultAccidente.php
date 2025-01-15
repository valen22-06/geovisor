<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="../assets/js/global.js"></script>


<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar accidentes</h3>
    </div>

    <div class="card-body bg-light mb-2">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscarAccidente" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("Solicitudes", "Solicitudes", "buscarAccidente",false,"ajax"); ?>'>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-secondary">
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Lesionados</th>
                    <th>Observacion</th>
                    <th>Tipo de vehiculos</th>
                    <th>Tipo choque</th>
                    <th>Estado</th>

                </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($accidente)){
                foreach($accidente as $acc){
                    $clase="";
                    $texto="";
                    echo "<tr>";
                    echo "<td>".$acc['id_registro_accidente']."</td>";
                    echo "<td>".$acc['fecha']."</td>";
                    echo "<td>".$acc['lesionados']."</td>";
                    echo "<td>".$acc['observacion']."</td>";
                    echo "<td>".$acc['tipo_vehiculo']."</td>";
                    echo "<td>".$acc['tipo_choque']."</td>";
                    echo "<td>";
                    echo "<form action='".getUrl("Solicitudes", "Solicitudes", "postUpdateStatusAccidente")."' method='post' class='mt-3 mb-3'>";
                    echo "<select class='form-select mb-1 mt-4' name='id' id='id'>";
                    echo "<option disabled selected>".($acc['edescripcion'])."</option>";
                    foreach ($estado as $est) {
                    echo "<option value='".($est['id_estado'])."'";
                    if ($_SESSION['rol']==3) {
                        echo " disabled>";
                    } else {
                        echo ">";
                    }
                    
                    echo ($est['nombre_estado'])."</option>";
                    }
                    echo "</select>";
                    echo "<input name='id_accidente' value='".$acc['id_registro_accidente']."' style='display: none;'>";
                    echo "<button type='submit' class='btn btn-dark'";
                    if ($_SESSION['rol']==3) {
                        echo " disabled>";
                    } else {
                        echo ">";
                    }
                    echo "Enviar</button>";
                    echo "</form>";
                    echo "</td>";
                    
    
    
                    echo "</tr>";
                }    
            } else {
                echo "No hay registros de accidentes";
            }
            
            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
