<?php

function get_contents ($crc32)
{
	$ret = "";
	$crc = mysql_escape_string ($crc32);
	$sql = "SELECT html from contents WHERE `crc` = '$crc'";
	$data = mysql_get_data ($sql);
	if (is_array ($data))
	{
		if (isset ($data[0]))
		{
			$ret = $data[0]['html'];
		}
	}
	return $ret;
}

function sync_content ($crc32, $htmlcode, $version)
{
	$crc = mysql_escape_string ($crc32);
	$html = mysql_escape_string ($htmlcode);
	$ver = mysql_escape_string ($version);
	
	echo $crc . "\r\n";
	$sql = "DELETE FROM contents WHERE `crc`='$crc'";
	mysql_exec ($sql);

	$sql = "INSERT INTO contents (`crc`, `html`, `version`) VALUES ('$crc', '$html', '$ver')";
	mysql_insert_data ($sql);

	return 1;
}

function getDocId ()
{
	if (!isset ($_SERVER["REDIRECT_URL"]))
	{
		$docid="/";
	} else {
		$url = $_SERVER["REDIRECT_URL"];
		if (strpos ($url, BASEURL) === 0)
		{
			$docid = substr ($url, strlen (BASEURL));
		} else {
			$docid = 0;
		}
 	}
	return $docid;
}

function getDocCRC32 ()
{
	$id = getDocId ();
	return crc32 ($id);
}
?>
