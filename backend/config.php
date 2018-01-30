<?php
$site_config = array();
$site_config['ttversion'] = '2.08';							//DONT CHANGE THIS!

// Main Site Settings
$site_config['SITENAME'] = 'Tekeremata!';					//Site Name
$site_config['SITEEMAIL'] = 'tracker@tekeremata.org';		//Emails will be sent from this address
$site_config['SITEURL'] = 'http://rurikk.esy.es/';	//Main Site URL
$site_config['default_language'] = "1";						//DEFAULT LANGUAGE ID
$site_config['default_theme'] = "1";						//DEFAULT THEME ID
$site_config['CHARSET'] = "utf-8";						//Site Charset
$site_config['announce_list'] = "http://tracker.tekeremata.org/announce.php"; //seperate via comma
$site_config['MEMBERSONLY'] = false;							//MAKE MEMBERS SIGNUP
$site_config['MEMBERSONLY_WAIT'] = true;					//ENABLE WAIT TIMES FOR BAD RATIO
$site_config['ALLOWEXTERNAL'] = false;		//Enable Uploading of external tracked torrents
$site_config['UPLOADERSONLY'] = true;		//Limit uploading to uploader group only
$site_config['INVITEONLY'] = yes;			//Only allow signups via invite
$site_config['ENABLEINVITES'] = true;		// Enable invites regardless of INVITEONLY setting
$site_config['CONFIRMEMAIL'] = false;		//Enable / Disable Signup confirmation email
$site_config['ACONFIRM'] = false;			//Enable / Disable ADMIN CONFIRM ACCOUNT SIGNUP
$site_config['ANONYMOUSUPLOAD'] = false;		//Enable / Disable anonymous uploads
$site_config['PASSKEYURL'] =  "$site_config[SITEURL]/announce.php?passkey=%s"; // Announce URL to use for passkey
$site_config['UPLOADSCRAPE'] = true; // Scrape external torrents on upload? If using mega-scrape.php you should disable this
$site_config['FORUMS'] = true; // Enable / Disable Forums
$site_config['FORUMS_GUESTREAD'] = true; // Allow / Disallow Guests To Read Forums
$site_config["OLD_CENSOR"] = false; // Use the old change to word censor set to true otherwise use the new one.   

$site_config['maxusers'] = 20000; // Max # of enabled accounts
$site_config['maxusers_invites'] = $site_config['maxusers'] + 5000; // Max # of enabled accounts when inviting

$site_config['currency_symbol'] = '$'; // Currency symbol (HTML allowed)

//AGENT BANS (MUST BE AGENT ID, USE FULL ID FOR SPECIFIC VERSIONS)
$site_config['BANNED_AGENTS'] = "-AZ21, -BC, LIME";

//PATHS, ENSURE THESE ARE CORRECT AND CHMOD TO 777 (ALSO ENSURE TORRENT_DIR/images is CHMOD 777)
$site_config['torrent_dir'] = getcwd().'/uploads';
$site_config['nfo_dir'] = getcwd().'/uploads';
$site_config['blocks_dir'] = getcwd().'/blocks';

// Image upload settings
$site_config['image_max_filesize'] = 524288; // Max uploaded image size in bytes (Default: 512 kB)
$site_config['allowed_image_types'] = array(
					// "mimetype" => ".ext",
					"image/gif" => ".gif",
					"image/pjpeg" => ".jpg",
					"image/jpeg" => ".jpg",
					"image/jpg" => ".jpg",
					"image/png" => ".png"
				);

$site_config['SITE_ONLINE'] = true;									//Turn Site on/off
$site_config['OFFLINEMSG'] = 'Estamos haciendo una actualización';	

$site_config['WELCOMEPMON'] = true;			//Auto PM New members
$site_config['WELCOMEPMMSG'] = '¡Gracias por registrarte en nuestro tracker! Recuerda mantener tu ratio de compartición en el 1.0 :)';

$site_config['SITENOTICEON'] = true;
$site_config['SITENOTICE'] = 'Bienvenidos al tracker de Tekeremata!<br /><br />Si no sabes cómo registrarte dirígete a <a href="http://tekeremata.org/cambio-a-tracker-privado-importante/"><strong>Tekeremata!</strong></a> y te daremos una invitación. ¡¡¡Es gratis!!!';

$site_config['UPLOADRULES'] = 'Deberías incluir un archivo .nfo siempre que puedas<br />Intenta asegurarte de que tus torrents mantienen sus semillas durante al menos 24 horas<br />No vuelvas a publicar el mismo material mientras esté activo el anterior';

