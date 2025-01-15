<?php 

include_once 'C:/ms4w/Apache/htdocs/geovisor/Model/Pqrs/pqrsModel.php'; 

class pqrsController {

    public function getPQRS(){
        $obj = new pqrsModel();
        $sql = "SELECT c.nombre_categoria_pqrs as nom_cat, e.nombre_estado as nom_est, p.observacion_pqrs as observacion, p.id_pqrs as id, p.id_categoria_pqrs as id_categoria_pqrs, p.estado_pqrs as estado_pqrs FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs order by id_pqrs ASC";
        $pqrs = $obj->consult($sql);
    
        include_once '../View/pqrs/consultPqrs.php';

    }
    
    public function getCreatePQRS(){
        $obj = new pqrsModel();
        $sql = "SELECT * FROM categoria_pqrs";
        $cat_pqrs = $obj->consult($sql);

        $sql = "SELECT * FROM estado WHERE id_tipo_estado=3";
        $estado = $obj->consult($sql);

         if(!empty($cat_pqrs)){
            include_once '../View/pqrs/createPQRS.php';
             
         } else {
             echo "no trae nada";
        }
    
        
    }

    public function postCreatePQRS(){
        $obj = new pqrsModel();
        $id = $obj->autoIncrement("pqrs", "id_pqrs");
        $id_cat = $_POST['cat_pqrs'];
        $comentario = $_POST['comentario'];
        if (!empty($id_cat) && !empty($comentario)){
            $validacion = true;
        } else {
            $validacion = false;
        }

        if ($validacion) {

            $sql = "INSERT INTO pqrs VALUES ($id,'$comentario', 7, $id_cat)";              
            if ($obj->insert($sql)) {
                redirect('index.php');
            } else {
                echo "Se ha producido un error al insertar";
            }

        } else {
            redirect(getUrl("pqrs", "pqrs", "getCreatePQRS"));
        }
    }

    public function postUpdateStatus(){
        $obj = new pqrsModel();
        $id_pqrs=$_POST['user'];
        $est_id = $_POST['id'];
    
        if ($est_id==7) {
            $statusToModify = 8;
        } elseif ($est_id==8) {
            $statusToModify = 7;
        }
    
        $sql = "UPDATE pqrs SET estado_pqrs = $statusToModify WHERE id_pqrs=$id_pqrs";
    
        $ejecutar = $obj->update($sql);
    
        if($ejecutar!=0){
            $sql="SELECT c.nombre_categoria_pqrs as nom_cat, e.nombre_estado as nom_est, p.observacion_pqrs as observacion, p.id_pqrs as id, p.id_categoria_pqrs as id_categoria_pqrs, p.estado_pqrs as estado_pqrs FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs order by id_pqrs ASC";
            $pqrs = $obj->consult($sql);
            include_once '../View/pqrs/buscarPqrs.php';
        } else {
            echo "No se pudo actualizar";
        }
        
    }

    public function buscarPqrs(){
        $obj = new pqrsModel();
    
        $buscar = $_POST['buscar'];

        $sql = "SELECT p.*, c.nombre_categoria_pqrs as nom_cat, e.nombre_estado as nom_est, p.observacion_pqrs as observacion, p.id_pqrs as id, p.id_categoria_pqrs as id_categoria_pqrs, p.estado_pqrs as estado_pqrs FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs AND (c.nombre_categoria_pqrs LIKE '%$buscar%' OR p.observacion_pqrs LIKE '%$buscar%' OR e.nombre_estado LIKE '%$buscar%') order by id_pqrs ASC";

        $pqrs = $obj->consult($sql);

        include_once '../View/pqrs/buscarPqrs.php';


    }

}
?>