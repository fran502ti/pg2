<?php

include('../../../app/config.php');

$curso = $_POST['curso'];
$seccion = $_POST['seccion'];
$gestion_id = $_POST['gestion_id'];

$sentencia = $pdo->prepare('INSERT INTO grados
(curso,seccion,gestion_id, fyh_creacion, estado)
VALUES (:curso,:seccion,:gestion_id,:fyh_creacion,:estado)');

$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje']="Datos registrados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/grados");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje']="Error al registrar datos en la BD";
            $_SESSION['icono']="error";
            ?><script>window.history.back();</script><?php
}

