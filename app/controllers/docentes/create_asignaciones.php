<?php


include ('../../../app/config.php');

$id_docente = $_POST['id_docente'];
$id_grado = $_POST['id_grado'];
$id_materia = $_POST['id_materia'];

$sentencia = $pdo->prepare('INSERT INTO asignaciones
        ( docente_id, grado_id, materia_id, fyh_creacion, estado)
VALUES ( :docente_id,:grado_id,:materia_id,:fyh_creacion,:estado)');

$sentencia->bindParam(':docente_id',$id_docente);
$sentencia->bindParam(':grado_id',$id_grado);
$sentencia->bindParam(':materia_id',$id_materia);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro la asignación correctamente en la BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/docentes/asignacion.php");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en BD, intente de nuevo";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}