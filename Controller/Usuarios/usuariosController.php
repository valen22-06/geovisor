<?php
    include_once '../Model/Usuarios/usuariosModel.php';


class UsuariosController{


    public function getUsuarios(){
            $obj = new usuariosModel();
            $sql="SELECT  u.*, r.nombre_rol as Rdescripcion, e.nombre_estado as Edescripcion, t.nombre_tipo_documento as tipo_documento FROM usuarios u, roles r, estado e, tipo_documento t WHERE u.id_rol=r.id_rol AND u.id_estado = e.id_estado AND u.id_tipo_documento = t.id_tipo_documento ORDER BY u.id_usuario ASC";
            $usuarios = $obj->consult($sql);

            include_once '../View/Usuarios/consult.php';
    }
    


    public function getCreate() {
        $model = new usuariosModel();
        $sql = "SELECT * FROM tipo_documento";
        $tipo_documento =$model->consult($sql);
        if(!empty($tipo_documento)){    
            // include_once 'signup.php';
            // foreach($tipo_documento as $tipo){
            //     echo $tipo;
            // }
            // redirect ('signup.php');
            include_once 'signup.php';
        } 

    }

    public function postCreate() {
        $obj = new usuariosModel();

        $usu_tipo = $_POST['tipo_documento'];
        $usu_documento = $_POST['documento'];
        $usu_nombre1 = $_POST['name'];
        $usu_nombre2 = $_POST['secondName'];
        $usu_apellido1 = $_POST['apellido'];
        $usu_apellido2 = $_POST['segundoApellido'];
        $usu_correo = $_POST['email'];
        $usu_clave = $_POST['Rptpwd'];
        $usu_telefono = $_POST['telefono'];
        $f_nacimiento = $_POST['date'];

        $validacion = true;  
    
        if (empty($usu_documento)) {
            $_SESSION['errores'][] = "El campo documento es requerido";
            $validacion = false;
        }
        if (empty($usu_nombre1)) {
            $_SESSION['errores'][] = "El campo nombre es requerido";
            $validacion = false;
        }
        if (empty($usu_apellido1)) {
            $_SESSION['errores'][] = "El campo apellido es requerido";
            $validacion = false;
        }
        if (empty($usu_apellido2)) {
            $_SESSION['errores'][] = "El campo segundo apellido es requerido";
            $validacion = false;
        }
        if (empty($usu_correo)) {
            $_SESSION['errores'][] = "El campo correo es requerido";
            $validacion = false;
        }
        if (empty($usu_clave)) {
            $_SESSION['errores'][] = "El campo clave es requerido";
            $validacion = false;
        }
    
        if (validarNumeros($usu_documento) == false) {
            $_SESSION['errores'][] = "El campo numero de documento solo debe contener numeros";
            $validacion = false;
        }

        if (validarCampoLetras($usu_nombre1) == false) {
            $_SESSION['errores'][] = "El campo primer nombre solo debe contener letras";
            $validacion = false;
        }

        if (!empty($usu_nombre2)) {
            if (validarCampoLetras($usu_nombre2) == false) {
                $_SESSION['errores'][] = "El campo segundo nombre solo debe contener letras";
                $validacion = false;
            }
        }
        
        if (validarCampoLetras($usu_apellido1) == false) {
            $_SESSION['errores'][] = "El campo apellido solo debe contener letras";
            $validacion = false;
        }
        if (validarCampoLetras($usu_apellido2) == false) {
            $_SESSION['errores'][] = "El campo apellido solo debe contener letras";
            $validacion = false;
        }
    
        if (validarCorreo($usu_correo) == false) {
            $_SESSION['errores'][] = "El campo correo no cumple, verifica que coincida con example@gmail.com";
            $validacion = false;
        }
    
        if (validarClave($usu_clave) == false) {
            $_SESSION['errores'][] = "El campo clave debe contener un número, un carácter especial, una mayúscula y ser de más de 8 caracteres";
            $validacion = false;
        }
    
        $hash = hash('sha256',$usu_clave);
    
        if ($validacion) {
            $id = $obj->autoIncrement("usuarios");
            $sql = "INSERT INTO usuarios VALUES ($id, $usu_documento, '$usu_nombre1', '$usu_nombre2', '$usu_apellido1', '$usu_apellido2', $usu_telefono, '$usu_correo', '$f_nacimiento', '$hash', 1, 3, $usu_tipo)";
    
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {

                redirect("login.php");
            } else {
                echo "Se ha producido un error al insertar";
            }
        } else {
            redirect(getUrl("Usuarios", "Usuarios", "getCreate",false, 'ajax'));    
        }
    }
    

