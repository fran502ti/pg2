<?php

include ('../../../app/config.php');

$id_reportes = $_POST['id_reportes'];

$sentencia = $pdo->prepare("DELETE FROM reportes where id_reportes=:id_reportes ");

$sentencia->bindParam('id_reportes',$id_reportes);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino el reporte correctamente de BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/reportes");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo eliminar el reporte, intente de nuevo";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/reportes");
}