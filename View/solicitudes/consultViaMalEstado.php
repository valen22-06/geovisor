<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar via en mal estado</h3>
    </div>

    <div class="card-body">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscarViaMalEstado" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("ViaMalEstado", "ViaMalEstado", "buscarViaMalEstado", false, "ajax"); ?>'>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-secondary">
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Observacion</th>
                    <th>Daño</th>
                    <th>Estado</th>

                </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($sen)){
            foreach($viaM as $viaM){
                $clase="";
                $texto="";
                echo "<tr>";
                echo "<td>".$viaM['id_via_mal_estado']."</td>";
                echo "<td>".$viaM['fecha']."</td>";
                echo "<td>".$viaM['descripcion']."</td>";
                echo "<td>".$viaM['nombre_d']."</td>";
                echo "<td>";
                echo"<form action='getUrl('Solicitudes', 'Solicitudes', 'postUpdateStatus');' method='post' class='mt-4'>";
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
                    echo "<input name='id_senializacion' value='".$redu['id_reductores_nuevo']."' style='display: none;'>";
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

            echo "No hay registros de solicitudes de vias publicas en mal estado";

        }

            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>