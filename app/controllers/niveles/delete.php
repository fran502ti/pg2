<?php

include ('../../../app/config.php');
$id_niveles = $_POST['id_niveles'];

    $sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_niveles=:id_niveles");

    $sentencia->bindParam('id_niveles', $id_niveles);

        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje']="Datos eliminados en BD correctamente";
            $_SESSION['icono']="success";
            header ('Location: '.APP_URL."/admin/niveles");
        } else {
            session_start();
            $_SESSION['mensaje']="Error al eliminar datos en la BD";
            $_SESSION['icono']="error";
            ?><script>window.history.back();</script><?php
        }