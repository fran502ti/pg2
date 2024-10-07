<?php

include ('../../../app/config.php');

$id_grado = $_POST['id_grado'];

$sentencia = $pdo->prepare("DELETE FROM grados where id_grado=:id_grado ");

$sentencia->bindParam('id_grado',$id_grado);

try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino el grado correctamente de la BD";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/grados");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo eliminar el grado en BD, intente de nuevo";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
}catch (Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}


