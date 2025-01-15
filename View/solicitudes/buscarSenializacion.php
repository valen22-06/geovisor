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

} else {

    echo "No hay registros de solicitudes de señalizacion nueva";

}

?>