//Setup Site Blocks
$site_config['LEFTNAV'] = true; //Left Column Enable/Disable
$site_config['RIGHTNAV'] = true; // Right Column Enable/Disable
$site_config['MIDDLENAV'] = true; // Middle Column Enable/Disable
$site_config['SHOUTBOX'] = true; //enable/disable shoutbox
$site_config['NEWSON'] = true;
$site_config['DONATEON'] = false;
$site_config['DISCLAIMERON'] = false;

//WAIT TIME VARS
$site_config['WAIT_CLASS'] = '1,2';		//Classes wait time applies to, comma seperated
$site_config['GIGSA'] = '1';			//Minimum gigs
$site_config['RATIOA'] = '0.10';		//Minimum ratio
$site_config['WAITA'] = '24';			//If neither are met, wait time in hours

$site_config['GIGSB'] = '3';			//Minimum gigs
$site_config['RATIOB'] = '0.13';		//Minimum ratio
$site_config['WAITB'] = '12';			//If neither are met, wait time in hours

$site_config['GIGSC'] = '5';			//Minimum gigs
$site_config['RATIOC'] = '0.16';		//Minimum ratio
$site_config['WAITC'] = '6';			//If neither are met, wait time in hours

$site_config['GIGSD'] = '7';			//Minimum gigs
$site_config['RATIOD'] = '0.19';		//Minimum ratio
$site_config['WAITD'] = '2';			//If neither are met, wait time in hours

//CLEANUP AND ANNOUNCE SETTINGS
$site_config['PEERLIMIT'] = '10000';			//LIMIT NUMBER OF PEERS GIVEN IN EACH ANNOUNCE
$site_config['autoclean_interval'] = '600';		//Time between each auto cleanup (Seconds)
$site_config['LOGCLEAN'] = 28 * 86400;			// How often to delete old entries. (Default: 28 days)
$site_config['announce_interval'] = '600';		//Announce Interval (Seconds)
$site_config['signup_timeout'] = '259200';		//Time a user stays as pending before being deleted(Seconds)
$site_config['maxsiteusers'] = '10000';			//Maximum site members
$site_config['max_dead_torrent_time'] = '6048000';//Time until torrents that are dead are set invisible (Seconds)

//AUTO RATIO WARNING
$site_config["ratiowarn_enable"] = false; //Enable/Disable auto ratio warning
$site_config["ratiowarn_minratio"] = 0.1; //Min Ratio
$site_config["ratiowarn_mingigs"] = 4;  //Min GB Downloaded
$site_config["ratiowarn_daystowarn"] = 14; //Days to ban

// category = Category Image/Name, name = Torrent Name, dl = Download Link, uploader, comments = # of comments, completed = times completed, size, seeders, leechers, health = seeder/leecher ratio, external, wait = Wait Time (if enabled), rating = Torrent Rating, added = Date Added, nfo = link to nfo (if exists)
$site_config["torrenttable_columns"] = "category,name,dl,uploader,comments,size,seeders,leechers,health,completed";
// size, speed, added = Date Added, tracker, completed = times completed
$site_config["torrenttable_expand"] = "";

// Caching settings
$site_config["cache_type"] = "disk"; // disk = Save cache to disk, memcache = Use memcache, apc = Use APC
$site_config["cache_memcache_host"] = "localhost"; // Host memcache is running on
$site_config["cache_memcache_port"] = 11211; // Port memcache is running on
$site_config['cache_dir'] = getcwd().'/cache'; // Cache dir (only used if type is "disk"). Must be CHMOD 777


// Mail settings
// php to use PHP's built-in mail function. or pear to use http://pear.php.net/Mail
// MUST use pear for SMTP
$site_config["mail_type"] = "php";
$site_config["mail_smtp_host"] = "mail.tekeremata.org"; // SMTP server hostname
$site_config["mail_smtp_port"] = "587"; // SMTP server port
$site_config["mail_smtp_ssl"] = false; // true to use SSL
$site_config["mail_smtp_auth"] = true; // true to use auth for SMTP
$site_config["mail_smtp_user"] = "tracker@tekeremata.org"; // SMTP username
$site_config["mail_smtp_pass"] = "J0bFAIwe"; // SMTP password


// Password hashing - Once set, cannot be changed without all users needing to reset their passwords
$site_config["passhash_method"] = "sha1"; // Hashing method (sha1, md5 or hmac). Must use what your previous version of TT did or all users will need to reset their passwords
// Only used for hmac.
$site_config["passhash_algorithm"] = "sha1"; // See http://php.net/hash_algos for a list of supported algorithms.
$site_config["passhash_salt"] = "En un lugar de la Mancha de cuyo nombre no quiero acordarme"; // Shouldn't be blank. At least 20 characters of random text.

?>
