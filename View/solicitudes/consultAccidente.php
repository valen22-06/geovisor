<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="../assets/js/global.js"></script>

<?php include_once 'C:/ms4w/Apache/htdocs/Geovisor/geovisor/Lib/helpers.php'; ?>

<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar accidentes</h3>
    </div>

    <div class="card-body bg-light mb-2">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscarAccidente" id="buscarAccidente" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("Solicitudes", "Solicitudes", "buscar",false,"ajax"); ?>'>
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
            foreach($accidente as $acc){
                $clase="";
                $texto="";
                echo "<tr>";
                echo "<td>".$accidente['id_registro_accidente']."</td>";
                echo "<td>".$accidente['fecha']."</td>";
                echo "<td>".$accidente['lesionados']."</td>";
                echo "<td>".$accidente['observacion']."</td>";
                echo "<td>".$accidente['tipo_vehiculo']."</td>";
                echo "<td>".$accidente['tipo_choque']."</td>";
                echo "<td>";
                echo "<form action='getUrl('Accidente', 'Accidente', 'postUpdateStatus');' method='post' class='mt-4'>";
                echo "<select class='form-select' name='id' id='id'>";
                echo "<option disabled selected>".($accidente['edescripcion'])."</option>";
                foreach ($estado as $est) {
                echo "<option value='".($est['id_estado'])."'>".($est['nombre_estado'])."</option>";
                }
                echo "</select>";
                echo"<br>";
                echo "<button type='submit' class='btn btn-dark'>Enviar</button>";
                echo "</form>";
                echo "</td>";
                


                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
