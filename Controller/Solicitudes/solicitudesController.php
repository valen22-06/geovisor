<?php
    include_once '../Model/Solicitudes/solicitudesModel.php';
    class SolicitudesController{

        

        public function cargarFormulario(){

            $tipo_soli= $_POST['tipoSolicitud'];

            if ($tipo_soli==1) {
                $this->getCreateAccidente();
            }else if ($tipo_soli==2) {
                $this->getCreateSenializacion();
            } else if ($tipo_soli==3) {
                $this->getCreateSenializacionM();
            } else if ($tipo_soli==4) {
                $this->getCreateReductor();
            } else if ($tipo_soli==5) {
                $this->getCreateReductorM();
            } else if ($tipo_soli==6) {
                $this->getCreateViaM();
            }

        }

        public function cargarConsult(){

            $tipo_soli= $_POST['tipoSolicitud'];

            if ($tipo_soli==1) {
                $this->getAccidente();
            }else if ($tipo_soli==2) {
                $this->getSenializacion();
            } else if ($tipo_soli==3) {
                $this->getSenializacionM();
            } else if ($tipo_soli==4) {
                $this->getReductor();
            } else if ($tipo_soli==5) {
                $this->getReductorM();
            } else if ($tipo_soli==6) {
                $this->getViaM();
            }

        }

        public function getSoli(){
        
            include_once '../View/solicitudes/cargarSolicitudes.php';
        }

        public function getSoliConsult(){
        
            include_once '../View/solicitudes/consultSolicitudes.php';
        }

        public function getViaM(){
            $obj = new solicitudesModel();
            $sql="SELECT v.*, e.nombre_estado as Edescripcion, d.nombre_danio as nombre_d FROM via_mal_estado v, estado e, danio d WHERE v.id_estado = e.id_estado AND d.id_danio=v.id_danio ORDER BY v.id_via_mal_estado ASC";
            $viaM = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultViaMalEstado.php';
        }

        public function getCreateViaM() {
            $model = new solicitudesModel();
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql5="SELECT * FROM danio where id_tipo_danio=1";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/solicitudes/createViaMalEstado.php';

        }

        public function postCreateViaM(){
            $obj = new solicitudesModel();

            $via_danio=$_POST['tipo_danio'];
            $via_comentario=$_POST['comentario'];
            $id_usu = $_SESSION ['id_usu'];


           $validacion = true;
           
           $img = $_FILES['imagen']['name'];

            $ruta = "img/$img";

            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);

            if (empty($via_danio)) {
                $_SESSION['errores'][] = "El campo daño es requerido";
                $validacion = false;
            }
            if ($validacion) {
                $id = $obj->autoIncrement("via_mal_estado");
                $sql = "INSERT INTO via_mal_estado (id_via_mal_estado, descripcion, id_danio, id_usuario, id_estado) VALUES ($id,'$via_comentario',$via_danio, $id_usu, 3 )";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    $id = $obj->autoIncrement("reductores_malEstado");
                $sql = "INSERT INTO reductores_malEstado (id_reductores_malEstado, descripcion, id_categoria_reductor, id_tipo_reductor, id_danio, id_usuario, id_estado) VALUES ($id,'$redu_comentario', $redu_cat_redu, $redu_tipo,$redu_danio, $id_usu, 3 )";
        
                $ejecutar = $obj->insert($sql);
                    if ($ejecutar) {
        
                        redirect("index.php");
                    } else {
                        echo "Se ha producido un error al insertar";
                    }
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("solicitudes", "solicitudes", "getCreateViaM"));
            }
        }

        public function getReductorM(){
            $obj = new solicitudesModel();
            $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t, d.nombre_danio as nombre_d FROM reductores_malestado r, estado e, categoria_reductores c, tipo_reductor t, danio d WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor AND d.id_danio=r.id_danio ORDER BY r.id_reductores_malestado ASC";
            $redu = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultReductorM.php';
        }

        public function getCreateReductorM() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql5="SELECT * FROM danio";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/solicitudes/createReductorM.php';

        }

        public function postCreateReductorM(){
            $obj=new solicitudesModel();

            $redu_cat_redu=$_POST['cat_reductor'];
            // $redu_fecha=$_POST['date'];
            $redu_tipo=$_POST['tipo_reductor'];
            $redu_danio=$_POST['tipo_danio'];
            $redu_comentario=$_POST['comentario'];
            $id_usu = $_SESSION ['id_usu'];


           $validacion = true; 

            
            if (empty($redu_cat_redu)) {
                $_SESSION['errores'][] = "El campo ctegoria es requerido";
                $validacion = false;
            }
            // if (empty($redu_fecha)) {
            //     $_SESSION['errores'][] = "El campo fecha es requerido";
            //     $validacion = false;
            // }

            $img = $_FILES['imagen']['name'];

            $ruta = "img/$img";

            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
            

            if ($validacion) {
                $id = $obj->autoIncrement("reductores_malEstado");
                $sql = "INSERT INTO reductores_malEstado (id_reductores_malEstado, descripcion, id_categoria_reductor, id_tipo_reductor, id_danio, id_usuario, id_estado) VALUES ($id,'$redu_comentario', $redu_cat_redu, $redu_tipo,$redu_danio, $id_usu, 3 )";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("solicitudes", "solicitudes", "getCreateReductorM"));
            }
        }

        public function getReductor(){
            $obj = new solicitudesModel();
            $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t FROM reductores_nuevo r, estado e, categoria_reductores c, tipo_reductor t  WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor ORDER BY r.id_reductores_nuevo ASC";
            $redu = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultReductor.php';
        }

        public function getCreateReductor() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
              
                
            include_once '../View/solicitudes/createReductor.php';

        }

        public function postCreateReductor(){
            $obj = new solicitudesModel();

            $redu_cat_redu=$_POST['cat_reductor'];
            // $redu_fecha=$_POST['date'];
            $redu_tipo=$_POST['tipo_reductor'];
            $redu_comentario=$_POST['comentario'];
            $id_usu = $_SESSION ['id_usu'];

            $validacion = true; 
            
            if (empty($redu_cat_redu)) {
                $_SESSION['errores'][] = "El campo ctegoria es requerido";
                $validacion = false;
            }

            if (empty($redu_tipo)) {
                $_SESSION['errores'][] = "El campo tipo es requerido";
                $validacion = false;
            }
            

            $img = $_FILES['imagen']['name'];

            $ruta = "img/$img";

            if ($validacion) {
                $id = $obj->autoIncrement("reductores_nuevo");
                $sql = "INSERT INTO reductores_nuevo (id_reductores_nuevo, descripcion, id_categoria_reductor, id_tipo_reductor, id_usuario, id_estado, id_punto) VALUES ($id,'$redu_comentario',$redu_cat_redu,$redu_tipo,$id_usu,3,1)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
                    $id_img = $obj->autoIncrement("imagen_reductornuevo_detalle","id_imagen_reductornuevo");
                    $sql = "INSERT INTO imagen_reductornuevo_detalle VALUES ($id_img, '$ruta', $id)";
                    if ($obj->insert($sql)) {
                        redirect("index.php");
                    } else {
                        echo "Intenta nuevamente";
                    }
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("solicitudes", "solicitudes", "getCreateReductor"));
            }


        }

        public function getSenializacionM(){
            $obj = new solicitudesModel();
            $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion, d.nombre_danio as nombre_d FROM senializacion_vial_malestado s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t, danio d  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion AND d.id_danio=s.id_danio ORDER BY s.id_senializacion_vial_malestado ASC";
            $senializacion = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultSenializacionM.php';
        }

        public function getCreateSenializacionM() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM orientacion_senializacion";
            $orientacion =$model->consult($sql);
            $sql2="SELECT * FROM categoria_senializacion";
            $cat_sen =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_senializacion";
            $tipo_sen =$model->consult($sql3);
            $sql4="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql4);
            $sql5="SELECT * FROM danio where id_tipo_danio=2";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/solicitudes/createSenializacionM.php';

        }

        public function postCreateSenializacionM() {
            $obj = new solicitudesModel();

            $sen_tipo_senializacion=$_POST['cat_senializacion'];
            // $sen_fecha=$_POST['date'];
            $sen_cat_senializacion=$_POST['cat_sen'];
            $sen_t_sen=$_POST['t_sen'];
            $sen_danio=$_POST['tipo_danio'];
            $id_usu = $_SESSION ['id_usu'];
            
            $validacion = true; 

            $img = $_FILES['imagen']['name'];

            $ruta = "img/$img";

            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);

            if ($validacion) {
                $id = $obj->autoIncrement("senializacion_vial_malEstado");
                $sql = "INSERT INTO senializacion_vial_malestado VALUES ($id, '$sen_comentario',$sen_tipo_senializacion, $sen_cat_senializacion,  $sen_t_sen,$sen_danio ,$id_usu, 3)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {  
                    $id_img = $obj->autoIncrement("imagen_seniamalestado_detalle","id_imagen_malestado");
                    $sql = "INSERT INTO imagen_seniamalestado_detalle VALUES ($id_img, '$ruta', $id)";
                    if ($obj->insert($sql)) {
                        redirect("index.php");
                    } else {
                        echo "Intenta nuevamente";
                    }
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("solicitudes", "solicitudes", "getCreateSenializacionM"));
            }
        }

        public function getAccidente(){
            $obj = new solicitudesModel();
            $sql="SELECT a.*,e.nombre_estado as Edescripcion, c.nombre_choque_detalle as tipo_choque, t.nombre_tipo_vehiculo as tipo_vehiculo FROM registro_accidente a, estado e, choque_detalle c, tipo_vehiculo t WHERE a.id_estado = e.id_estado AND a.id_tipo_choque=c.id_choque_detalle AND a.id_tipo_vehiculo=t.id_tipo_vehiculo ORDER BY a.id_registro_accidente ASC";
            $accidente = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultAccidente.php';
        }

        public function getCreateAccidente() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM tipo_vehiculo";
            $tipo_vehiculo =$model->consult($sql);
            $sql2="SELECT * FROM choque_detalle";
            $choque =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql4="SELECT * FROM choque";
            $tipo_choque=$model->consult($sql4);

              
                
            include_once '../View/solicitudes/createAccidente.php';

        }

        public function postCreateAccidente() {
            $obj = new solicitudesModel();

            $acc_tipo_acc=$_POST['cat_accidente'];
            $acc_choque=$_POST['choque'];
            $acc_vehiculo=$_POST['vehiculo'];
            $acc_lesionados=$_POST['lesionados'];
            $acc_comentario=$_POST['comentario'];

            $x = $_SESSION['punto_x'];
            $y = $_SESSION['punto_y'];
            

            
            $validacion = true; 
            if (empty($acc_tipo_acc)) {
                $_SESSION['errores'][] = "El campo tipo de accidente es requerido";
                $validacion = false;
            } 

            if (empty($acc_choque)) {
                $_SESSION['errores'][] = "El campo tipo de daño es requerido";
                $validacion = false;
            }

            if (empty($acc_vehiculo)) {
                $_SESSION['errores'][] = "El campo tipo de vehiculo es requerido";
                $validacion = false;
            }

            if (empty($acc_lesionados)) {
                $_SESSION['errores'][] = "El campo lesionados es requerido";
                $validacion = false;
            }

            

            if ($validacion) {
                $id = $obj->autoIncrement("registro_accidente","id_registro_accidente");
                $idP = $obj->autoIncrement("puntos","id_punto");

                $sql = "INSERT INTO puntos (id, texto, geom) VALUES ($idP, 'Punto', ST_SetSRID(ST_GeomFromText('POINT($x $y)'), 4326))";
                $ejecutar = $obj->insert($sql);

                

                
        
                if ($ejecutar) {

                    $sqlA = "INSERT INTO registro_accidente (id_registro_accidente,lesionados,observacion,id_estado,id_tipo_vehiculo,id_tipo_choque, id_punto) VALUES ($id, '$acc_lesionados', '$acc_comentario',3, $acc_vehiculo, $acc_choque,$idP)";
                    $ejecutar = $obj->insert($sqlA);

                     $i=0;
                            $acc_img = $_FILES['imagen']['name'];
                            foreach($acc_img as $acc){
                        
                            $idImg = $obj->autoIncrement("imagen_accidente", "id_imagen_accidente");
                            $ruta = "img/$acc";
                            move_uploaded_file($_FILES['img_acci']['tmp_name'][$i], $ruta);
                            $sql="INSERT INTO imagen_accidente_detalle VALUES ($idImg,'$ruta',$idA)";
                            $ejecutar = $obj->insert($sql);
                            if($ejecutar){}
                                $i++;
                            }
                        
                } else {
                    echo "Se ha producido un error al insertar";
                }

            } else {
                redirect(getUrl("Solicitudes", "Solicitudes", "getCreateAccidente"));
            }

        }

        public function getCreateSenializacion() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM orientacion_senializacion";
            $orientacion =$model->consult($sql);
            $sql2="SELECT * FROM categoria_senializacion";
            $cat_sen =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_senializacion";
            $tipo_sen =$model->consult($sql3);
            $sql4="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql4);
              
                
            include_once '../View/solicitudes/createSenializacion.php';

        }

        public function postCreateSenializacion() {
            $obj = new solicitudesModel();

            $sen_tipo_senializacion=$_POST['cat_senializacion'];
            $sen_cat_senializacion=$_POST['cat_sen'];
            $sen_t_sen=$_POST['t_sen'];
            $sen_via=$_POST['tipo_via'];
            $sen_comentario=$_POST['comentario'];
            $id_usu = $_SESSION ['id_usu'];


            
            $validacion = true; 

            $img = $_FILES['imagen']['name'];

            $ruta = "img/$img";

            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);

            

            if ($validacion) {
                $id = $obj->autoIncrement("senializacion_vial_nueva");
                $sql = "INSERT INTO senializacion_vial_nueva (id_senializacion_vial_nueva, descripcion, id_orientacion_senializacion, id_cat_senializacion,id_tipo_senializacion, id_usuario,id_estado), id_punto VALUES ($id,'$sen_comentario', $sen_tipo_senializacion, $sen_cat_senializacion, $sen_t_sen, $id_usu , 3, 1)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
                    $id_img = $obj->autoIncrement("imagen_senianueva_detalle","id_imagen_senianueva");
                    $sql = "INSERT INTO imagen_accidente_detalle VALUES ($id_img, '$ruta', $id)";
                    if ($obj->insert($sql)) {
                        redirect("index.php");
                    } else {
                        echo "Intenta nuevamente";
                    }
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("Solicitudes", "Solicitudes", "getCreateSenializacion"));
            }
        }

        public function getSenializacion(){
            $obj = new solicitudesModel();
            $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion  FROM senializacion_vial_nueva s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion ORDER BY s.id_senializacion_vial_nueva ASC";
            $senializacion = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultSenializacion.php';
        }
        
        public function buscarAccidente(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];

    
            $sql = "SELECT a.*,e.nombre_estado as Edescripcion, c.nombre_choque_detalle as tipo_choque, t.nombre_tipo_vehiculo as tipo_vehiculo FROM registro_accidente a, estado e, choque_detalle c, tipo_vehiculo t WHERE a.id_estado = e.id_estado AND a.id_tipo_choque=c.id_choque_detalle AND a.id_tipo_vehiculo=t.id_tipo_vehiculo  AND (e.nombre_estado LIKE '%$buscar%' OR c.nombre_choque_detalle LIKE '%$buscar%' OR t.nombre_tipo_vehiculo LIKE '%$buscar%' OR a.lesionados LIKE '%$buscar%' OR a.observacion LIKE '%$buscar%') ORDER BY a.id_registro_accidente ASC";
    
            $accidente = $obj->consult($sql);

            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);
    
            include_once '../view/solicitudes/buscarAccidente.php';
    

        }

        public function buscarReductor(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];

    
            $sql = "SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t FROM reductores_nuevo r, estado e, categoria_reductores c, tipo_reductor t  WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor AND (e.nombre_estado LIKE '%$buscar%' OR c.nombre_categoria_reductores LIKE '%$buscar%' OR t.nombre_tipo_reductor LIKE '%$buscar%' OR r.descripcion LIKE '%$buscar%' OR r.fecha::text LIKE '%$buscar%') ORDER BY r.id_reductores_nuevo ASC";
    
            $redu = $obj->consult($sql);

            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);
    
            include_once '../view/solicitudes/buscarReductor.php';
    

        }

        public function buscarReductorM(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];

    
            $sql = "SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t, d.nombre_danio as nombre_d FROM reductores_malestado r, estado e, categoria_reductores c, tipo_reductor t, danio d WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor AND d.id_danio=r.id_danio ORDER BY r.id_reductores_malestado ASC";
    
            $redu = $obj->consult($sql);

            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);
    
            include_once '../view/solicitudes/buscarReductorM.php';
    

        }

        public function buscarSenializacion(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];

    
            $sql = "SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion  FROM senializacion_vial_nueva s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion ORDER BY s.id_senializacion_vial_nueva ASC";
    
            $accidente = $obj->consult($sql);

            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);
    
            include_once '../view/solicitudes/buscarSenializacion.php';
    

        }

        public function buscarSenializacionM(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];

    
            $sql = "SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion, d.nombre_danio as nombre_d FROM senializacion_vial_malestado s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t, danio d  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion AND d.id_danio=s.id_danio ORDER BY s.id_senializacion_vial_malestado ASC";
    
            $accidente = $obj->consult($sql);

            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);
    
            include_once '../view/solicitudes/buscarAccidente.php';
    

        }

        public function buscarViaMalEstado(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];

    
            $sql = "SELECT a.*,e.nombre_estado as Edescripcion, c.nombre_choque_detalle as tipo_choque, t.nombre_tipo_vehiculo as tipo_vehiculo FROM registro_accidente a, estado e, choque_detalle c, tipo_vehiculo t WHERE a.id_estado = e.id_estado AND a.id_tipo_choque=c.id_choque_detalle AND a.id_tipo_vehiculo=t.id_tipo_vehiculo  AND (e.nombre_estado LIKE '%$buscar%' OR c.nombre_choque_detalle LIKE '%$buscar%' OR t.nombre_tipo_vehiculo LIKE '%$buscar%' OR a.lesionados LIKE '%$buscar%' OR a.observacion LIKE '%$buscar%') ORDER BY a.id_registro_accidente ASC";
    
            $accidente = $obj->consult($sql);

            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);
    
            include_once '../view/solicitudes/buscarAccidente.php';
    

        }

        public function postUpdateStatusAccidente(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['id_accidente'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE registro_accidente SET id_estado = $est_id WHERE id_registro_accidente=$usu_id";
        
            $ejecutar = $obj->update($sql);

            $sql = "SELECT * FROM estado where id_tipo_estado=2";
            $estado =$obj->consult($sql);
            


            if($ejecutar!=0){
            $sql = "SELECT a.*,e.nombre_estado as Edescripcion, c.nombre_choque_detalle as tipo_choque, t.nombre_tipo_vehiculo as tipo_vehiculo FROM registro_accidente a, estado e, choque_detalle c, tipo_vehiculo t WHERE a.id_estado = e.id_estado AND a.id_tipo_choque=c.id_choque_detalle AND a.id_tipo_vehiculo=t.id_tipo_vehiculo ORDER BY a.id_registro_accidente ASC";
                $accidente = $obj->consult($sql);
                include_once '../View/solicitudes/consultAccidente.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }

        public function postUpdateStatusSenializacion(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['id_senializacion'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE senializacion_vial_nueva SET id_estado = $est_id WHERE id_senializacion_nueva=$usu_id";
        
            $ejecutar = $obj->update($sql);

            $sql = "SELECT * FROM estado where id_tipo_estado=2";
            $estado =$obj->consult($sql);


            if($ejecutar!=0){

                $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion  FROM senializacion_vial_nueva s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion ORDER BY s.id_senializacion_vial_nueva ASC";
                $senializacion = $obj->consult($sql);
                

                include_once '../View/solicitudes/consultSenializacion.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }

        public function postUpdateStatusSenializacionM(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['id_senializacion'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE senializacion_vial_malestado SET id_estado = $est_id WHERE id_senializacion_malestado=$usu_id";
        
            $ejecutar = $obj->update($sql);

            $sql = "SELECT * FROM estado where id_tipo_estado=2";
            $estado =$obj->consult($sql);
            


            if($ejecutar!=0){

                $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion, d.nombre_danio as nombre_d FROM senializacion_vial_malestado s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t, danio d  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion AND d.id_danio=s.id_danio ORDER BY s.id_senializacion_vial_malestado ASC";
                $senializacion = $obj->consult($sql);
                include_once '../View/solicitudes/consultSenializacionM.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }

        public function postUpdateStatusReductor(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['id_reductor'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE reductores_nuevo SET id_estado = $est_id WHERE id_reductores_nuevo=$usu_id";
        
            $ejecutar = $obj->update($sql);

            $sql = "SELECT * FROM estado where id_tipo_estado=2";
            $estado =$obj->consult($sql);
            


            if($ejecutar!=0){

                $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t FROM reductores_nuevo r, estado e, categoria_reductores c, tipo_reductor t  WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor ORDER BY r.id_reductores_nuevo ASC";
                
                $redu = $obj->consult($sql);

                include_once '../View/solicitudes/consultReductor.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }

        public function postUpdateStatusReductorM(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['id_reductor'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE reductores_malestado SET id_estado = $est_id WHERE id_reductores_malestado=$usu_id";
        
            $ejecutar = $obj->update($sql);

            $sql = "SELECT * FROM estado where id_tipo_estado=2";
            $estado =$obj->consult($sql);
            


            if($ejecutar!=0){

                $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t, d.nombre_danio as nombre_d FROM reductores_malestado r, estado e, categoria_reductores c, tipo_reductor t, danio d WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor AND d.id_danio=r.id_danio ORDER BY r.id_reductores_malestado ASC";
                
                $redu = $obj->consult($sql);

                include_once '../View/solicitudes/consultReductorM.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }

        public function postUpdateStatusVia(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['id_via'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE via_mal_estado SET id_estado = $est_id WHERE id_via_mal_estado =$usu_id";
        
            $ejecutar = $obj->update($sql);

            $sql = "SELECT * FROM estado where id_tipo_estado=2";
            $estado =$obj->consult($sql);
            


            if($ejecutar!=0){

                $sql="SELECT v.*, e.nombre_estado as Edescripcion, d.nombre_danio as nombre_d FROM via_mal_estado v, estado e, danio d WHERE v.id_estado = e.id_estado AND d.id_danio=v.id_danio ORDER BY v.id_via_mal_estado ASC";

                $viaM = $obj->consult($sql);

                include_once '../View/solicitudes/consultViaMalEstado.php';

            } else {
                echo "No se pudo actualizar";
            }
            
        }

        
    }

    
?>