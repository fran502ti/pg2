<?php

include ('../../../../app/config.php');
$id_config_institucion = $_POST['id_config_institucion'];

    $sentencia = $pdo->prepare("DELETE FROM configuracion_institucion WHERE id_config_institucion=:id_config_institucion");

    $sentencia->bindParam('id_config_institucion', $id_config_institucion);

        try{
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje'] = "Datos eliminados en BD correctamente";
                $_SESSION['icono'] = "success";
                header('Location:'.APP_URL."/admin/configuraciones/institucion");
            }else{
                session_start();
                $_SESSION['mensaje'] = "Error al eliminar datos en la BD";
                $_SESSION['icono'] = "error";
                ?><script>window.history.back();</script><?php
            }
        
        }catch (Exception $exception){
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque existe este registro en otras tablas";
            $_SESSION['icono'] = "error";
            ?><script>window.history.back();</script><?php
        }
        