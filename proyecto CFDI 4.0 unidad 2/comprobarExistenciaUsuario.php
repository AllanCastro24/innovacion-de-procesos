<?php
    include "conexion.php";
    $nombre = $_POST['nombreUsuario'];
    $pass = $_POST['contrasenya'];

    $sql = "select pass from usuarios where nombre = '".$nombre."'";
    $result = mysqli_query($obj_conexion, $sql);

    while($fila = mysqli_fetch_assoc($result)){
        if(strcmp($fila['pass'], $pass) == 0 ){
            header("location:index_session.html");
        }else{
            header("location:login.html");
        }
    }

?>
