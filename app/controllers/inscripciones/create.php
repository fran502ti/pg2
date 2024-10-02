<?php
include ('../../../app/config.php');

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

///////////////////////// INSERTAR A LA TABLA USUARIOS
$password = password_hash($cui, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('INSERT INTO usuarios
         (rol_id, email, password, fyh_creacion, estado)
VALUES ( :rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

$id_usuario = $pdo->lastInsertId();


//////////////////////// INSERTAR A LA TABLA PERSONAS
$sentencia = $pdo->prepare('INSERT INTO personas
         (usuario_id,nombres,apellidos,cui,fecha_nacimiento,celular,profesion,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:cui,:fecha_nacimiento,:celular,:profesion,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':cui',$cui);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

/////////////////////// INSERTAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('INSERT INTO estudiantes
         (persona_id, grado_id, fyh_creacion, estado)
VALUES ( :persona_id,:grado_id,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id',$id_persona);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

$id_estudiante = $pdo->lastInsertId();

/////////////////////// INSERTAR A LA TABLA PADRES DE FAMILIA
$sentencia = $pdo->prepare('INSERT INTO ppffs
         (estudiante_id, nombres_apellidos_ppff, cui_ppff, celular_ppff,ocupacion_ppff,ref_nombre,ref_parentesco,ref_celular,fyh_creacion, estado)
VALUES (:estudiante_id,:nombres_apellidos_ppff,:cui_ppff,:celular_ppff,:ocupacion_ppff,:ref_nombre,:ref_parentesco,:ref_celular,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id',$id_estudiante);
$sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
$sentencia->bindParam(':cui_ppff',$cui_ppff);
$sentencia->bindParam(':celular_ppff',$celular_ppff);
$sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
$sentencia->bindParam(':ref_nombre',$ref_nombre);
$sentencia->bindParam(':ref_parentesco',$ref_parentesco);
$sentencia->bindParam(':ref_celular',$ref_celular);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);


if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registro al estudiante correctamente en la BD";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/estudiantes");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en BD, intente de nuevos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
