<?php
        include 'header.php';
		include 'conexion.php';
echo"<!--
v.Actual
Rurikk 
Cualquier error o sugerencia envie un email a
rurikk@tekeremata.org
-->";
//  TorrentTrader v2.x
//      $LastChangedDate: 2011-11-19 09:29:54 +0000 (Sat, 19 Nov 2011) $
//      $LastChangedBy: dj-howarth1 $
//
//      http://www.torrenttrader.org
//
//
require_once("backend/functions.php");
include 'conexion.php';
dbconn(false);


//check permissions
if ($site_config["MEMBERSONLY"]){
	loggedinonly();

	if($CURUSER["view_torrents"]=="no")
		show_error_msg(T_("ERROR"), T_("NO_TORRENT_VIEW"), 1);
}

stdhead(T_("INDICE_ANIME"));

begin_frame(T_("INDICE_ANIME"));

		$id = $_GET["id"];
		$nombre = $_GET["nombre"];


		$query = "SELECT `ID`, `NOMBRE`, `DESCRIPCION`, `ID_DIRECTOR`, `URL_FOTO`, `URL_BANNER`, `ANO`, `ID_TEMPORADA`, `CANT_CAPITULOS`, `ESTADO`, `ID_NEXT`, `ID_PREVIOUS_ANIME`, `ID_ESTUDIO`, `ID_TVBD`, `ID_MAL`, `ID_IMBD` , `OP` FROM `anime` WHERE  id=$id;";

		$result = $mysqli->query("SET NAMES 'utf8'");
		$result = $mysqli->query($query);

		printf("<table>");
		while($row = $result->fetch_array())
		{
		$rows[] = $row;
		}
		foreach($rows as $row)
		{
		
		$url_foto=$row["URL_FOTO"];
		if (strpos($url_foto, "http") === false) {
			//echo "La cadena 'http' fue encontrada en la url";
			$url_foto="http://i.imgur.com/".$url_foto."l.jpg";
		};
		printf ("
            <iframe width='0' height='0' src='https://www.youtube.com/embed/".$row["OP"]."?autoplay=1&loop=1' frameborder='0'></iframe>
			<tr>
				<td rowspan='4' ><a href='".$url_foto."'><IMG SRC=".$url_foto." WIDTH=400 HEIGHT=600></a></td>
				<td><h1 align='center'> {$row["NOMBRE"]} </h1></td>
			</tr>
			<tr>
				<td><p>%s</p></td>
			</tr>	
			<tr>
				<td><h2 align='center'><a href='listacapitulos?id=%d&nombre=%s'>Lista de Capitulos</a></h2></td>
			</tr>
			<tr>
				<td><h2 align='center'><a href='linksbatchdd?id=%d'>Lista de Batch de descarga</a></h2></td>
			</tr>"
			,$row["DESCRIPCION"],$row["ID"],$row["NOMBRE"],$row["ID"]);
		}
		printf("</table>");

		$query = "SELECT `URL_FOTO`, `TIPO` FROM `imagenes` WHERE  ID_ANIME=$id;";
				$result = $mysqli->query($query);
		//Tabla de imagenes
		printf("
			<table> 
				<tr>");
		while($row = $result->fetch_array())
		{$rows[] = $row;}
	
		foreach($rows as $row)
		{
			if ($row["TIPO"]=='1')
			printf ("
					<td><IMG SRC=%s WIDTH=400 HEIGHT=600></td>
				"
				, $row["URL_FOTO"]);
		}
		echo("</tr>");
		printf("</tr>
		</table>");
		
		echo("<table><tr>");
			foreach($rows as $row)
			{
				if ($row["TIPO"]=='0')
				printf ("
						<tr><IMG SRC=%s WIDTH=750 HEIGHT=150></tr>
					"
					, $row["URL_FOTO"]);
			}
		echo("</tr></table>");
		
		
		
		
		/* free result set */
		$result->close();

		/* close connection */
		$mysqli->close();

	
	//////////////////////////////////
end_frame();
stdfoot();
?>