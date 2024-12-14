
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
include_once '../Lib/helpers.php'; 

?>



<div class="card shadow-lg" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">PQRS</h3>
    </div>

    <div class="card-body">

<div class="mt-5">
    <div class='alert alert-danger d-none' role='alert' id='error'>

    </div>

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
        
<form action="<?php echo getUrl("pqrs","pqrs","postCreate"); ?> " method="post">
    <div class="row mt-5">

        <div class ="col-md-4">
            <label for="cat_pqrs">Seleccionar categoria PQRS:</label>
    
            
                    <select class="form-control" aria-label="Small select example" name="cat_pqrs" id="cat_pqrs">
                    <option disablet>Seleccione...</option>
                    <?php
                    
                        foreach ($cat_pqrs as $cat) {
                            echo "<option value='".$cat['id_categoria_pqrs']."'>".$cat['nombre_categoria_pqrs']. "</option>";
                        }
                    
                    ?>
                    </select>


                    <div class ="col-md-4">
                        <label for="comentario">Cometario</label>
                        <input type="textarea" name="comentario" id="coment" class="form-control" placeholder="Comentario">
                    </div>
         
        </div>

        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
        
    </div>
        
         
</form>
                    

                    </div>  

</div>

