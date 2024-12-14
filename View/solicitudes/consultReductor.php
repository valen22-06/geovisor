<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php include_once '../Lib/helpers.php'; ?>

<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar Reductor nuevo</h3>
    </div>

    <div class="card-body">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("Reductor", "Reductor", "buscar", false, "ajax"); ?>'>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-secondary">
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Observacion</th>
                    <th>Direccion</th>
                    <th>Categoria</th>
                    <th>Tipo de Reductor</th>
                    <th>Estado</th>

                </tr>
            </thead>
            <tbody>
            <?php
            foreach($redu as $sen){
                $clase="";
                $texto="";
                echo "<tr>";
                echo "<td>".$sen['id_reductores_nuevo']."</td>";
                echo "<td>".$sen['fecha']."</td>";
                echo "<td>".$sen['descripcion']."</td>";
                echo "<td>".$sen['direccion']."</td>";
                echo "<td>".$sen['nombre_c']."</td>";
                echo "<td>".$sen['nombre_t']."</td>";
                echo "<td>";
                echo"<form action='getUrl('Senializacion', 'Senializacion', 'postUpdateStatus');' method='post' class='mt-4'>";
                echo "<select class='form-select' name='id' id='id'>";
                echo "<option disabled selected>".($sen['edescripcion'])."</option>";
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