<?php
                foreach($accidente as $acc){
                    
                    echo "<tr>";
                echo "<td>".$acc['id_registro_accidente']."</td>";
                echo "<td>".$acc['fecha_accidente']."</td>";
                echo "<td>".$acc['lesionados']."</td>";
                echo "<td>".$acc['observacion']."</td>";
                echo "<td>".$acc['direccion']."</td>";
                echo "<td>";
                echo "<select class='form-select' name='cat_accidente' id='cat_accidente'>";
                echo "<option disabled selected>".$acc['edescripcion']."</option>";
                foreach ($estado as $est) {
                echo "<option value='".$acc['id_estado']."'>".$est['nombre_estado']."</option>";
                }
                echo "</select>";
                echo "</td>";
                echo"<td>".$acc['tipo_vehiculo']."</td>";
                echo"<td>".$acc['tipo_choque']."</td>";
                echo "</tr>";
                }