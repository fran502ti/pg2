<?php
    $sql_niveles = "SELECT * FROM niveles AS niv INNER JOIN gestiones AS ges 
                    ON niv.gestion_id = ges.id_gestion WHERE  niv.estado = '1' AND  niv.id_niveles = '$id_niveles'";
    $query_niveles = $pdo->prepare($sql_niveles);
    $query_niveles->execute();
    $niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);


    foreach ($niveles as $nivele){
        $gestion_id = $nivele['gestion_id'];
        $gestion = $nivele['gestion'];
        $nivel = $nivele['nivel'];
        $fyh_creacion = $nivele['fyh_creacion'];
        $estado = $nivele['estado'];
    }