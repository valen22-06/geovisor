

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="C:/ms4w/Apache/htdocs/geovisor/assets/js/global.js"></script>

<?php include_once 'C:/ms4w/Apache/htdocs/geovisor/Lib/helpers.php'; ?>

<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar usuarios</h3>
    </div>

    <div class="card-body">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscarUsuarios" id="buscarUsuarios" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("Usuarios", "Usuarios", "buscar", false, "ajax"); ?>'>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-secondary">
                <tr>
                    <th>Id</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>

                    <th>Fecha Nacimiento</th>
                    <th>Estado</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                foreach($usuarios as $usu){
                    $clase="";
                    $texto="";
                    echo "<tr>";
                        echo "<td>".$usu['id_usuario']."</td>";
                        echo "<td>".$usu['tipo_documento']."</td>";
                        echo "<td>".$usu['numero_documento']."</td>";
                        echo "<td>".$usu['primer_nombre'].' '.$usuarios['segundo_nombre']."</td>";
                        // echo "<td>".$usu['segundo_nombre']."</td>";
                        echo "<td>".$usu['primer_apellido'].' '.$usuarios['segundo_apellido']."</td>";
                        // echo "<td>".$usu['segundo_apellido']."</td>";
                        echo "<td>".$usu['telefono']."</td>";
                        echo "<td>".$usu['correo']."</td>";

                        echo "<td>".$usu['fecha_nacimiento']."</td>";

                        if($usu['id_estado']==1){
                            $clase="btn btn-danger";
                            $texto="Inhabilitar";
                        }else if($usu['id_estado']==2){
                            $clase="btn btn-success";
                            $texto="Habilitar";
                        }
                         
                        echo "<td>";
                            if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                            data-url='" .getUrl("Usuarios", "Usuarios", "postUpdateStatus", false, "ajax"). "' 
                            data-id='" .$usu['id_estado'] ."' 
                            data-user='" .$usu['id_usuario'] ."'>$texto</button>"
                            ."</td>";
                        
                            echo "<td>";
                            echo "<a href='" . getUrl("Usuarios", "Usuarios", "getUpdate", array("id_usuario" => $usu['id_usuario'])) . "'>";
                            echo "<button class='btn btn-primary'>Editar</button>";
                            echo "</a>";
                            echo "</td>";

                        
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>
