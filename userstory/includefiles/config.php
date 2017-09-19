<?php 
/*----DATABASE CONNECTION FILE----- */

//Database Host
$db_host = 'localhost';

//Database Name
$db_database = 'inventory';

//Database Username
$db_user = 'root';

//Database Password
$db_pass = '';


$link = mysql_connect($db_host, $db_user, $db_pass);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// DATABASE SELECT CODE
$db_selected = mysql_select_db($db_database, $link);
if (!$db_selected) {
    die ('Can\'t use '.$db_database.' : ' . mysql_error());
}

?>