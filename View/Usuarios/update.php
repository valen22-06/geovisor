<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
        if(isset($_SESSION['errores'])){
            echo "<div class = 'alert alert-danger' role='alert'>";
            foreach ($_SESSION['errores'] as $error) {
                echo $error;
                echo "<br>";
            }
            echo "</div>";
            unset($_SESSION['errores']);
        }

?>


<div class="card shadow-lg" id="card_red_man">
    <div class="card-header bg-dark text-white text-center">
        <h3 class="display-6 mb-0">Editar perfil</h3>
    </div>

    <div class="card-body">

<?php
include_once '../Lib/helpers.php';
    
        $tipo_docu;
        $usu_tipo = $usuarios['id_tipo_documento'];

        if($usu_tipo == 1){
            $tipo_docu = 'Cedula de ciudadania';

        } elseif ($usu_tipo == 2) {
            $tipo_docu = 'Pasaporte';
            
        } elseif ($usu_tipo == 3) {
            $tipo_docu = 'Permiso de permanencia temporal';
            
        }

        $disabled = "disabled";




?>
<form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">

    <div class="row mt-5">
        <div class ="col-md-4">
        <label for="usuarioNombre1"><b class="text-dark">Tipo de documento</b></label>
        <?php 
            if($usuarios['id_rol'] == 3 || $usuarios['id_rol'] == 2){
                echo  "<input type='text' name='name' id='' class='form-control' placeholder='Tipo de documento' value='".$tipo_docu."' disabled>";   
            } elseif ($usuarios['id_rol'] == 1) {
                echo "<select class='form-control' name='tipo_documento' id='tipo_docu'>";
                echo "<option selected disabled>".$tipo_docu."</option>";
                foreach ($tipo_documento as $tipo) {
                    echo "<option value='".$tipo['id_tipo_documento']."'>" . $tipo['nombre_tipo_documento']. "</option>";
                }
                echo "</select>";            }
        ?>
            
        </div>

        <div class ="col-md-4">
        <label for="usuarioNombre1"><b class="text-dark">Numero de documento</b></label>

        <?php 
            if($usuarios['id_rol'] == 3 || $usuarios['id_rol'] == 2){
                echo "<input type='text' name='numero_documento' id='numero_documento' class='form-control' placeholder='Numero de documento' value='".$usuarios['numero_documento']."'disabled>";
            } elseif ($usuarios['id_rol'] == 1) {
                echo "<input type='text' name='numero_documento' id='numero_documento' class='form-control' placeholder='Numero de documento' value='".$usuarios['numero_documento']."'>";
            }
        ?>
            
        </div>

        <div class ="col-md-4">
        <label for="usuarioNombre1"><b class="text-dark">Primer Nombre</b></label>
        <?php
            if ($usuarios['id_rol']==3) {
                echo "<input type='text' name='name' id='name' class='form-control' placeholder='Primer Nombre' value='".$usuarios['primer_nombre']."' disabled>";
            } else {
                echo "<input type='text' name='name' id='name' class='form-control' placeholder='Primer Nombre' value='".$usuarios['primer_nombre']."'>";
            }
        ?>
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre2"><b class="text-dark">Segundo Nombre</b></label>
        <?php
            if ($usuarios['id_rol']==3) {
                echo "<input type='text' name='secondName' id='name' class='form-control' placeholder='Segundo Nombre' value='".$usuarios['segundo_nombre']."' disabled>";
            } else {
                echo "<input type='text' name='secondName' id='name' class='form-control' placeholder='Segundo Nombre' value='".$usuarios['segundo_nombre']."'>";
            }
        ?>
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido1"><b class="text-dark">Primer Apellido</b></label>
        <?php     
            if ($usuarios['id_rol']==3) {
                echo "<input type='text' name='apellido' id='apellido' class='form-control' placeholder='Primer Apellido' value='".$usuarios['primer_apellido']."' disabled>";  
            } else {
                echo "<input type='text' name='apellido' id='apellido' class='form-control' placeholder='Primer Apellido' value='".$usuarios['primer_apellido']."'>"; 
            }
        
        ?>
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido2"><b class="text-dark">Segundo Apellido</b></label>
        <?php     
            if ($usuarios['id_rol']==3) {
                echo "<input type='text' name='segundoApellido' id='seApellido' class='form-control' placeholder='Segundo Apellido' value='".$usuarios['segundo_apellido']."' disabled>";  
            } else {
                echo "<input type='text' name='segundoApellido' id='seApellido' class='form-control' placeholder='Segundo Apellido' value='".$usuarios['segundo_apellido']."'>";  
               
            }
        
        ?>
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioEmail"><b class="text-dark">Correo</b></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Correo" value="<?php echo $usuarios['correo'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioTelefono"><b  class="text-dark">Telefono</b></label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" value="<?php echo $usuarios['telefono'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioDireccion"><b class="text-dark">Direccion</b></label>
            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" value="<?php echo $usuarios['direccion_residencia'] ?>">
        </div>


        <div class ="col-md-4 mt-3">
        <label for="usuarioClave"><b  class="text-dark">Clave</b></label>
            <input type="password" name="Rptpwd" id="rptwd" class="form-control" placeholder="Clave">
        </div>

        

        <div class="mt-5 text-center">
            <input type="submit" value="Enviar" class="btn btn-dark">
        </div>
        </div>
    
</form>






