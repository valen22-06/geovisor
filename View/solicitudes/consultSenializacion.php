<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar Señalizacion nueva</h3>
    </div>

    <div class="card-body">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscarSenializacion" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("Senializacion", "Senializacion", "buscarSenializacion", false, "ajax"); ?>'>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-secondary">
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Observacion</th>
                    <th>Orientacion</th>
                    <th>Categoria</th>
                    <th>Tipo de Señalizacion</th>
                    <th>Estado</th>

                </tr>
            </thead>
            <tbody>
            <?php

            if(!empty($sen)){
            foreach($senializacion as $sen){
                $clase="";
                $texto="";
                echo "<tr>";
                echo "<td>".$sen['id_senializacion_vial_nueva']."</td>";
                echo "<td>".$sen['fecha']."</td>";
                echo "<td>".$sen['descripcion']."</td>";
                echo "<td>".$sen['nombre_o']."</td>";
                echo "<td>".$sen['nombre_c_s']."</td>";
                echo "<td>".$sen['tipo_senializacion']."</td>";
                echo "<td>";
                echo"<form action='getUrl('Solicitudes', 'Solicitudes', 'postUpdateStatusSenializacion');' method='post' class='mt-4'>";
                echo "<select class='form-select' name='id' id='id'>";
                echo "<option disabled selected>".($sen['edescripcion'])."</option>";
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
                    echo "<input name='id_senializacion' value='".$redu['id_senializacion_vial_nueva']."' style='display: none;'>";
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

                echo "No hay registros de solicitudes de señalizacion nueva";

            }

            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>