    public function getUpdate(){
        $obj = new UsuariosModel();

        $usu_id = $_SESSION['id_usu'];

        $sql = "SELECT * FROM usuarios WHERE id_usuario = $usu_id";
        $usuarios = $obj->consult($sql);

        $sql1 = "SELECT * FROM tipo_documento";
        $tipo_documento =$obj->consult($sql1);

        include_once '../view/Usuarios/update.php';

    }

    public function postUpdate(){

        $obj = new UsuariosModel();

        $usu_tipo = $_POST['tipo_documento'];
        $usu_documento = $_POST['numero_documento'];
        $usu_id = $_SESSION['id_usu'];
        $usu_nombre1 = $_POST['name'];
        $usu_nombre2 = $_POST['secondName'];
        $usu_apellido1 = $_POST['apellido'];
        $usu_apellido2 = $_POST['segundoApellido'];
        $usu_correo = $_POST['email'];
        $usu_clave = $_POST['Rptpwd'];
        $usu_telefono = $_POST['telefono'];
        
        
        

        if(empty($usu_documento)){
            $_SESSION['errores'][]="El campo documento es requerido";
        }
        if(empty($usu_nombre1)){
            $_SESSION['errores'][]="El campo nombre es requerido";
            $validacion = false;
        }
        
    
        if(empty($usu_apellido1)){
            $_SESSION['errores'][]="El campo apellido es requerido";
            $validacion = false;
        }
        if(empty($usu_apellido2)){
            $_SESSION['errores'][]="El campo nombre es requerido";
            $validacion = false;
        }
    
        if(empty($usu_correo)){
            $_SESSION['errores'][]="El campo correo es requerido";
            $validacion = false;
        }

        if(empty($usu_telefono)){
            $_SESSION['errores'][]="El campo telefono es requerido";
            $validacion = false;
        }
    
        if(empty($usu_clave)){
            $_SESSION['errores'][]="El campo  clave es requerido";
            $validacion = false;
        }
    
        if(empty($rol_id)){
            $_SESSION['errores'][]="El campo rol es requerido";
            $validacion = false;
        }
        if(validarNumeros($usu_documento)==false){
            $_SESSION['errores'][]="El campo documento solo admite numeros";
            $validacion=false;
        }
        if (validarCampoLetras($usu_nombre1) == false) {
            $_SESSION['errores'][]="El campo nombre solo debe contener letras";
            $validacion = false;
        }
        if (validarCampoLetras($usu_nombre2) == false) {
            $_SESSION['errores'][]="El campo nombre solo debe contener letras";
            $validacion = false;
        }
        if (validarCampoLetras($usu_apellido1) == false) {
            $_SESSION['errores'][]="El campo apellido solo debe contener letras";
            $validacion = false;
        }
        if (validarCampoLetras($usu_apellido2) == false) {
            $_SESSION['errores'][]="El campo apellido solo debe contener letras";
            $validacion = false;
        }
    
        if(validarCorreo($usu_correo) == false){
            $_SESSION['errores'][] = "El campo correo no cumple, verifica que coincida con example@gmail.com";
            $validacion = false;
        }

        if(validarNumeros($usu_telefono)==false){
            $_SESSION['errores'][]="El campo documento solo admite numeros";
            $validacion=false;
        }
    
        if(validarClave($usu_clave)== false){
            $_SESSION['errores'][] = "El campo clave debe contener un numero, un caracter especial, una mayuscula y ser de mas de 8 caracteres";
            $validacion = false;
        }

        $hash= hash('sha256',$pass);


            if ($_SESSION['rol']==3) {

                $sql = "UPDATE usuarios SET correo = '$usu_correo', telefono = '$usu_telefono', direccion_residencia ='$usu_direccion', contrasenia ='$hash' WHERE id_usuario = $usu_id";

            } elseif ($_SESSION['rol']==2){

                $sql = "UPDATE usuarios SET primer_nombre = '$usu_nombre1', segundo_nombre = '$usu_nombre2', primer_apellido = '$usu_apellido1', segundo_apellido = '$usu_apellido2', correo = '$usu_correo', telefono = '$usu_telefono', direccion_residencia ='$usu_direccion' WHERE id_usuario = $usu_id";
    
            } elseif ($_SESSION['rol']==1){
                $sql = "UPDATE usuarios SET numero_documento = '$usu_documento', primer_nombre = '$usu_nombre1', segundo_nombre = '$usu_nombre2', primer_apellido = '$usu_apellido1', segundo_apellido = '$usu_apellido2', correo = '$usu_correo', telefono = '$usu_telefono', direccion_residencia ='$usu_direccion', contrasenia id_tipo_documento = '$usu_tipo', contrasenia='$hash' WHERE id_usuario = $usu_id";
            }

      
        //     if($validacion){
        //         if($ejecutar){
        //             redirect(getUrl("Usuarios","Usuarios","getUsuarios"));
        //         }else{
        //             echo "Se ha producido un error al actualizar";
        //         }
        //     }




        // $ejecutar = $obj->update($sql);
        

        

        


    }

