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

		$idcap = $_GET["idcap"];
		$link_Google="";
		$query = "SELECT `ID`, `ID_EPISODIO`, `LINK`,`SERVIDOR`,`RESOLUCION`,`FORMATO`,`ORIGEN`,`NOMBRE_ARCHIVO`,`PESO` FROM `episodio_dd` WHERE  ID_EPISODIO=$idcap  ORDER BY FORMATO ASC";
		$result = $mysqli->query($query);
		//echo $query."<br />";
		echo(" <table>");
		while($row = $result->fetch_array())
		{
		$rows[] = $row;
		}
        if (count($rows)>0)
        {
            foreach($rows as $row)
            {
              printf ("
                    <tr>
                        <td>
                           <a href='{$row['LINK']}' target='_blank'> {$row['NOMBRE_ARCHIVO']} </a>
                        </td>
                        <td>
                          <a href='{$row['LINK']}' target='_blank'>  {$row['PESO']} </a>
                        </td>
                        <td>
                           <a href='{$row['LINK']}' target='_blank'> {$row['RESOLUCION']}p </a>
                        </td>
                        <td>
                            <a href='{$row['LINK']}' target='_blank'> {$row['SERVIDOR']} </a>
                        </td>
                        <td>
                          <a href='{$row['LINK']}' target='_blank'> {$row['FORMATO']} </a>
                        </td>
                        <td>
                          <a href='{$row['LINK']}' target='_blank'>  {$row['ORIGEN']} </a>
                        </td>
                    
                    ");
                if ($row['FORMATO']=="MP4" and $row[3]=="Google Drive" ){
                    $link_Google=str_replace("https://drive.google.com/open?id=", "", $row[2] );
                    
                };
                printf("
                   </a> 
                </tr>");
            };
        }else{printf ("<tr><h1>No hay Links para el Capitulo</h1></tr>");};
		printf("</table>");
		if ($link_Google!=""){
			printf("
			<iframe src='https://drive.google.com/file/d/".$link_Google."/preview' width='720' height='400' allowfullscreen='true'></iframe>
			");
		};
		/* free result set */
		$result->close();

		/* close connection */
		$mysqli->close();

    //FIN CODIGO
	//////////////////////////////////
end_frame();
stdfoot();
?>