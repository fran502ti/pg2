<?php

include('../../../app/config.php');

$descripcion = $_POST['descripcion'];

$sentencia = $pdo->prepare('INSERT INTO pensum
(descripcion, fyh_creacion, estado)
VALUES (:descripcion,:fyh_creacion,:estado)');

$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje']="Datos registrados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/pensum");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje']="Error al registrar datos en la BD";
            $_SESSION['icono']="error";
            ?><script>window.history.back();</script><?php
}