    public function postDelete(){
        $obj = new UsuariosModel();
    
        $usu_id = $_POST['usuarioId'];
        
        $sql = "DELETE FROM usuarios WHERE usuarioId = $usu_id";
      
    
        $ejecutar = $obj->delete($sql);
        echo $sql;
    
        
    
        if($ejecutar){
            redirect(getUrl("Usuarios","Usuarios","getUsuarios"));
        }else{
            echo "Se ha producido un error al eliminar";
            redirect(getUrl("Usuarios","Usuarios","getUsuarios"));
        }
    }

    public function buscar(){
        $obj = new usuariosModel();
    
        $buscar = $_POST['buscarUsuarios'];

        $sql = "SELECT  u.*, r.nombre_rol as Rdescripcion, e.nombre_estado as Edescripcion, t.nombre_tipo_documento as tipo_documento FROM usuarios u, roles r, estado e, tipo_documento t WHERE u.id_rol=r.id_rol AND u.id_estado = e.id_estado AND u.id_tipo_documento = t.id_tipo_documento AND (u.primer_nombre LIKE '%$buscar%' OR u.segundo_nombre LIKE '%$buscar%' OR u.primer_apellido LIKE '%$buscar%' OR u.segundo_apellido LIKE '%$buscar%' OR u.correo LIKE '%$buscar%' OR u.telefono::text LIKE '%$buscar%' OR u.direccion_residencia LIKE '%$buscar%' OR u.fecha_nacimiento::text LIKE '%$buscar%') ORDER BY u.id_usuario ASC";

        $usuarios = $obj->consult($sql);

        include_once '../View/Usuarios/buscar.php';

    }

    
    public function postUpdateStatus(){
        $obj = new usuariosModel();
        $usu_id=$_POST['user'];
        $est_id = $_POST['id'];
    
        if ($est_id==1) {
            $statusToModify = 2;
        } elseif ($est_id==2) {
            $statusToModify = 1;
        }
    
        $sql = "UPDATE usuarios SET id_estado = $statusToModify WHERE id_usuario=$usu_id";
    
        $ejecutar = $obj->update($sql);
    
        if($ejecutar!=0){
            $sql="SELECT  u.*, r.nombre_rol as Rdescripcion, e.nombre_estado as Edescripcion FROM usuarios u, roles r, estado e WHERE u.id_rol=r.id_rol AND u.id_estado = e.id_estado ORDER BY u.id_usuario ASC";
            $usuarios = $obj->consult($sql);
            include_once '../View/Usuarios/consult.php';
        } else {
            echo "No se pudo actualizar";
        }
        
    }
}




?>