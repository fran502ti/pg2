<?php

include('../../../app/config.php');

$id_grado = $_POST['id_grado'];
$curso = $_POST['curso'];
$seccion = $_POST['seccion'];
$gestion_id = $_POST['gestion_id'];

$sentencia = $pdo->prepare('UPDATE grados
                                    SET curso=:curso,
                                        seccion=:seccion,
                                        gestion_id=:gestion_id, 
                                        fyh_actualizacion=:fyh_actualizacion
                                    WHERE id_grado=:id_grado');

$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_grado',$id_grado);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje']="Datos actualizados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/grados");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje']="Error al actualizar los datos en la BD";
            $_SESSION['icono']="error";
            ?><script>window.history.back();</script><?php
}
