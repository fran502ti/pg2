<?php

include('../../../app/config.php');

$id_pensum = $_POST['id_pensum'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

if ($estado == "ACTIVO"){
    $estado = 1;
} else {
    $estado = 0;
}


$sentencia = $pdo->prepare('UPDATE pensum
                                    SET descripcion=:descripcion,
                                        fyh_actualizacion=:fyh_actualizacion,
                                        estado=:estado
                                    WHERE id_pensum=:id_pensum');

$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':estado',$estado);
$sentencia->bindParam('id_pensum',$id_pensum);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje']="Datos actualizados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/pensum");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje']="Error al actualizar los datos en la BD";
            $_SESSION['icono']="error";
            ?><script>window.history.back();</script><?php
}
