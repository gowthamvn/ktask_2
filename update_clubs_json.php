<?php
		
	include("dbconnect.php");
	$query =mysqli_query($con,"select * from clubs");
if (!$query) {
    		die('Invalid query: ' . mysql_error());
			}
$rows = array();
while($r = mysqli_fetch_assoc($query)) {
     $rows[] = $r;
}
$json_data= json_encode($rows);
//echo $json_data;
file_put_contents('clubs.json', $json_data);
?>