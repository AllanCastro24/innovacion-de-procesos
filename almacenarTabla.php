<?php
session_start();
error_reporting(0);
include "conexion.php";
$datos = json_decode($_POST["json"]);
$id = $_SESSION["id"];

var_dump($datos);

foreach($datos -> {"data"} as $data){
    $fecha = $data -> {"fecha"};
    $tipo = $data -> {"tipo"};
    $serie = $data -> {"serie"};
    $fact = $data -> {"fact"};
    $razon = $data -> {"razónsocial"};
    $impE = $data -> {"importeexcento"};
    $impAg = $data -> {"importegravado"};
    $iva = $data -> {"iva"};
    $impoRet = $data -> {"importeretenido"};
    $total = $data -> {"total"};
    $rfcPDio = $data -> {"rfcparadiot"};
    $concepto = $data -> {"conceptodelgasto"};
    $nombreRec = $data -> {"nombrereceptor"};
    $rfcRec = $data -> {"rfcreceptor"};
    if($fecha != "Fecha"){
        insertar($fecha, $tipo, $serie, $fact, $razon, $impE, $impAg, $iva, $impoRet, $total, $rfcPDio, $concepto, $nombreRec, $rfcRec, $id, $obj_conexion);
    }
}

function insertar($fecha, $tipo, $serie, $fact, $razon, $impE, $impAg, $iva, $impoRet, $total, $rfcPDio, $concepto, $nombreRec, $rfcRec, $id_usuario, $obj_conexion){
    $sql = 'insert into xml values (null, "'.$fecha.'", "'.$tipo.'", "'.$serie.'", "'.$fact.'", "'.$razon.'", "'.$impE.'","'.$impAg.'","'.$iva.'", "'.$impoRet.'", "'.$total.'", "'.$rfcPDio.'", "'.$concepto.'", "'.$nombreRec.'", "'.$rfcRec.'", "'.$id_usuario.'")';
    echo $sql;
    mysqli_query($obj_conexion, $sql);  
}
       
       