<html> 
<head>
	<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../style.css'>
    
    <!--[if !IE]><!-->
	<style>

	/*
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

		tr { border: 1px solid #ccc; }

		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: ""; }
		td:nth-of-type(2):before { content: ""; }
		td:nth-of-type(3):before { content: "ID"; }
		td:nth-of-type(4):before { content: "NOMBRE"; }
		td:nth-of-type(5):before { content: "ANO"; }
		td:nth-of-type(6):before { content: "CAPITULOS"; }
		td:nth-of-type(7):before { content: "ESTADO"; }
		td:nth-of-type(8):before { content: "ELIMINADO"; }
		/*td:nth-of-type(9):before { content: "GPA"; }
		td:nth-of-type(10):before { content: "Arbitrary Data"; }*/
	}

	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body {
			padding: 0;
			margin: 0;
			width: 320px; }
		}

	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body {
			width: 495px;
		}
	}

	</style>
	<!--<![endif]-->
    
</head>
<body>

<?php 
    
    include('../config.php');


    if (! mysql_select_db('u813978319_anime') ) {
        die ('No se puede usar la BD anime : ' . mysql_error());
    }
    $result = mysql_query("SELECT * FROM `anime` order by nombre") or trigger_error(mysql_error()); 
    
?>
<table>
        <td><a href=animeAdd.php>Agregar Nuevo Anime</a></td>
        <td><a href=../../animeTekeAdmin.php>Volver</a></td>
</table>
    
<table>
<caption>
    
</caption>
	<tr>
		<th colspan='2'></th>
		<th>ID</th>
		<th>NOMBRE</th>
<!--	<th>DESCRIPCION</th>; -->
<!--	<th>ID DIRECTOR</th>; -->
<!--	<th>URL FOTO</th>; -->
<!--	<th>URL BANNER</th>; -->
		<th>ANO</th>
<!--	<th>ID TEMPORADA</th>; -->
		<th>CAPITULOS</th>
		<th>ESTADO</th>
<!--	<th>ID NEXT</th>; -->
<!--	<th>ID PREVIOUS ANIME</th>; -->
<!--	<th>ID ESTUDIO</th>; -->
<!--	<th>ID TVBD</th>; -->
<!--	<th>ID MAL</th>; -->
<!--	<th>ID IMBD</th>; -->
		<th>ELIMINADO</th>
	</tr>
<?php 

while($row = mysql_fetch_array($result)){ 

	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 

	echo "<tr>";    
            echo "<td valign='top'><a href=animeUpdate.php?id={$row['ID']}>Editar</a></td>";
            echo "<td><a href=animeDelete.php?id={$row['ID']}>Eliminar</a></td> "; 
            echo "<td valign='top'>" . nl2br( $row['ID']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['NOMBRE']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['DESCRIPCION']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_DIRECTOR']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['URL_FOTO']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['URL_BANNER']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['ANO']) . "</td>";  
            //echo "<td valign='top'>" . nl2br( $row['ID_TEMPORADA']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['CANT_CAPITULOS']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['ESTADO']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_NEXT']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_PREVIOUS_ANIME']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_ESTUDIO']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_TVBD']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_MAL']) . "</td>";  
    //		echo "<td valign='top'>" . nl2br( $row['ID_IMBD']) . "</td>";
        $eliminado='No';
        if ($row['ELIMINADO']==1)$eliminado='Si';
            echo "<td valign='top'>" . nl2br( $eliminado) . "</td>";
    echo "</tr>"; 
}
?>
    </table>
    
    <style type="text/css" style="display: none !important;">
	* {
		margin: 0;
		padding: 0;
	}
	body {
		overflow-x: hidden;
	}
	#demo-top-bar {
		text-align: left;
		background: #222;
		position: relative;
		zoom: 1;
		width: 100% !important;
		z-index: 6000;
		padding: 20px 0 20px;
	}
	#demo-bar-inside {
		width: 960px;
		margin: 0 auto;
		position: relative;
		overflow: hidden;
	}
	#demo-bar-buttons {
		padding-top: 10px;
		float: right;
	}
	#demo-bar-buttons a {
		font-size: 12px;
		margin-left: 20px;
		color: white;
		margin: 2px 0;
		text-decoration: none;
		font: 14px "Lucida Grande", Sans-Serif !important;
	}
	#demo-bar-buttons a:hover,
	#demo-bar-buttons a:focus {
		text-decoration: underline;
	}
	#demo-bar-badge {
		display: inline-block;
		width: 302px;
		padding: 0 !important;
		margin: 0 !important;
		background-color: transparent !important;
	}
	#demo-bar-badge a {
		display: block;
		width: 100%;
		height: 38px;
		border-radius: 0;
		bottom: auto;
		margin: 0;
		background: url(/images/examples-logo.png) no-repeat;
		background-size: 100%;
		overflow: hidden;
		text-indent: -9999px;
	}
	#demo-bar-badge:before, #demo-bar-badge:after {
		display: none !important;
	}
</style>
    
</body> 
</html>