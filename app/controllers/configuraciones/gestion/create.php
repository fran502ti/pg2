<?php

include('../../../../app/config.php');

$gestion = $_POST['gestion'];
$estado = $_POST['estado'];

if ($estado == "ACTIVO"){
    $estado = 1;
} else {
    $estado = 0;
}


$sentencia = $pdo->prepare('INSERT INTO gestiones
(gestion, fyh_creacion, estado)
VALUES ( :gestion,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje']="Se registro el ciclo escolar de manera correcta";
    $_SESSION['icono']="success";
    header('Location:'.APP_URL."/admin/configuraciones/gestion");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje']="Error no se puede registrar en BD. Intente de nuevo.";
    $_SESSION['icono']="error";
    ?><script>window.history.back();</script><?php
}

