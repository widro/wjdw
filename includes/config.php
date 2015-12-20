<?
/* db connection  */
$dbname = "db54729_wjdw";

$connection = mysql_connect( $_ENV{DATABASE_SERVER}, "db54729", "O47jhg(%vfoyh") or die("Couldn't connect.");
$db = mysql_select_db($dbname) or die("Couldn't select database");

?>