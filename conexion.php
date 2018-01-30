<?php
error_reporting(0);
$mysqli = new mysqli("mysql.hostinger.es", "u813978319_root", "09Abril1994", "u813978319_anime");

/* comprobar la conexion */
if ($mysqli->connect_errno) {
    printf("Fallo la conexion: %s\n", $mysqli->connect_error);
    exit();
}
?>

