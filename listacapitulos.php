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
dbconn(false);


//check permissions
if ($site_config["MEMBERSONLY"]){
	loggedinonly();

	if($CURUSER["view_torrents"]=="no")
		show_error_msg(T_("ERROR"), T_("NO_TORRENT_VIEW"), 1);
}

stdhead(T_("INDICE_ANIME"));

begin_frame(T_("INDICE_ANIME"));
//////////////////////////////////////////
//CODIGO
////////////////////////

        mysql_query("SET NAMES 'utf8'");
        
		$id = $_GET["id"];
		$nombre = $_GET["nombre"];
		printf("<table>
        <caption>".$nombre."</caption>
        <tr>
            <th>Num Episode</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>ID</th>
        </tr>");

		$query = "SELECT NUM_TEMPORADA, NUM_EPISODIO, TITULO,FECHA,ID FROM episodios WHERE ID_ANIME='".$id."';";
        //echo $query."<br />";
		$result = $mysqli->query($query);

		while($row = $result->fetch_array())
		{
		$rows[] = $row;
		}
		foreach($rows as $row)
		{
		
        echo ("
			<tr>
					<td>
						S{$row['NUM_TEMPORADA']}E{$row['NUM_EPISODIO']}
					</td>
					<td>
						<a href='linkscapitulo?idcap={$row['ID']}'> {$row['TITULO']} </a>
					</td>
					<td>
						{$row['FECHA']}
					</td>
                    <td>
						{$row['ID']}
					</td>
				
			</tr>");
		}
		printf("</table>");



		/* free result set */
		$result->close();

		/* close connection */
		$mysqli->close();

    //FIN CODIGO
	//////////////////////////////////
end_frame();
stdfoot();
?>