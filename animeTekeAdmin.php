<?php
//  TorrentTrader v2.x
//      $LastChangedDate: 2011-11-11 16:19:27 +0000 (Fri, 11 Nov 2011) $
//      $LastChangedBy: dj-howarth1 $
//
//      http://www.torrenttrader.org
//
//
require_once("backend/functions.php");
//include 'conexion.php';
dbconn();

// Descomentar Seguridad

        // check access and rights
        loggedinonly();
        
        if($CURUSER["can_upload"]=="no")
          show_error_msg("Error","You do not have permission to upload",1);
        if ($site_config["UPLOADERSONLY"] && $CURUSER["class"] < 4)
          show_error_msg("Error", "Only uploaders can upload.",1);

////////////////////////////////////////////




stdhead(T_("INDICE_ANIME"));

begin_frame(T_("INDICE_ANIME"));	
?>
<table style="width:100%">
    <caption>
        <table>
            <tr>
                <td><h1>Mantenedores</h1> </td>
                <td><a href="animeTeke.php">Volver</a></td>
            </tr>
        </table>
    </caption>
    <tr><td><h3><a href="/Mantenedores/Anime/animes.php">Anime</a></h3></tr></td>
    <tr><td><!--<A HREF="/Mantenedores/anime-dd_batch/animes.php"/>-->Anime-dd_batch</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/anime_torrent_batch/animes.php"/>-->anime_torrent_batch</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/director/animes.php"/>-->director</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><h3><A HREF="/Mantenedores/episodio_dd/capitulo_dd.php"/>Episodio-dd</h3></td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><h3><A HREF="/Mantenedores/Capitulos/capitulos.php">Episodios</A></h3></td><td></tr></td>
    <tr><td><!--<A HREF="/Mantenedores/episodio_torrent/animes.php"/>-->episodio_torrent</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/estudios/animes.php"/>-->estudios</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/generos/animes.php"/>-->generos</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/imagenes/animes.php"/>-->imagenes</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/servidores_dd/"/>-->servidores_dd</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/temporadas/"/>-->temporadas</td><td> EN_CONSTRUCCION</tr></td>
    <tr><td><!--<A HREF="/Mantenedores/torrents/"/>-->torrents</td><td> EN_CONSTRUCCION</tr></td> 

</table>

<?php
end_frame();
stdfoot();
?>