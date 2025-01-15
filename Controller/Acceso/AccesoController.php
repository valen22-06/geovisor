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

            if($usuario['id_estado']==1){
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
                        
                        $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                        redirect("login.php");     
                }
            } else if ($usuario['id_estado']==2){
                $_SESSION['error'][] = "Este usuario se encuentra inactivo, no puede ingresar";
                redirect("login.php"); 
            }
            

        } else {
            $_SESSION['error'][] = "No hay coincidencias de un usuario con el numero de documento ingresado";
                    redirect("login.php");
        }
    }

    public function recuperar_contrasenia(){

        require '../Web/Recuperar/PHPMAILER/PHPMailerAutoload.php';

        $num_docu = $_POST[user];
        $obj = new AccesoModel();
        $sql="SELECT correo from usuarios WHERE numero_documento= $num_docu";
        $usu = $obj->consult($sql);

        if (!empty($usu)) {

            $mail = new PHPMailer;

       
              
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp-mail.outlook.com';                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'grupogeovision@outlook.com';                     
                $mail->Password   = 'Geovision2024';          
                $mail->Port       = 587;
            
                //Recipients
                $mail->setFrom('grupogeovision@outlook.com', 'Geovision');
                $mail->addAddress('estudiar456@gmail.com', 'Querido usuario');     

            
                //Content
                $mail->isHTML(true);                                  
                $mail->Subject = 'Recuperacion de contraseña';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }


        } else {
            // <script>
            // Swal.fire({
            //     title: 'Error',
            //     text: 'No hay coincidencias de un usuario con el numero de documento ingresado.',
            //     icon: 'error',
            //     confirmButtonText: 'Aceptar'
            // });
            // </script>
                echo "no existe este usuario";
        }
    
}

    public function logout(){
        session_destroy();
       redirect("login.php");

    }
}

?>