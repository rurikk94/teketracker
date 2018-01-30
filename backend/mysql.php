<?php
//MYSQL CONNECTION INFO, DONT PASS IT OUT!

//Access Security check
if (preg_match('/mysql.php/i',$_SERVER['PHP_SELF'])) {
	die;
}


// $mysql_host = "localhost";  //leave this as localhost if you are unsure
// $mysql_user = "root";  //Username to connect
// $mysql_pass = ""; //Password to connect
// $mysql_db = "tracker";  //Database name
?>
