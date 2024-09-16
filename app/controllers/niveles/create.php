<?php
include('../../../app/config.php');


$gestion_id = $_POST['gestion_id'];
$nivel = $_POST['nivel'];

$sentencia = $pdo->prepare('INSERT INTO niveles
(gestion_id,nivel, fyh_creacion, estado)
VALUES ( :gestion_id,:nivel,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam(':nivel',$nivel);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje']="Datos registrados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/niveles");
}else{
echo 'error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje']="Error al registrar datos en la BD";
            $_SESSION['icono']="error";
            header ('Location: '.APP_URL."/admin/roles/create.php");
}

