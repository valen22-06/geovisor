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