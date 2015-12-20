<?
include('includes/config.php');

if($_GET['b']){
	$b = $_GET['b'];
}

elseif($_POST['b']){
	$b = $_POST['b'];
}

// output playlists
//where date > '2001%'

$sqlplaylists = "
select count(band) as totalsongs, band
from playlists
where active=0
group by band
order by totalsongs desc
";

$resultplaylists = mysql_query($sqlplaylists);
$i=0;

while($rowplaylists = mysql_fetch_array($resultplaylists)){
	$totalsongs = $rowplaylists['totalsongs'];
	$band = $rowplaylists['band'];
	$band = "<a href=\"band.php?b=$band\">$band</a>";

	$displayblock .= "
	<tr>
		<td valign=top>$band</td>
		<td valign=top>$totalsongs</td>
	</tr>
	";

	$i++;
}


include('includes/header.php'); ?>


<table width=600 cellpadding=25>
<h1>Top Bands</h1>
<br>
<table width=600 cellpadding=5>
<tr>
<td valign=top>Band</td>
<td valign=top>Total</td>
</tr>
<?=$displayblock?>
</table>

<?php include('includes/footer.php'); ?>