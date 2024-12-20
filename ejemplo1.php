<?php

include_once 'Model/MasterModelMapa.php';

if(!extension_loaded("MapScript")){
    dl('php_mapscript.'.PHP_SHLIB_SUFFIX);
}

$mapObject = ms_newMapObj("Cali.map");

// $map_pt = click2map($_POST['image_x'], $_POST['image_y']);

// $pt = ms_newPointObj();
// $pt -> setXY($map_pt[0], $map_pt[1]);


$mapImage = $mapObject -> draw();

$urlImage = $mapImage -> saveWebImage();

// function click2map($click_x,$click_y)
// {
//     global $mapObject;
//     $e = $mapObject->extent;
//     $x_pct = ($click_x/$mapObject->width);
//     $y_pct = 1- ($click_y/$mapObject->height);
//     $x_map = $e->minx + (($e->maxx-$e->minx)*$x_pct);
//     $y_map = $e->miny + (($e->maxy-$e->miny)*$y_pct);

//     return array($x_map,$y_map);
// }

?>

<html>
    <head>
        <title>Ejemplo 1</title><link rel="stylesheet" type="text/css" href="misc/img/dc.css">
        <script src="misc/lib/mscross-1.1.9.js" type="text/javascript"></script>
        <style type="text/css">
        
        #Layer1 {
            position: absolute;
            width: 362px;
            height: 158px;
            z-index: 101px;
            left: 880px;
            top: 120px;
            
        }

        #Layer2 {
            position: absolute;
            width: 120px;
            padding: 0px 30px;
            height: 150px;
            z-index: 102px;
            left: 880px;
            top: 280px;
            background-color: #688e89;
            border: 2px solid #445b59;
        }


    </style>
        
    </head>

    <body>


        <div class="mscross" style="overflow: hidden; width: 550px; height: 500px; 
    -moz-user-select: none; position: relative; left: 300px; border: 2px solid #445b59;" id="dc_main">

</div>


        <div id="Layer2">

        <form name="select_layers">

            <p align="left">
                <input CHECKED onclick="chgLayers()" type="checkbox" name="layer[0]"
                    value="Mapa">
                <strong>Mapa</strong>

            <p align="left">
                <input CHECKED onclick="chgLayers()" type="checkbox" name="layer[1]"
                    value="Comuna">
                <strong>Comuna</strong>
        
            <p align="left">
                <input CHECKED onclick="chgLayers()" type="checkbox" name="layer[2]"
                    value="Puntos">
                <strong>Puntos</strong>
                
        </form>
    </div> 

    <div id="Layer1">
        <div style="overflow: auto; width: 140px; height: 140px;
        -moz-user-select: none; position: relative; z-index: 100;" id="dc_main2">
        </div>
    </div> 


        <!-- <p> -->
            <b>Coordenadas en pixeles:</b> <?php echo $_POST['image_x']." , ".$_POST['image_y'];?>

            <br><b>Coordenadas mapa:</b> <?php echo $map_pt[0]." , ".$map_pt[1];?>
        <!-- </p> -->
        <!-- <?php
                // $obj = new MasterModel();

                // $result = $obj -> autoIncrement('puntos')-1;
                


                // $sql = "INSERT INTO puntos (id,texto,geom) VALUES ($result,'Punto', ST_SetSRID(ST_GeomFromText('POINT($map_pt[0] $map_pt[1])'),4326))";
                // if ($obj->insert($sql)) {
                //     echo "Se inserto correctamente";
                // } else {
                //     echo "Se ha producido un error al insertar";
                // }
            ?> -->


<script type="text/javascript">
 

        myMap1 = new msMap(document.getElementById("dc_main"),
            'standardRight' );
        myMap1.setCgi('/cgi-bin/mapserv.exe');
        myMap1.setMapFile('/ms4w/Apache/htdocs/geovisor/Cali.map');
        myMap1.setFullExtent(-76.5928, -76.4613, 3.33181);
        myMap1.setLayers( 'Mapa Comuna Puntos' );

        myMap2 = new msMap(document.getElementById("dc_main2"));
        myMap2.setActionNone();
        myMap2.setFullExtent(-76.5928, -76.4613, 3.33181);
        myMap2.setMapFile('/ms4w/Apache/htdocs/geovisor/Cali.map');
        myMap2.setLayers( 'Mapa Comuna Puntos' );
        myMap1.setReferenceMap(myMap2);

        var  infola = new msTool('crear punto',infolay,'misc/img/lugar.png',investiguen);
        myMap1.getToolBar(0).addMapTool(infola);

        myMap1.redraw();
        myMap2.redraw();
        chgLayers();

        var seleclayer = -1;
        var lyactive = false;
        var lejendactive = false;

        function chgLayers(){
            var list = "Layers ";
            var objForm = document.forms[0];
            for(i=0;i<document.forms[0].length; i++){
                if(objForm.elements["layer[" + i + "]"].checked ){
                    list = list + objForm.elements["layer[" + i + "]"].value + " ";
                }

            }
            myMap1.setLayers( list );
            myMap1.redraw();
            myMap2.setLayers( list );
            myMap2.redraw();
        }

        var seleccionado=false;
        function infolay(e,map){
            map.getTagMap().style.cursos="crosshair";
            seleccionado=true;
        }

        function objetoAjax(){
            var xmlhttp = false;

            try {
                xmlhttp = new ActiveXObject("Msxm2.XMLHttpRequest");

            } catch(e) {

                try{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                } catch(E){

                    xmlhttp = new XMLHttpRequest();
                    return xmlhttp;

                }
            }

            function investiguen(event, map, x, y, xx, yy){
                if(seleccionado){
                    alert("Click sobre las coordenadas : x " +x+ "y: " +y+ "y reales: x" +xx+ "y: " +yy);
                    consultar1 = new objetoAjax();

                    consultar1.open("GET","Insertar_punto.php?x=" +xx+ "&y=" +yy, true);

                    consultar1.onreadystatechange=funcion(){
                        if(consultar1.readyState==4){
                            var result = consultar1.responseText;
                            alert(result);
                        }
                    }

                    consultar.send(null);
                    seleccionado = false;
                    map.getTagMap().style.cursor="default";

                }
            }
  
    }

        
    

    </script>

    </body>

</html>