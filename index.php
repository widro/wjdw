<?


include_once('includes/config.php');

if($_GET['year']){
	$year = $_GET['year'];
}
else{
	$year = "2015";
}

if($_GET['active']){
	$active = $_GET['active'];
}
else{
	$active=0;
}

// get playlists
$sqlmix = "
SELECT DISTINCT mix as mix1
FROM playlists
WHERE active = '$active'
AND date LIKE '$year%'
ORDER BY date DESC
";

$resultmix = mysql_query($sqlmix);
$i=0;

while($rowmix1 = mysql_fetch_array($resultmix)){
	$rowmix[$i]=$rowmix1['mix1'];
	$i++;
}

$totalmixes = count($rowmix);






// output playlists
$sqlplaylists = "
SELECT id , track , mix , band , song , type , date , volume, active
FROM playlists
WHERE active = $active
AND date LIKE '$year%'
ORDER BY date DESC, track
";

$resultplaylists = mysql_query($sqlplaylists);

while($rowplaylists = mysql_fetch_array($resultplaylists)){

$id = $rowplaylists['id'];
$track = $rowplaylists['track'];
$mix = $rowplaylists['mix'];
$band = $rowplaylists['band'];
$song = $rowplaylists['song'];
$type = $rowplaylists['type'];
$date = $rowplaylists['date'];
$date = substr($date, 0, 10);
$volume = $rowplaylists['volume'];
$active = $rowplaylists['active'];

$band = "<a href=\"band.php?b=$band\">$band</a>";


for ( $i = 0; $i < $totalmixes; $i++) {
	$varname = 'displayblock' . $i;
	if($mix==$rowmix[$i]){
		if($type=='1'){
			$$varname .= "<li><font color=blue>$track - $song ($band)</font></li>";
		}
		elseif($type=='2'){
			$$varname .= "<li><font color=ff6600>$track - $song ($band)</font></li>";
		}
		elseif($type=='3'){
			$$varname .= "<li><font color=ff0000>$track - $song ($band)</font></li>";
		}
		else{
			$$varname .= "<li>$track - $song ($band)</li>";
		}

	$mixdate[$i] = $date;
	}
}

}


for ( $i = 0; $i < $totalmixes; $i++) {
	$varname = 'displayblock' . $i;
	$displayblock[$i] = $$varname;
	if($i%2==0){
	$bgcolor = "333333";
	}
	else{
	$bgcolor = "666666";
	}

	$displayall .= "
	<tr>
	<td valign=top bgcolor=$bgcolor>
	<h3>$rowmix[$i]</h3><i>$mixdate[$i]</i><ul>
	";



	$displayall .= $$varname;

	$displayall .= "</ol>

	</td>
	</tr>
	";
}




?>



<?php include('includes/header.php'); ?>

<table width=600 cellpadding=25>
<?=$displayall?>
</table>







<?php include('includes/footer.php'); ?>