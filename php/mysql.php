<?php 

function mysql_init ()
{ 
  	mysql_connect(DBHOST, DBUSER, DBPASS) or die('Could not init database'); 
  	mysql_select_db(DBNAME) or die('Could not init database'); 
}

function mysql_get_data ($sql)
{
        $ret = array ();
        $result = mysql_query($sql);
        if ($result == false) die (mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
                $ret[] = $row;
        }
        return $ret;
}

function mysql_exec ($sql)
{
        $result = mysql_query($sql);
        if ($result == false) die (mysql_error());
}

function mysql_insert_data ($sql)
{
        $result = mysql_query($sql);
        if ($result == false) die (mysql_error());
        $ret = mysql_insert_id();
        return $ret;
}
 
?>
