<?php


include ('../../../app/config.php');

$docente_id = $_POST['docente_id'];
$fecha = $_POST['fecha'];
$estudiante_id = $_POST['estudiante_id'];
$materia_id = $_POST['materia_id'];
$observacion = $_POST['observacion'];
$comentario = $_POST['comentario'];

$sentencia = $pdo->prepare('INSERT INTO reportes
        (docente_id, estudiante_id, materia_id, fecha, observacion, comentario, fyh_creacion, estado)
VALUES (:docente_id,:estudiante_id,:materia_id,:fecha,:observacion,:comentario,:fyh_creacion,:estado)');

$sentencia->bindParam(':docente_id',$docente_id);
$sentencia->bindParam(':estudiante_id',$estudiante_id);
$sentencia->bindParam(':materia_id',$materia_id);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':observacion',$observacion);
$sentencia->bindParam(':comentario',$comentario);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro el reporte correctamente en BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/reportes");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar el reporte, intente de nuevo";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}