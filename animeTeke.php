<!--
v.Actual
Rurikk 
Cualquier error o sugerencia envie un email a
rurikk@tekeremata.org
-->
<?php
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
	//Codigo
	///////////////////////////////////
	if (isset($_GET['ano'])) {
        if (isset($_GET['temporada'])) {
            $query = ""
             ."SELECT a.id ,a.nombre ,a.ano ,a.cant_capitulos ,a.url_foto , t.nombre 'temporada' , a.estado, a.id_mal, a.id_imbd, a.id_tvbd  "
             ."FROM anime a, temporadas t  "
             ."WHERE ((a.id_temporada = t.id) and (a.eliminado='0') and (ano=".$_GET['ano'].") and (id_temporada=(select id from temporadas where nombre='".$_GET['temporada']."'))) "
             ."ORDER BY nombre ";
        }else{
        $query = ""
		 ."SELECT a.id ,a.nombre ,a.ano ,a.cant_capitulos ,a.url_foto , t.nombre 'temporada' , a.estado, a.id_mal, a.id_imbd, a.id_tvbd  "
		 ."FROM anime a, temporadas t  "
		 ."WHERE ((a.id_temporada = t.id) and (a.eliminado='0') and (ano=".$_GET['ano'].")) "
		 ."ORDER BY nombre ";}
    }else{
        if(isset($_GET['estado'])){
            $query = ""
		 ."SELECT a.id ,a.nombre ,a.ano ,a.cant_capitulos ,a.url_foto , t.nombre 'temporada' , a.estado, a.id_mal, a.id_imbd, a.id_tvbd  "
		 ."FROM anime a, temporadas t  "
		 ."WHERE ((a.id_temporada = t.id) and (a.eliminado='0') and (estado='".$_GET['estado']."') ) "
		 ."ORDER BY nombre ";
        }else{
            $query = ""
		 ."SELECT a.id ,a.nombre ,a.ano ,a.cant_capitulos ,a.url_foto , t.nombre 'temporada' , a.estado, a.id_mal, a.id_imbd, a.id_tvbd  "
		 ."FROM anime a, temporadas t  "
		 ."WHERE ((a.id_temporada = t.id) and (a.eliminado='0')) "
		 ."ORDER BY nombre ";
        }
        
    }

    //Debug
    //print($query. " <br>");
		
		$result = $mysqli->query("SET NAMES 'utf8'");
		$result = $mysqli->query($query);

		while($row = $result->fetch_array())
		{
		$rows[] = $row;
		}
		printf ("
		<table>
			<tr>
				<th></th>
				<th>Nombre</th>
				<th>Temporada - A&#241;o</th>
				<th>Cap&#237;tulos</th>
				<th>Estado</th>
				<th NOWRAP> <a href='animeTekeAdmin.php'>Admin</a></th>
			</tr>");
		foreach($rows as $row)
		{
			$url_foto=$row["url_foto"];
			if (strpos($url_foto, "http") === false) {
				//echo "La cadena 'http' fue encontrada en la url";
				$url_foto="http://i.imgur.com/".$url_foto."t.jpg";
			};
            $link="detalleanime.php?id=".$row["id"]."&nombre=".$row["nombre"];
            $linkTempAno="animeTeke.php?ano=".$row["ano"]."&temporada=".$row["temporada"];
            $linkAno="animeTeke.php?ano=".$row["ano"];
            $linkEstado="animeTeke.php?estado=".$row["estado"];
            //echo $linkTempAno." - ".$linkAno."<br />";
			printf ("
				<tr>
					<td><a href='".$link."' target='_blank' ><IMG SRC=".$url_foto." WIDTH=75 HEIGHT=120></a></td>
					<td><a href='".$link."' target='_blank' >%s</a></td>
					<td><a href='".$linkTempAno."'> %s </a> - 
                        <a href=".$linkAno."> %s </a></td>
					<td>%d</td> 
					<td><a href='".$linkEstado."'> %s </a></td>
					<td NOWRAP><a href='https://myanimelist.net/anime/%d/' target='_blank' ><IMG SRC=https://myanimelist.cdn-dena.com/images/faviconv5.ico WIDTH=30 HEIGHT=30></a>
						<a href='https://www.imdb.com/title/tt%d/' target='_blank'><IMG SRC=http://image.prntscr.com/image/9492e6a6bbd54450b75e1b25b1951610.png WIDTH=30 HEIGHT=30></a>
						<a href='http://thetvdb.com/?tab=series&id=%d/' target='_blank'><IMG SRC=http://i.imgur.com/HYDK7tf.png WIDTH=30 HEIGHT=30></a>
						<a href='http://tekeremata.org/?s=%s' target='_blank'><IMG SRC=http://tekeremata.org/wp-content/uploads/2016/03/Logo-Teke-Very-Small.png WIDTH=30 HEIGHT=30></a>
						
					</td>
					
               
				</tr>", $row["nombre"], $row["temporada"], $row["ano"], $row["cant_capitulos"], $row["estado"], $row["id_mal"], $row["id_imbd"], $row["id_tvbd"], $row["nombre"]);
            
			}
		printf("</table>");
		
		

		/* free result set */
		$result->close();

		/* close connection */
		$mysqli->close();
	
	//////////////////////////////////
end_frame();
stdfoot();
?>