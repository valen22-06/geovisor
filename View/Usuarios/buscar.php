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