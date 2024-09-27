<?php
    $sql_grados = "SELECT * FROM grados WHERE estado = '1'";
    $query_grados = $pdo->prepare($sql_grados);
    $query_grados->execute();
    $grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);
