<?php
/*Conectamos a Base de datos y definimos variables globales*/
define ('SERVIDOR', 'localhost');
define ('USUARIO', 'root');
define ('PASSWORD', '');
define ('BD', 'sisgestionescolar');


define ('APP_NAME', 'SISTEMA DE GESTION ESCOLAR');
define ('APP_URL', 'http://localhost/sisgestionescolar');
define ('KEY_API_MAPS', ''); /*api de google maps*/

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{

        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        //echo "Conexion exitosa a BD";
} catch (PDOException $e) {
    print_r($e);
    echo "Error de conexion a la BD";
}

/*HORA Y FECHA*/

date_default_timezone_set("America/Guatemala");
$fechaHora = date('Y-m-d, H:i:s');

/*FECHA ACTUAL*/

$fecha_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');

$estado_de_registro = '1';