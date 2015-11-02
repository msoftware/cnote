<?php

require_once ("php/config.php");
require_once ("php/mysql.php");
require_once ("php/functions.php");

if (
	isset ($_REQUEST['crc32']) &&
	isset ($_REQUEST['htmlcode']) &&
	isset ($_REQUEST['version']))
{
	$crc32    = $_REQUEST['crc32'];
	$htmlcode = $_REQUEST['htmlcode'];
	$version  = $_REQUEST['version'];

	mysql_init ();
	echo sync_content ($crc32, $htmlcode, $version);

} else {
	echo "0";
}

?>
