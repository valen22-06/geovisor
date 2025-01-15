<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="../../Web/assets/js/global.js"></script>
<?php
include_once '../Lib/helpers.php'; 

?>

<div class="card shadow-lg" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar PQRS</h3>
    </div>

    <div class="card-body bg-light mb-2">
        
<div class="row">
        <div class="col-md-5 mt-4">
            <input type="text" name="buscarPqrs" id="buscarPqrs" class="form-control" placeholder="Buscar por nombre o correo" data-url="<?php echo getUrl("pqrs","pqrs","buscarPqrs",false,"ajax");?>">
        </div>
</div>
        <div class="table-responsive">
    <table class="table table-hover table-striped mt-3">
    <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Categoria PQRS</th>
                <th>Comentario</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($pqrs)) {
                foreach($pqrs as $p){
                    $clase="";
                    $texto="";
                    echo "<tr>";
                        echo "<td>".$p['id']."</td>";
                        echo "<td>".$p['nom_cat']."</td>";
                        echo "<td>".$p['observacion']."</td>";
                    

                        if($p['estado_pqrs']==8){
                            $clase="btn btn-danger";
                            $texto="Pendiente";
                        }else if($p['estado_pqrs']==7){
                            $clase="btn btn-success";
                            $texto="Completada";
                        }
                         
                        echo "<td>";

                        if (!empty($clase)) {
                            echo "<button type='button' class='$clase' id='cambiar_estado' 
                                  data-url='" . getUrl("pqrs", "pqrs", "postUpdateStatus", false, "ajax") . "' 
                                  data-id='" . $p['estado_pqrs'] . "' 
                                  data-user='" . $p['id'] . "'";
                        
                            if ($_SESSION['rol'] == 3) {
                                echo " disabled";
                            }
                        
                            echo ">$texto</button>";
                        }
                            echo "</td>";
                        
                            echo "<td>";
                            echo "<a href='" . getUrl("pqrs", "pqrs", "getUpdate", array("id_pqrs" => $p['id'])) . "'>";
                            echo "<button class='btn btn-primary'>Editar</button>";
                            echo "</a>";
                            echo "</td>";

                        
                    echo "</tr>";
                }
            } else {
                echo "No hay registros de pqrs";
            }
                
            ?>
        </tbody>
    </table>
            </div>
            </div>
</div>