<?php
include ('../../../app/config.php');

$id_materia = $_POST['id_materia'];

$sentencia = $pdo->prepare("DELETE FROM materias where id_materia=:id_materia ");

$sentencia->bindParam('id_materia',$id_materia);


try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se elimino la materia correctamente de BD";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/materias");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar materia de BD, intente de nuevo";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/materias");
    }

}catch (Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar materia de BD, intente de nuevo";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/materias");
}






