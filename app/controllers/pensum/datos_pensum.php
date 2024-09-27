<?php
// Inicializar array de cursos como vacío
$cursos = [];

$sql_pensum = "SELECT * FROM pensum 
                AS pens 
                JOIN pensum_cursos AS pc 
                ON pens.id_pensum = pc.id_pensum
                JOIN cursos AS curs 
                ON pc.id_curso = curs.id_curso
                WHERE pens.id_pensum = :id_pensum";

$query_pensum = $pdo->prepare($sql_pensum);
$query_pensum->bindParam(':id_pensum', $id_pensum, PDO::PARAM_INT);
$query_pensum->execute();

// Verificar si se recuperaron resultados
$pensum = $query_pensum->fetchAll(PDO::FETCH_ASSOC);

if ($pensum) {
    foreach ($pensum as $pensu) {
        $descripcion = $pensu['descripcion'];
        $fyh_creacion = $pensu['fyh_creacion'];
        $estado = $pensu['estado'];
        // Almacenar los nombres de los cursos en el array
        $cursos[] = $pensu['nombre_curso'];
    }
}
