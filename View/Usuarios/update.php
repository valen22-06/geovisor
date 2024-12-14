
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
    foreach($usuarios as $usu){

        $tipo_docu;

        if($usu['id_tipo_documento']==1){
            $tipo_docu = 'Cedula de ciudadania';

        } elseif ($usu['id_tipo_documento']==2) {
            $tipo_docu = 'Pasaporte';
            
        } elseif ($usu['id_tipo_documento']==3) {
            $tipo_docu = 'Permiso de permanencia temporal';
            
        }

        if ($usu['id_rol']==3) {
    

?>

<form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">

    <div class="row mt-5">
        <div class ="col-md-4">
        <label for="usuarioNombre1"><b class="text-dark">Tipo de documento</b></label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $tipo_docu?>" disabled>
        </div>

        <div class ="col-md-4">
        <label for="usuarioNombre1"><b class="text-dark">Numero de documento</b></label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['numero_documento'] ?>" disabled>
        </div>

        <div class ="col-md-4">
        <label for="usuarioNombre1"><b class="text-dark">Primer Nombre</b></label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['primer_nombre'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre2"><b class="text-dark">Segundo Nombre</b></label>
            <input type="text" name="secondName" id="" class="form-control" placeholder="Segundo Nombre" value="<?php echo $usu['segundo_nombre'] ?>">
        </div>

        

        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido1"><b class="text-dark">Primer Apellido</b></label>
            <input type="text" name="apellido" id="" class="form-control" placeholder="Primer Apellido" value="<?php echo $usu['primer_apellido'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido2"><b class="text-dark">Segundo Apellido</b></label>
            <input type="text" name="segundoApellido" id="" class="form-control" placeholder="Segundo Apellido" value="<?php echo $usu['segundo_apellido'] ?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioEmail"><b class="text-dark">Correo</b></label>
            <input type="email" name="email" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['correo'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioTelefono"><b  class="text-dark">Telefono</b></label>
            <input type="text" name="telefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioDireccion"><b class="text-dark">Direccion</b></label>
            <input type="text" name="direccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion_residencia'] ?>">
        </div>


        <div class ="col-md-4 mt-3">
        <label for="usuarioClave"><b  class="text-dark">Clave</b></label>
            <input type="password" name="Rptpwd" id="" class="form-control" placeholder="Clave" value="Sincambios">
        </div>

        
        <div class="mt-5 text-center">
            <input type="submit" value="Enviar" class="btn btn-dark">
        </div>
    
    </form>

    </div>

<?php
        } elseif ($usu['id_rol']==2) {
            
?>

<form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">
    <div class="row mt-5">

        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre1"><b>Tipo de documento</b></label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $tipo_docu?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre1">Numero de documento</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['numero_documento'] ?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre1">Primer Nombre</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['primer_nombre'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre2">Segundo Nombre</label>
            <input type="text" name="secondName" id="" class="form-control" placeholder="Segundo Nombre" value="<?php echo $usu['segundo_nombre'] ?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido1">Primer Apellido</label>
            <input type="text" name="apellido" id="" class="form-control" placeholder="Primer Apellido" value="<?php echo $usu['primer_apellido'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido2">Segundo Apellido</label>
            <input type="text" name="segundoApellido" id="" class="form-control" placeholder="Segundo Apellido" value="<?php echo $usu['segundo_apellido'] ?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['correo'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioTelefono">Telefono</label>
            <input type="text" name="telefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioDireccion">Direccion</label>
            <input type="text" name="direccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion_residencia'] ?>">
        </div>


        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="Rptpwd" id="" class="form-control" placeholder="Clave" value="<?php echo $usu['contrasenia'] ?>">
        </div>

        
        <div class="mt-5 text-center">
            <input type="submit" value="Enviar" class="btn btn-dark">
        </div>
    
    </form>
    </div>

<?php
        } elseif ($usu['id_rol']==1) {
           
?>

<form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">
    <div class="row mt-5">
        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre1">Tipo de documento</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $tipo_docu?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre1">Numero de documento</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['numero_documento'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre1">Primer Nombre</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['primer_nombre'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioNombre2">Segundo Nombre</label>
            <input type="text" name="secondName" id="" class="form-control" placeholder="Segundo Nombre" value="<?php echo $usu['segundo_nombre'] ?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido1">Primer Apellido</label>
            <input type="text" name="apellido" id="" class="form-control" placeholder="Primer Apellido" value="<?php echo $usu['primer_apellido'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioApellido2">Segundo Apellido</label>
            <input type="text" name="segundoApellido" id="" class="form-control" placeholder="Segundo Apellido" value="<?php echo $usu['segundo_apellido'] ?>">
        </div>

        <div class ="col-md-4 mt-3">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['correo'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioTelefono">Telefono</label>
            <input type="text" name="telefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4 mt-3">
        <label for="usuarioDireccion">Direccion</label>
            <input type="text" name="direccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion_residencia'] ?>">
        </div>


        <div class ="col-md-4 mt-3">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="Rptpwd" id="" class="form-control" placeholder="Clave" value="<?php echo $usu['contrasenia'] ?>">
        </div>

        
        <div class="mt-5 text-center">
            <input type="submit" value="Enviar" class="btn btn-dark">
        </div>
    
    </form>
        </div>
    </div>

<?php
        }}

?>