<?php
/*
+ ----------------------------------------------------------------------------+
|     ©Nikkbu 2013
|     Site: http://www.wolf-designs.com
|     eMail: nikkbu@nikkbu.info
|     Theme: NB-Deepblue -- v2.0.0
|     TT Version: v2.08
|     Date: 23/05/2013
|     Author: Nikkbu (N.Burgin)
+----------------------------------------------------------------------------+
*/
?>
<html lang='en'>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $site_config["CHARSET"]; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta name="author" content="Nikkbu, TorrentTrader" />
<meta name="generator" content="TorrentTrader <?php echo $site_config['ttversion']; ?>" />
<meta name="description" content="TorrentTrader is a feature packed and highly customisable PHP/MySQL Based BitTorrent tracker. Featuring intergrated forums, and plenty of administration options. Please visit www.torrenttrader.org for the support forums. " />
<meta name="keywords" content="http://www.wolf-designs.com, http://www.torrenttrader.org" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS -->
<link rel="shortcut icon" href="<?php echo $site_config["SITEURL"]; ?>/themes/NB-Deepblue/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo $site_config["SITEURL"]; ?>/themes/NB-Deepblue/theme.css" />

<!-- JS -->
<script type="text/javascript" src="<?php echo $site_config["SITEURL"]; ?>/backend/java_klappe.js"></script>
<!--[if lte IE 6]>
    <script type="text/javascript" src="<?php echo $site_config["SITEURL"]; ?>/themes/NB-Deepblue/js/pngfix/supersleight-min.js"></script>
<![endif]-->
<!--[if lt IE 9]>
	<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $site_config["SITEURL"]; ?>/themes/NB-Deepblue/css/ie.css" />
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js" type="text/javascript"></script>
<script>
function mainmenu(){
$(" #nav-one ul ").css({display: "none"}); // Opera Fix
$(" #nav-one li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
	}

 $(document).ready(function(){					
	mainmenu();
});
</script>
</head>
<body>
<div id='wrapper'>
  <header> <menu>
    <div id='menu'>
      <ul id='nav-one' class='dropmenu'>
        <li><a href="index.php"><?php echo T_("HOME");?></a></li>
        <li><a href="forums.php"><?php echo T_("FORUMS");?></a></li>
        <li><a href="#">Torrents</a>
          <ul>
            <li><a href="torrents-upload.php"><?php echo T_("UPLOAD_TORRENT");?></a></li>
            <li><a href="torrents.php"><?php echo T_("BROWSE_TORRENTS");?></a></li>
            <li><a href="torrents-today.php"><?php echo T_("TODAYS_TORRENTS");?></a></li>
          </ul>
        </li>
        <li><a href="torrents-search.php"><?php echo T_("SEARCH_TORRENTS");?></a></li>
        <li><a href='faq.php'>FAQ</a></li>
      </ul>
    </div>
    </menu>
    <div class='header'>
      <div id='logo'><a href='index.php'><img src='themes/NB-Deepblue/images/blank.gif' alt='Logo' width='350' height='120'></a></div>
      <div id='infobar'>
          <?php
                if (!$CURUSER){
                    echo "[<a href=\"account-login.php\">".T_("LOGIN")."</a>]<b> ".T_("OR")." </b>[<a href=\"account-signup.php\">".T_("SIGNUP")."</a>]";
                }else{
                    print (T_("LOGGED_IN_AS").": ".$CURUSER["username"].""); 
                    echo " [<a href=\"account-logout.php\">".T_("LOGOUT")."</a>] ";
                    if ($CURUSER["control_panel"]=="yes") {
                        print("[<a href='admincp.php'>".T_("STAFFCP")."</a>] ");
                    }
            
                    //check for new pm's
                    $res = SQL_Query_exec("SELECT COUNT(*) FROM messages WHERE receiver=" . $CURUSER["id"] . " and unread='yes' AND location IN ('in','both')");
                    $arr = mysql_fetch_row($res);
                    $unreadmail = $arr[0];
                    if ($unreadmail){
                        print("[<a href='mailbox.php?inbox'><b><font color='#ff0000'>$unreadmail</font> ".P_("NEWPM", $unreadmail)."</b></a>]");  
                    }else{
                        print("[<a href='mailbox.php'>".T_("YOUR_MESSAGES")."</a>] ");
                    }
                    //end check for pm's
                }
			?>
      </div>
    </div>
  </header>
  <section class='main_wrapper'>
    <div class='main_content'>
      <?php if ($site_config["LEFTNAV"]){?>
      <aside class='tRow' id='lCol'>
      <?php leftblocks();?>
      </aside>
      <?php } ?>
      <div class='tRow' id='mCol'>
