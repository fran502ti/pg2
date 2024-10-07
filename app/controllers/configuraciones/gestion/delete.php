<?php

include ('../../../../app/config.php');
$id_gestion = $_POST['id_gestion'];

    $sentencia = $pdo->prepare("DELETE FROM gestiones WHERE id_gestion=:id_gestion");

    $sentencia->bindParam('id_gestion', $id_gestion);

        try{
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje'] = "Datos eliminados en BD correctamente";
                $_SESSION['icono'] = "success";
                header('Location:'.APP_URL."/admin/configuraciones/gestion");
            }else{
                session_start();
                $_SESSION['mensaje'] = "Error al eliminar datos en la BD";
                $_SESSION['icono'] = "error";
                ?><script>window.history.back();</script><?php
            }
        }catch (Exception $exception){
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, porque este registro existe en otras tablas";
            $_SESSION['icono'] = "error";
            ?><script>window.history.back();</script><?php
        }
        
        
        