<?php 

include_once 'C:/ms4w/Apache/htdocs/geovisor/Model/Acceso/AccesoModel.php'; 

class AccesoController {
 

    public function getCreate(){
        
        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        
        
        $sql = "SELECT * FROM usuarios WHERE numero_documento= $1";

        $params = array($user);
        
        $usuario = $obj->login($sql, $params);

        $hash= hash('sha256',$pass);

        $hashBd = $usuario['contrasenia'];
        
        
        if (!empty($usuario)){
            if($hash == $hashBd){
                foreach($usuario as $usu){
                        $_SESSION['id_usu'] = $usuario['id_usuario'];
                        $_SESSION['documento'] = $usuario['numero_documento'];
                        $_SESSION['nombre1'] = $usuario['primer_nombre'];
                        $_SESSION['nombre2'] = $usuario['segundo_nombre'];
                        $_SESSION['apellido1'] = $usuario['primer_apellido'];
                        $_SESSION['apellido2'] = $usuario['segundo_apellido'];
                        $_SESSION['email'] = $usuario['correo'];
                        $_SESSION['telefono'] = $usuario['telefono'];
                        $_SESSION['direccion_residencia'] = $usuario['direccion_residencia'];
                        $_SESSION['nacimiento'] = $usuario['fecha_nacimiento'];
                        $_SESSION['rol'] = $usuario['id_rol'];
                        $_SESSION['estado'] = $usuario['id_estado'];
                        $_SESSION['auth'] = "ok";
                } 

                
                redirect('index.php');

            } else {
                    echo "Longitud del hash ingresado: ". $hash ."<br>";
                    echo "Longitud del hash en base de datos: " . $hashBd . "<br>";
                    
                    // $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                    // redirect("login.php");     
            }

        } else {
            $_SESSION['error'][] = "No hay coincidencias de un usuario con el numero de documento ingresado";
                    redirect("login.php");
        }
    }

    public function logout(){
        session_destroy();
       redirect("login.php");

    }
}

?>