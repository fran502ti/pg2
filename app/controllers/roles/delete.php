<?php

include ('../../../app/config.php');
$id_rol = $_POST['id_rol'];

$sql_usuarios = "SELECT * FROM usuarios WHERE estado = '1' AND rol_id='$id_rol' ";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
$contador = 0;

foreach ($usuarios as $usuario){
    $contador = $contador + 1;
}
if ($contador>0){
    //echo "Existe este rol en otra tabla, no se puede eliminar";
    session_start();
                $_SESSION['mensaje']="Error al eliminar datos en la BD. Existe en otra tabla.";
                $_SESSION['icono']="error";
                header ('Location: '.APP_URL."/admin/roles");
} else {
    //echo "No existe registros con este rol, se puede eliminar";
    $sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");

    $sentencia->bindParam('id_rol', $id_rol);

            if ($sentencia->execute()) {
                session_start();
                $_SESSION['mensaje']="Datos eliminados en BD correctamente";
                $_SESSION['icono']="success";
                header ('Location: '.APP_URL."/admin/roles");
            } else {
                session_start();
                $_SESSION['mensaje']="Error al eliminar datos en la BD";
                $_SESSION['icono']="error";
                header ('Location: '.APP_URL."/admin/roles");
            }
}
