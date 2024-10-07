<?php
    $sql_grados = "SELECT * FROM grados AS gra 
    INNER JOIN gestiones AS ges ON gra.gestion_id = ges.id_gestion WHERE gra.estado = '1'";
    $query_grados = $pdo->prepare($sql_grados);
    $query_grados->execute();
    $grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);
