<?php 

include_once 'C:/ms4w/Apache/htdocs/Geovisor/geovisor-1/Model/Acceso/AccesoModel.php'; 

class AccesoController {
 

    public function getCreate(){
        
        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM usuarios WHERE numero_documento=$user";

        $params = array($user);

        $usuario = $obj -> consult($sql);

        $hash= hash('sha256',$pass);

        
        if (!empty($usuario)){
            
            echo "Hash ingresado: " . $hash;
                    echo "Hash en base de datos: " . $usuario['contrasenia'];

            foreach($usuario as $usu){
                
                if($hash == $usu['contrasenia']){
                    
                    
                    $_SESSION['id_usu'] = $usu['id_usuario'];
                    $_SESSION['documento'] = $usu['numero_documento'];
                    $_SESSION['nombre1'] = $usu['primer_nombre'];
                    $_SESSION['nombre2'] = $usu['segundo_nombre'];
                    $_SESSION['apellido1'] = $usu['primer_apellido'];
                    $_SESSION['apellido2'] = $usu['segundo_apellido'];
                    $_SESSION['email'] = $usu['correo'];
                    $_SESSION['telefono'] = $usu['telefono'];
                    $_SESSION['direccion_residencia'] = $usu['direccion_residencia'];
                    $_SESSION['nacimiento'] = $usu['fecha_nacimiento'];
                    $_SESSION['rol'] = $usu['id_rol'];
                    $_SESSION['estado']=$usu['id_estado'];
                    

                    $_SESSION['auth'] = "ok";
                    redirect("index.php");
                } else {
                    
                    $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                    redirect("login.php");
                    
                }
            }    

        } else {
            $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                    redirect("login.php");
        }
    }

    public function logout(){
        session_destroy();
       redirect("login.php");

    }
}

?>