<?php
    include "conexion.php";
    error_reporting(0);
    $correo = $_POST['correo'];
    $pass = $_POST['contrasenya'];
    $newPass = $_POST['nuevaContrasenya'];

    $sql = "select pass from usuarios where correo = '".$correo."'";
    $result = mysqli_query($obj_conexion, $sql);



    while($fila = mysqli_fetch_assoc($result)){
        if(strcmp($fila['pass'], $pass) == 0){
            $sql2 = "update usuarios set pass = '".$newPass."' where correo = '".$correo."'";
            mysqli_query($obj_conexion, $sql2);
            echo "<script>alert('Contraseña cambiada exitosamente');</script>";
            echo "<script>window.history.go(-1)</script>";
        }else{
            echo "<script>alert('Error: Compruebe sus datos');</script>";
            echo "<script>window.history.go(-1)</script>";
        }
    }

?>