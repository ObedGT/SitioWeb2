<?php
if (!defined('NOMBRE_SITIO')) {
    include_once(__DIR__ . '/../../config/config.php');
}

$host = "localhost"; //Indico la ip del servidor
$port = 3307;
$user = "root";
$pass = "admin";
$database = "pruebas_web";

$conn = new mysqli($host, $user, $pass, $database, $port);

if ($conn->connect_error) {
    die("Conexión fallida " . $conn->connect_error);
}
//echo "Conexión Exitosa de la BD";
