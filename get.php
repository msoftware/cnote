<?php

require_once ("php/config.php");
require_once ("php/mysql.php");
require_once ("php/functions.php");

if ( isset ($_REQUEST['crc32'])) {
        $crc32    = $_REQUEST['crc32'];
        mysql_init ();
        echo get_contents ($crc32);
} else {
        echo "";
}

?>
