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