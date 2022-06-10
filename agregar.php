<?php 
    include "conexion.php";
    $nombreUsuario = $_POST['nombreUsuario'];
    $correo = $_POST['correo'];
    $contrasenya = $_POST['contrasenya'];

    if($nombreUsuario!=null && $correo!=null && $contrasenya!=null){
        $sql = 'insert into usuarios values (null, "'.$nombreUsuario.'", "'.$correo.'", "'.$nombreUsuario.'", "'.$contrasenya.
            '", null);';
        mysqli_query($obj_conexion, $sql);
        if($nombre = 1){
            header("location:login.php");
        }
    }


?>