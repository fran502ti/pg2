<?php
include ('../../../app/config.php');


$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_ppff = $_POST['id_ppff'];

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cui = $_POST['cui'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$grado_id = $_POST['grado_id'];
$nombres_apellidos_ppff = $_POST['nombres_apellidos_ppff'];
$cui_ppff = $_POST['cui_ppff'];
$celular_ppff = $_POST['celular_ppff'];
$ocupacion_ppff = $_POST['ocupacion_ppff'];
$ref_nombre = $_POST['ref_nombre'];
$ref_parentesco = $_POST['ref_parentesco'];
$ref_celular = $_POST['ref_celular'];
$profesion = "ESTUDIANTE";

$pdo->beginTransaction();

///////////////////////// ACTUALIZAR A LA TABLA USUARIOS
$password = password_hash($cui, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('UPDATE usuarios
        SET rol_id=:rol_id, 
            email=:email, 
            password=:password, 
            fyh_actualizacion=:fyh_actualizacion
WHERE id_usuario=:id_usuario');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->execute();

//////////////////////// ACTUALIZAR A LA TABLA PERSONAS
$sentencia = $pdo->prepare('UPDATE personas
        SET nombres=:nombres,
            apellidos=:apellidos,
            cui=:cui,
            fecha_nacimiento=:fecha_nacimiento,
            celular=:celular,
            profesion=:profesion,
            direccion=:direccion, 
            fyh_actualizacion=:fyh_actualizacion
WHERE id_persona=:id_persona');

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':cui',$cui);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_persona',$id_persona);
$sentencia->execute();


/////////////////////// ACTUALIZAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('UPDATE estudiantes
         SET grado_id=:grado_id, 
             fyh_actualizacion=:fyh_actualizacion
        WHERE id_estudiante=:id_estudiante');

$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_estudiante',$id_estudiante);
$sentencia->execute();


/////////////////////// ACTUALIZAR A LA TABLA PADRES DE FAMILIA
$sentencia = $pdo->prepare('UPDATE ppffs
         SET nombres_apellidos_ppff=:nombres_apellidos_ppff, 
         cui_ppff=:cui_ppff, 
         celular_ppff=:celular_ppff,
         ocupacion_ppff=:ocupacion_ppff,
         ref_nombre=:ref_nombre,
         ref_parentesco=:ref_parentesco,
         ref_celular=:ref_celular,
         fyh_actualizacion=:fyh_actualizacion
        WHERE id_ppff=:id_ppff');

$sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
$sentencia->bindParam(':cui_ppff',$cui_ppff);
$sentencia->bindParam(':celular_ppff',$celular_ppff);
$sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
$sentencia->bindParam(':ref_nombre',$ref_nombre);
$sentencia->bindParam(':ref_parentesco',$ref_parentesco);
$sentencia->bindParam(':ref_celular',$ref_celular);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_ppff',$id_ppff);


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizaron los datos del estudiante correctamente en la BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/estudiantes");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudieron actualizar los datos en BD, intente de nuevos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
