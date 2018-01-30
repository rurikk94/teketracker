<html> 
	<head>
		<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../style.css'>
	</head>
	<body>

	<?php
	include('../config.php'); 
	$id = (int) $_GET['id']; 
	mysql_query("UPDATE u813978319_anime.anime SET ELIMINADO=1 WHERE `id` = '$id' ") ; 
	echo (mysql_affected_rows()) ? "Anime Eliminado.<br /> " : "Nada se elimino.<br /> "; 
	?> 

<a href='animes.php'>Back To Listing</a>



	</body> 
</html>