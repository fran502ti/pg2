<?php

include ('../../../app/config.php');

$id_docente = $_GET['id_docente'];
$id_estudiante = $_GET['id_estudiante'];
$id_materia = $_GET['id_materia'];
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3 = $_GET['nota3'];
$nota4 = $_GET['nota4'];

//echo "id_docente: ".$id_docente."id_estudiante: ".$id_estudiante."id_materia: ".$id_materia."nota1: ".$nota1."nota2: ".$nota2."nota3: ".$nota3."nota4: ".$nota4;

///////////////////////NOTA 1


$sql = "SELECT * FROM calificaciones WHERE docente_id='$id_docente' and estudiante_id='$id_estudiante' and materia_id='$id_materia'  ";
$query = $pdo->prepare($sql);
$query->execute();
$notas = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($notas as $nota){
    $id_calificaciones = $nota['id_calificaciones'];
}

// se calcula el promedio previo a actualizar o insertar los datos

$promedio = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

if($notas){
    echo"existe registro";

$sentencia = $pdo->prepare('UPDATE calificaciones
         SET nota1=:nota1,
            nota2=:nota2,
            nota3=:nota3,
            nota4=:nota4,
            promedio=:promedio,  
            fyh_actualizacion=:fyh_actualizacion
WHERE id_calificaciones=:id_calificaciones');

$sentencia->bindParam(':nota1',$nota1);
$sentencia->bindParam(':nota2',$nota2);
$sentencia->bindParam(':nota3',$nota3);
$sentencia->bindParam(':nota4',$nota4);
$sentencia->bindParam(':promedio',$promedio);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_calificaciones',$id_calificaciones);
$sentencia->execute();

} else {
    echo"no existe registro";

$sentencia = $pdo->prepare('INSERT INTO calificaciones
         (docente_id, estudiante_id, materia_id, nota1, nota2, nota3, nota4, promedio, fyh_creacion, estado)
VALUES ( :docente_id,:estudiante_id, :materia_id,:nota1,:nota2,:nota3,:nota4, :promedio, :fyh_creacion,:estado)');

$sentencia->bindParam(':docente_id',$id_docente);
$sentencia->bindParam(':estudiante_id',$id_estudiante);
$sentencia->bindParam(':materia_id',$id_materia);
$sentencia->bindParam(':nota1',$nota1);
$sentencia->bindParam(':nota2',$nota2);
$sentencia->bindParam(':nota3',$nota3);
$sentencia->bindParam(':nota4',$nota4);
$sentencia->bindParam(':promedio',$promedio);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);
$sentencia->execute();

}

///////////////////////NOTA 1
///////////////////////NOTA 1
///////////////////////NOTA 1

