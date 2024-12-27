<?php
include_once 'C:/ms4w/Apache/htdocs/geovisor/Model/Mapa/mapaModel.php';

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maqueta 1</title>
    <link rel="stylesheet" type="text/css" href="misc/img/dc.css">
    <script src="misc/lib/mscross-1.1.9.js" type="text/javascript"></script>
    <style type="text/css">
        #layer1{ 
            position: absolute;
            width: 162px;
            height: 158px;
            z-index: 101;
            left: 600px;
            top: 26px;
        }
        #layer2{ 
            position: absolute;
            padding: 20px;
            border-radius: 20px;
            width: 141px;
            height: 140px;
            z-index: 102;
            left: 600px;
            top: 216px;
            background-color: #CCCCCC;
        }
    </style>
</head>
<body>
    <div class="mscross" style="overflow: hidden; width: 530px; height: 500px; -moz-user-select: none; position: relative;" id="dc_main">

    </div>
    <div id="layer2">
        <form action="" name="select_layers">
        <p align="left">
                <input CHECKED onclick="chgLayers()" type="checkbox" name="layer[3]" value="Punto">
                <strong>puntos</strong>
            </p>

            <p align="left">
                <input CHECKED onclick="chgLayers()" type="checkbox" name="layer[0]" value="Mapa">
                <strong>cali</strong>
            </p>

            <p align="left">
                <input CHECKED onclick="chgLayers()" type="checkbox" name="layer[1]" value="Comuna">
                <strong>Comunas</strong>
            </p>

            
           
    

        </form>
    </div>
        <div id="layer1">
            <div style="overflow: auto; width: 140px; height:140px; -moz-user-select: none; position: relative; z-index: 100;" id="dc_main2">

            </div>
        </div>
    <script type="text/javascript">
        //<![CDATA[
        myMap1 = new msMap(document.getElementById('dc_main'), 
        'standardRight');
        myMap1.setCgi('/cgi-bin/mapserv.exe');
        myMap1.setMapFile('/ms4w/Apache/htdocs/geovisor/View/Cali.map');
        myMap1.setFullExtent(-76.5928, -76.4613, 3.33181);
        myMap1.setLayers('Punto Comuna Mapa');

        myMap2 = new msMap(document.getElementById('dc_main2'), 
        'standardRight');
        myMap2.setActionNone();
        myMap2.setFullExtent(-76.5928, -76.4613, 3.33181);
        myMap2.setMapFile('/ms4w/Apache/htdocs/geovisor/View/partials/Cali.map');
        myMap2.setLayers('Nombre Poligonos Lineas Puntos');
        myMap1.setReferenceMap(myMap2);

        myMap1.redraw(); 
        myMap2.redraw();

        var infola = new msTool('crear punto', infolay,'misc/img/lugar.png', investiguen);
        myMap1.getToolbar(0).addMapTool(infola);

        chgLayers();

        function chgLayers(){
            var list = "Layers ";
            var objForm = document.forms[0];
            for(i=0 ; i<document.forms[0].length; i++){
                if(objForm.elements["layer[" + i + "]"].checked){
                    list = list + objForm.elements["layer[" + i +"]"].value + " ";
                }
            }
            myMap1.setLayers( list );
            myMap1.redraw();
        }

        var seleccionado = false;
        function infolay(e,map){
            myMap1.getTagMap().style.cursor="crosshair";
            seleccionado=true;

        }

         function objectAjax(){
            var xmlhttp=false;

                try{
                    xmlhttp = new ActiveXObject("Msxm2.XMLHttpRequest");
                }catch(e){
                    try{
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch(E){
                        xmlhttp=false;

                    }

                }
                if(!xmlhttp && typeof XMLHttpRequest != 'undefined'){
                    xmlhttp = new XMLHttpRequest();
                    return xmlhttp;
                }

         }

         function investiguen(event,map,x,y,xx,yy){
            if(seleccionado){
                alert("Click sobre las coordenadas: x " +x+ "y: " +y+ "y reales : x" +xx+ "y: "+yy);

                consultar1 = new objectAjax();
                consultar1.open("GET", "Insertar_punto.php?x="+xx+"&y="+yy,true);
                consultar1.onreadystatechange=function(){
                    if(consultar1.readyState==4){
                        var result= consultar1.responseText;
                        alert(result)
                    }

                }
                consultar1.send(null)
                seleccionado=false;
                map.getTagMap().style.cursor="default";

            }

         }

        
    </script>
    
</body>
</html>