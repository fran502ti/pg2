<?php
    $sql_usuarios = "SELECT * FROM usuarios AS usu INNER JOIN roles As rol ON rol.id_rol = usu.rol_id 
                    WHERE usu.estado = '1' and usu.id_usuario = '$id_usuario'";
    $query_usuarios = $pdo->prepare($sql_usuarios);
    $query_usuarios->execute();
    $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $nombres = $usuario['nombres'];
    $dpi = $usuario['dpi'];
    $nombre_rol = $usuario['nombre_rol'];
    $email = $usuario['email'];
    $telefono = $usuario['telefono'];
    $password = $usuario['password'];
    $fyh_creacion = $usuario['fyh_creacion'];
    $estado = $usuario['estado'];
}
?>