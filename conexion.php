<?php
    $cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="cfdi";
    $cons_equipo="localhost";
    error_reporting(0);
    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
?>