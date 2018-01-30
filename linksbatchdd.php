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

		$id = $_GET["id"];
		$link_Google="";
		$query = "SELECT `ID`, `ID_ANIME`, `SERVER`,`LINK`,`FORMATO`,`PESO`,`RESOLUCION`,`FORMATO`,`ORIGEN`  FROM `anime-dd_batch` WHERE  ID_ANIME=$id  ORDER BY FORMATO ASC";
		$result = $mysqli->query($query);
		
		echo("<center>
        <table> 
        ");

		while($row = $result->fetch_array())
		{
		$rows[] = $row;
		}
        if (count($rows)>0)
        {
            echo(" <tr> <td COLSPAN='5' align='center'>
                Descarga Directa
            </td></tr>");
            foreach($rows as $row)
            {
                printf ("
                    <tr>
                            <td>
                                %s
                            </td>
                            <td>
                                %s
                            </td>
                            <td>
                                %dp
                            </td>
                            <td>
                                %s
                            </td>
                            <td>
                                <a href='%s' target='_blank'> %s </a>
                            </td>
                    </tr>"
                    , $row["SERVER"], $row["ORIGEN"], $row["RESOLUCION"], $row["FORMATO"],$row["LINK"],$row["LINK"]);
            };
        }else{echo"
        <tr><td  COLSPAN='5' align='center'>
         No hay links en Descarga Directa
        </td></tr>";};
		//printf("</table>");
		///////////////////////////TORRENT
		$query = "Select 
					AT.ID_ANIME
					,A.NOMBRE
					,AT.ID_TORRENT 
					,T.name Torrent
					,AT.FORMATO
					,AT.RESOLUCION
					,AT.ORIGEN

				from anime.anime_torrent_batch AT

				 INNER JOIN anime.anime A 		
					  ON A.id=AT.id_anime
				 INNER JOIN tracker.torrents T 
						  ON AT.ID_TORRENT=T.id

				 WHERE ID_ANIME = $id
				 ORDER BY FORMATO ASC;";
		//echo ($query);
		$result = $mysqli->query($query);
		
		//echo("<br>
		//<table>");
		while($row2 = $result->fetch_array())
		{
		$rows2[] = $row;
		}
		if (count($rows2)>0)
        {echo(" <tr> <td  COLSPAN='5' align='center'>
                Torrents
            </td></tr>");
            foreach($rows2 as $row2)
            {
            printf ("
                <tr>    
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            TORRENT
                        </td>					
                        <td>
                            <a href='http://5.79.78.37/torrents-details.php?id=%d' target='_blank'> %s </a>
                        </td>
                </tr>"
                ,$row2["ID_TORRENT"],$row2["Torrent"]);
            };
        }else{echo" <tr><td  COLSPAN='5' align='center'>No hay links en Torrent</td></tr>";};

		printf("</table>
        </center>");
		
		/* free result set */
		$result->close();

		/* close connection */
		$mysqli->close();

    //FIN CODIGO
	//////////////////////////////////
end_frame();
stdfoot();
?>