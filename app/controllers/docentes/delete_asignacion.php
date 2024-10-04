<?php
include ('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];

$sentencia = $pdo->prepare("DELETE FROM asignaciones WHERE id_asignacion=:id_asignacion ");

$sentencia->bindParam('id_asignacion',$id_asignacion);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "La asignacion fue eliminada correctamente de BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/docentes/asignacion.php");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar asignacion en BD, intente de nuevo";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/docentes/asignacion.php");
}