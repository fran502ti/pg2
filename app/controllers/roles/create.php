<?php

include ('../../../app/config.php');


$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

if ($nombre_rol==""){
    session_start();
    $_SESSION['mensaje']="Llenar todos los campos";
    $_SESSION['icono']="error";
    header ('Location: '.APP_URL."/admin/roles/create.php");
} else {
    $sentencia = $pdo->prepare("INSERT INTO roles 
            (nombre_rol, fyh_creacion, estado) 
    VALUES (:nombre_rol, :fyh_creacion,:estado)");

    $sentencia->bindParam('nombre_rol', $nombre_rol);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_de_registro);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje']="Datos registrados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/roles");
        } else {
            session_start();
            $_SESSION['mensaje']="Error al registrar datos en la BD";
            $_SESSION['icono']="error";
            header ('Location: '.APP_URL."/admin/roles/create.php");
        }
    } catch (Exception $exception) {
            session_start();
            $_SESSION['mensaje']="El rol ya se encuentra registrado en BD";
            $_SESSION['icono']="error";
            header ('Location: '.APP_URL."/admin/roles/create.php");
    }
}

