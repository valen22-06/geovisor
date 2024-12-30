<?php 

include_once 'C:/ms4w/Apache/htdocs/geovisor/Model/Acceso/AccesoModel.php'; 

class AccesoController {
 

    public function getCreate(){
        
        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        
        
        $sql = "SELECT * FROM usuarios WHERE numero_documento=$user";

        $params = array($user);

        $usuario = $obj -> login($sql);

        $hash= hash('sha256',$pass);


        function hash_equals($known_string, $user_string) { if (!is_string($known_string) || !is_string($user_string)) { return false; } if (strlen($known_string) !== strlen($user_string)) { return false; } $res = $known_string ^ $user_string; $ret = 0; for ($i = strlen($res) - 1; $i >= 0; $i--) { $ret |= ord($res[$i]); } return !$ret; }
        
        if (!empty($usuario)){ 

            foreach($usuario as $usu){
                $hashBd = $usu['contrasenia'];
                if(hash_equals($hashBd, $hash)){
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
                    echo "Longitud del hash ingresado: " . strlen(trim($hash)) . "<br>";
    echo "Longitud del hash en base de datos: " . strlen(trim($hashBd)) . "<br>";
                    
                    $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                    // redirect("login.php");
                    
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