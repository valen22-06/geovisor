<?php
            if(!empty($redu)){
                foreach($redu as $redu){
                    $clase="";
                    $texto="";
                    echo "<tr>";
                    echo "<td>".$redu['id_reductores_nuevo']."</td>";
                    echo "<td>".$redu['fecha']."</td>";
                    echo "<td>".$redu['descripcion']."</td>";
                    echo "<td>".$redu['nombre_c']."</td>";
                    echo "<td>".$redu['nombre_t']."</td>";
                    echo "<td>";
                    echo"<form action='getUrl('Senializacion', 'Senializacion', 'postUpdateStatus');' method='post' class='mt-4'>";
                    echo "<select class='form-select' name='id' id='id'>";
                    echo "<option disabled selected>".($redu['edescripcion'])."</option>";
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
            } else {

                echo "No hay registros de solicitudes de reductores nuevos";

            }

?>