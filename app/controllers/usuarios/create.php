<?php
include('../../../app/config.php');

$nombres = $_POST['nombres'];
$dpi = $_POST['dpi'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password == $password_repeat){
    //echo "Las contrase;as son inguales";

    $password = password_hash($password, PASSWORD_DEFAULT);


    $sentencia = $pdo->prepare('INSERT INTO usuarios
    (nombres,dpi,rol_id,email,telefono,password, fyh_creacion, estado)
    VALUES ( :nombres,:dpi,:rol_id,:email,:telefono,:password,:fyh_creacion,:estado)');
    
    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':dpi',$dpi);
    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':telefono',$telefono);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro);

   try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje']="Se registro al usuario de manera correcta";
            $_SESSION['icono']="success";
            header('Location:'.APP_URL."/admin/usuarios");
            }else{
                session_start();
                $_SESSION['mensaje']="Error no se puede registrar al usuario. Intente de nuevo.";
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
    echo "las contrase;as no son iguales";
    

}


