<?php
    $sql_grados = "SELECT * FROM grados AS gra INNER JOIN gestiones AS ges
    ON gra.gestion_id = ges.id_gestion WHERE gra.estado = '1' AND gra.id_grado = '$id_grado'";
    $query_grados = $pdo->prepare($sql_grados);
    $query_grados->execute();
    $grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);


    foreach ($grados as $grado){
        $id_grado = $grado['id_grado'];
        $curso = $grado['curso'];
        $seccion = $grado['seccion'];
        $gestion_id = $grado['gestion_id'];
        $gestion = $grado['gestion'];
        $fyh_creacion = $grado['fyh_creacion'];
        $estado = $grado['estado'];
    }