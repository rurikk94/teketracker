<?php // connect to db

error_reporting(0);
$link = mysql_connect("mysql.hostinger.es", "u813978319_root", "09Abril1994");
if (!$link) {
    die('No se pudo conectar : ' . mysql_error());
}

//if (! mysql_select_db('u813978319_anime') ) {
//    die ('No se puede usar la BD anime : ' . mysql_error());
//}

?>