<?php
include_once '../Model/Mapa/mapaModel.php';

if(!extension_loaded("MapScript")){
    dl('php_mapscript.'.PHP_SHLIB_SUFFIX);
}

$mapObject = ms_newMapObj("../View/Mapa/Cali.map");



$mapImage = $mapObject -> draw();

$urlImage = $mapImage -> saveWebImage();



?>

<html>
    <head>
        <title>Ejemplo 1</title><link rel="stylesheet" type="text/css">
        <script src="..\View\Mapa\misc\lib\mscross-1.1.9.js" type="text/javascript"></script>
        <style type="text/css">
        
        #layer1{ 
            position: absolute;
            width: 162px;
            height: 158px;
            z-index: 101;
            left: 720px;
            top: 200px;
        }

        #layer2{ 
            position: absolute;
            padding: 20px;
            border-radius: 20px;
            width: 141px;
            height: 140px;
            z-index: 102;
            left: 720px;
            top: 360px;
            color : rgb(255, 255, 255);
            background-color:rgb(168, 160, 160);
        }

       .chbox input:checked{
        background-color:rgb(190, 29, 129);
        }



    </style>
        
    </head>

    <body>


    <div style="overflow-y:scroll;">

    <div class="mscross" style="overflow: hidden; width: 530px; height: 480px; top:30px; left: 80px; -moz-user-select: none; position: relative;border: 2px solid #445b59;" id="dc_main">

</div>



    <div id="Layer2">

    <form name="select_layers">

        <p align="left">
            <input CHECKED onclick="chgLayers()" class="chbox" type="checkbox" name="layer[0]"
                value="Mapa">
            <strong>Mapa</strong>

        <p align="left">
            <input CHECKED onclick="chgLayers()" class="chbox" type="checkbox" name="layer[1]"
                value="Comuna">
            <strong>Comuna</strong>

        <p align="left">
            <input CHECKED onclick="chgLayers()" class="chbox" type="checkbox" name="layer[2]"
                value="Calles">
            <strong>Calles</strong>
    
        <p align="left">
            <input CHECKED onclick="chgLayers()" class="chbox" type="checkbox" name="layer[3]"
                value="Puntos">
            <strong>Puntos</strong>

            <p align="left">
            <input CHECKED onclick="chgLayers()" class="chbox" type="checkbox" name="layer[4]"
                value="Accidente">
            <strong>Accidente</strong>
            
    </form>
</div> 

<div id="Layer1">
    <div style="overflow: auto; width: 140px; height: 140px;
    -moz-user-select: none; position: relative; z-index: 100;" id="dc_main2">
    </div>
</div> 



    </div>
    

<script type="text/javascript">
        
            myMap1 = new msMap(document.getElementById('dc_main'), 
        'standardRight');
        myMap1.setCgi('/cgi-bin/mapserv.exe');
        myMap1.setMapFile('C:/ms4w/Apache/htdocs/geovisor/View/Mapa/Cali.map');
        myMap1.setFullExtent(-76.5928, -76.4613, 3.33181);
        myMap1.setLayers('Accidente Puntos Calles Comuna Mapa');

        myMap2 = new msMap(document.getElementById('dc_main2'), 
        'standardRight');
        myMap2.setActionNone();
        myMap2.setFullExtent(-76.5928, -76.4613, 3.33181);
        myMap2.setMapFile('C:/ms4w/Apache/htdocs/geovisor/View/Mapa/Cali.map');
        myMap2.setLayers('Puntos Comuna Mapa');
        myMap1.setReferenceMap(myMap2);

        myMap1.redraw(); 
        myMap2.redraw();

        var infola = new msTool('crear punto', infolay,'../View/Mapa/misc/img/lugar.png', investiguen);
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

                    // <?php
                    //     $x = x;
                    //     $y = y;

                    //     $obj = new MasterModel();

                    //     $result = $obj -> autoIncrement('puntos')-1;

                    //     $sql = "INSERT INTO puntos (id,texto,geom) VALUES ($result,'Punto', ST_SetSRID(ST_GeomFromText('POINT($x $y)',4326))";
                    //     if ($obj->insert($sql)) {
                    //         echo "Se inserto correctamente";
                    //     } else {
                    //         echo "Se ha producido un error al insertar";
                    //     }
                    // ?>
                    
                // consultar1.open("GET", "index.php?modulo=Solicitudes&controlador=Solicitudes&funcion=getSoli?x="+xx+"&y="+yy,true);
                // consultar1.onreadystatechange=function(){
                //     if(consultar1.readyState==4){
                //         var result= consultar1.responseText;
                //         alert(result)
                //     }

                // }
                // consultar1.send(null)
                seleccionado=false;
                map.getTagMap().style.cursor="default";

                window.location.href = "index.php?modulo=Solicitudes&controlador=Solicitudes&funcion=getSoli&x=" + xx + "&y=" + yy;


            }

         }

        
    </script>

    
</body>
</html>