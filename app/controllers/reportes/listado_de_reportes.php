<?php
$sql_reportes = "SELECT * FROM reportes as rep 
INNER JOIN docentes as doc ON doc.id_docente = rep.docente_id
INNER JOIN personas as per ON per.id_persona = doc.persona_id 
INNER JOIN usuarios as usu ON usu.id_usuario = per.usuario_id
INNER JOIN materias as mat ON mat.id_materia = rep.materia_id
INNER JOIN estudiantes as est ON est.id_estudiante = rep.estudiante_id
";
$query_reportes = $pdo->prepare($sql_reportes);
$query_reportes->execute();
$reportes = $query_reportes->fetchAll(PDO::FETCH_ASSOC);