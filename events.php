
<?php
	include("dbconnect.php");

	$query =mysqli_query($con,"select * from events");
if (!$query) {
    		die('Invalid query: ' . mysql_error());
			}
$rows = array();
while($r = mysqli_fetch_assoc($query)) {
     $rows[] = $r;
}
$json_data= json_encode($rows);
file_put_contents('events.json', $json_data);
	include("header.php");
	
	echo '
	<a href="add_event.php"><center><button class="btn btn-danger" type="submit">Add New event</button></center></a><r><br>';
	
	$result=mysqli_query($con,"select count(*) from events");
	if (!$result) {
    		die('Invalid query: ' . mysql_error());
			}
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		<tr>
			<th>name</th>
			<th>date</th>
			<th>location</th>
			<th>description</th>
			<th>Organiser</th>
			<th>Contact</th>
			<th>start time</th>
			<th>end time</th>
			<th></th>
		</tr>';
		$result=mysqli_query($con,"select * from events");
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['name'].'</td><td>'.$res['date'].'</td>
			<td>'.$res['location'].'</td><td>'.$res['description'].'</td>
			<td>'.$res['Organiser'].'</td><td>'.$res['Contact'].'</td>
			<td>'.$res['start_time'].'</td><td>'.$res['end_time'].'</td>
			<td>
			<a href="edit_event.php?id='.$res['id'].'    ">Edit</a>
			<a href="delete_event.php?id='.$res['id'].'">Delete</a>
			</td></tr>';
		}
		echo '</table>';
	}
	else
	{
		echo '<br><br>No updates Yet';
	}
?>

