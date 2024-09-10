<?php

include ('../../../app/config.php');
$id_usuario = $_POST['id_usuario'];

    $sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

    $sentencia->bindParam('id_usuario', $id_usuario);

        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje']="Datos eliminados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/usuarios");
        } else {
            session_start();
            $_SESSION['mensaje']="Error al eliminar datos en la BD";
            $_SESSION['icono']="error";
            header ('Location: '.APP_URL."/admin/usuarios");
        }