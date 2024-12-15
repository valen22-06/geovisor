<?php

include_once 'Model/MasterModelMapa.php';

if(!extension_loaded("MapScript")){
    dl('php_mapscript.'.PHP_SHLIB_SUFFIX);
}

$mapObject = ms_newMapObj("Colombia.map");

$map_pt = click2map($_POST['image_x'], $_POST['image_y']);

$pt = ms_newPointObj();
$pt -> setXY($map_pt[0], $map_pt[1]);


$mapImage = $mapObject -> draw();

$urlImage = $mapImage -> saveWebImage();

function click2map($click_x,$click_y)
{
    global $mapObject;
    $e = $mapObject->extent;
    $x_pct = ($click_x/$mapObject->width);
    $y_pct = 1- ($click_y/$mapObject->height);
    $x_map = $e->minx + (($e->maxx-$e->minx)*$x_pct);
    $y_map = $e->miny + (($e->maxy-$e->miny)*$y_pct);

    return array($x_map,$y_map);
}

?>

<html>
    <head>
        <title>Ejemplo 1</title>
    </head>

    <body>

        <form action="ejemplo1.php" method="post">

            <input type="image" name="image" src="<?php echo $urlImage; ?>" border=1>

        </form>

        <p>
            <b>Coordenadas en pixeles:</b> <?php echo $_POST['image_x']." , ".$_POST['image_y'];?>

            <br><b>Coordenadas mapa:</b> <?php echo $map_pt[0]." , ".$map_pt[1];?>
        </p>
        <?php
                $obj = new MasterModel();

                $result = $obj -> autoIncrement('puntos')-2;
                


                $sql = "INSERT INTO puntos (id,texto,geom) VALUES ($result,'Punto', ST_SetSRID(ST_GeomFromText('POINT($map_pt[0] $map_pt[1])'),4326))";
                if ($obj->insert($sql)) {
                    echo "Se inserto correctamente";
                } else {
                    echo "Se ha producido un error al insertar";
                }
            ?>

    </body>

</html>