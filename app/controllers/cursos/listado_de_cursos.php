<?php
    $sql_cursos = "SELECT * FROM cursos ";
    $query_cursos = $pdo->prepare($sql_cursos);
    $query_cursos->execute();
    $cursos = $query_cursos->fetchAll(PDO::FETCH_ASSOC);
