<?php
include_once '../Lib/helpers.php';
include_once '../View/partials/header.php';
 if (isset($_SESSION['auth'])) {               
    echo"<body>";
        echo "<div class ='wrapper'>";
            include_once '../view/partials/sidebar.php';
            echo"<div class ='main-panel'>";
                include_once '../view/partials/navbar.php';
                    echo"<div class ='container'>";
                        echo"<div class='page-inner'>";
                            if(isset($_GET['modulo'])){
                                resolve();
                            }else{
                                include_once '../View/partials/content.php';
                            }
                        echo"</div>";
                    echo"</div>";
                            include_once '../view/partials/footer.php';
            echo"</div>";
        echo "</div>";
        include_once '../view/partials/scripts.php';
    echo"</body>";
    echo"</html>";
                        // }if(empty($_SESSION)){
                            
                        // }
    }else{
        if(isset($_SESSION['form-ant']) && !$_SESSION['form-ant'] = "iniciar"){
            include_once '../Controller/Usuarios/UsuariosController.php';
            $login= new UsuariosController();
            $login->getCreate();
        }else{
            include_once "login.php";
        }
    }
?>