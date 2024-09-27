<?php
    $sql_grados = "SELECT * FROM grados WHERE id_grado = '$id_grado'";
    $query_grados = $pdo->prepare($sql_grados);
    $query_grados->execute();
    $grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);


    foreach ($grados as $grado){
        $id_grado = $grado['id_grado'];
        $curso = $grado['curso'];
        $seccion = $grado['seccion'];
        $fyh_creacion = $grado['fyh_creacion'];
        $estado = $grado['estado'];
    }