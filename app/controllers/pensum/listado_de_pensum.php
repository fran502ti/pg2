<?php
    $sql_pensum = "SELECT * FROM pensum WHERE estado = '1'";
    $query_pensum = $pdo->prepare($sql_pensum);
    $query_pensum->execute();
    $pensum = $query_pensum->fetchAll(PDO::FETCH_ASSOC);
