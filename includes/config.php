<?
/* db connection  */
$dbname = "db214582_widroverse";

$connection = mysql_connect( $_ENV{DATABASE_SERVER}, "db214582", "_r6eM7R-td") or die("Couldn't connect.");
$db = mysql_select_db($dbname) or die("Couldn't select database");

?>