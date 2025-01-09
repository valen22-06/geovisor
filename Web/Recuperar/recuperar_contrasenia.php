<?php

include_once '../../Lib/helpers.php';

?>
<script src = "../assets/js/jquery.js"></script>
<script src = "../assets/js/global.js"></script>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/form-icon.png" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous" />
    <!-- <link
        rel="stylesheet"
        href="assets/css/login.css" /> -->
       
</head>


<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container" style="max-width: 400px;">
        <div class='alert alert-danger d-none' role='alert' id='error'></div>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger' role='alert'>";
            foreach ($_SESSION['error'] as $error) {
                echo $error;
                echo "<br>";
            }
            echo "</div>";
            unset($_SESSION['error']);
        }
        ?>

        <div class="card shadow-lg" id="card_red_man">
            <div class="card-header bg-dark text-light text-center">
                <h3 class="display-6 mb-2">Recuperar contraseña</h3>
            </div>

            <div class="card-body shadow-lg bg-light">

                <form class="mt-4" action="<?php echo getUrl('Acceso', 'Acceso', 'recuperar_contrasenia', false, '../ajax'); ?>" method="post">
                    
                    <div class="mb-3 m-4">
                        <label for="documento" class="form-label text-dark"><b>Documento de identidad:</b></label>
                        <input type="text" class="form-control bg-light text-dark" name="user" id="documento" placeholder="Numero de documento" required />
                    </div>
                    
                    <div class="mt-5 text-center">
                    <button type="submit" id="btn-recuperar" class="btn btn-dark w-50">Recuperar</button>
                    </div>
                </form>

                <div class="mt-3 mb-4 text-center">
                    <a href="../login.php">
                        <button type="button" id="volver" class="btn btn-secondary w-50">Volver</button>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</body>



</html>