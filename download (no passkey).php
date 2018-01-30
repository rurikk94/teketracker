<?
//
//  TorrentTrader v2.x
//      This file was last updated: 29/Aug/2007
//      
//      http://www.torrenttrader.org
//
//

ob_start();
require_once("backend/functions.php");
dbconn();

//check permissions
if ($site_config["MEMBERSONLY"]){
        loggedinonly();
        
        if($CURUSER["can_download"]=="no")
                show_error_msg("Error","You do not have permission to download torrents",1);
}

$id = (int)$_GET["id"];

if (!$id)
        show_error_msg("ID not found", "You can't download, if you don't tell me what you want!",1);

$res = mysql_query("SELECT filename, external, announce FROM torrents WHERE id =".intval($id));
$row = mysql_fetch_array($res);
$trackerurl = $row['announce'];

$torrent_dir = $site_config["torrent_dir"];

$fn = "$torrent_dir/$id.torrent";

if (!$row)
        show_error_msg("File not found", "No file has been found with that ID!",1);
if (!is_file($fn))
        show_error_msg("File not found", "The ID has been found on the Database, but the torrent has gone!<BR><BR>Check Server Paths and CHMODs Are Correct!",1);
if (!is_readable($fn))
        show_error_msg("File not found", "The ID and torrent were found, but the torrent is NOT readable!",1);

$name = $row['filename'];
$friendlyurl = str_replace("http://","",$site_config[SITEURL]);
$friendlyname = str_replace(".torrent","",$name);
$friendlyext = ".torrent";
$name = $friendlyname ."[". $friendlyurl ."]". $friendlyext;

mysql_query("UPDATE torrents SET hits = hits + 1 WHERE id = $id");

        header('Content-Disposition: attachment; filename="'.$name.'"');

        header("Content-Type: application/x-bittorrent");

        readfile($fn);

mysql_close();
?>