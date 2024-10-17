<?php
include ('../../../app/config.php');

$id_reportes = $_POST['id_reportes'];
$docente_id = $_POST['docente_id'];
$fecha = $_POST['fecha'];
$estudiante_id = $_POST['estudiante_id'];
$materia_id = $_POST['materia_id'];
$observacion = $_POST['observacion'];
$comentario = $_POST['comentario'];

$sentencia = $pdo->prepare('UPDATE reportes
       SET docente_id=:docente_id,
           estudiante_id=:estudiante_id,
           materia_id=:materia_id,
           fecha=:fecha,
           observacion=:observacion,
           comentario=:comentario,
           fyh_actualizacion=:fyh_actualizacion
      WHERE id_reportes=:id_reportes ');

$sentencia->bindParam(':docente_id',$docente_id);
$sentencia->bindParam(':estudiante_id',$estudiante_id);
$sentencia->bindParam(':materia_id',$materia_id);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':observacion',$observacion);
$sentencia->bindParam(':comentario',$comentario);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_reportes',$id_reportes);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el reporte correctamente en BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/reportes");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar el reporte, intente de nuevo";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}