<?php
    include "conexion.php";
    $nombre = $_POST['nombreUsuario'];
    $pass = $_POST['contrasenya'];

    $sql = "select pass,id_user from usuarios where nombre = '".$nombre."'";
    $result = mysqli_query($obj_conexion, $sql);

    while($fila = mysqli_fetch_assoc($result)){
        if(strcmp($fila['pass'], $pass) == 0 ){
            session_start();
            $_SESSION["usuario"] = $nombre;
            $_SESSION["id"] = $fila['id_user'];
            header("location:index_final.php");
        }else{
            header("location:login.php");
        }
    }

?>


