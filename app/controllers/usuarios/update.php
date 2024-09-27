<?php
include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password==""){
        $sentencia = $pdo->prepare("UPDATE usuarios
            SET nombres=:nombres,
                rol_id=:rol_id,
                email=:email,
                telefono=:telefono,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_usuario=:id_usuario");
        
        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':telefono',$telefono);
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam('id_usuario',$id_usuario);
    
       try {
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje']="Se actualizaron los datos del usuario de manera correcta";
                $_SESSION['icono']="success";
                header('Location:'.APP_URL."/admin/usuarios");
                }else{
                    session_start();
                    $_SESSION['mensaje']="Error no se pudo actualizar los datos del usuario. Intente de nuevo.";
                    $_SESSION['icono']="error";
                    header('Location:'.APP_URL."/admin/usuarios");
                    ?><script>window.history.back();</script><?php
                }
       } catch (Exception $exception){
                session_start();
                $_SESSION['mensaje']="El correo del usuario ya existe, intente con uno diferente";
                $_SESSION['icono']="error";
                ?><script>window.history.back();</script><?php
       }
      
} 
else {
    if ($password == $password_repeat){
        //echo "Las contrase;as son inguales";
    
        $password = password_hash($password, PASSWORD_DEFAULT);
    
    
        $sentencia = $pdo->prepare("UPDATE usuarios
            SET nombres=:nombres,
                rol_id=:rol_id,
                email=:email,
                password=:password,
                telefono=:telefono,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_usuario=:id_usuario");
        
        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':password',$password);
        $sentencia->bindParam(':telefono',$telefono);
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam('id_usuario',$id_usuario);
    
       try {
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje']="Se actualizo los datos del usuario de manera correcta";
                $_SESSION['icono']="success";
                header('Location:'.APP_URL."/admin/usuarios");
                }else{
                    session_start();
                    $_SESSION['mensaje']="Error no se pudo actualizar los datos del usuario. Intente de nuevo.";
                    $_SESSION['icono']="error";
                    header('Location:'.APP_URL."/admin/usuarios");
                    ?><script>window.history.back();</script><?php
                }
       } catch (Exception $exception){
                session_start();
                $_SESSION['mensaje']="El correo del usuario ya existe, intente con uno diferente";
                $_SESSION['icono']="error";
                ?><script>window.history.back();</script><?php
       }
    
    } else {
        echo "las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje']="Las contraseñas no son iguales";
        $_SESSION['icono']="error";
        ?><script>window.history.back();</script> <?php
    }
}


