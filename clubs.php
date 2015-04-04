<?php
		
	include("header.php");
	include("dbconnect.php");
?>
<html>
<head>
	<title>Clubs</title>
</head>
<body>
	<center><h2> Clubs of CEG</h2></center>
		<?php echo'<center><a href="add_club.php">
		<button class="btn btn-danger"> Add new Club</button>
		</a><center>';?>
		<br><br>
		</center>


		<?php
		$sql="select count(*) from clubs";
	$result=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		$sql="select * from clubs";
		$result=mysqli_query($con,$sql);
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		<tr>
		<th>Name</th>
		<th>Description</th>
		<th>President Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>';
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['name'].'</td>
			
			<td>'.$res['description'].'</td>
			<td>'.$res['president_name'].'</td>
			<td>'.$res['phone'].'</td>
			<td>'.$res['email'].'</td>
			
			<td><a href="edit_club.php?id='.$res['id'].'">Edit</a></td>
			<td> <a href="delete_club.php?id='.$res['id'].'">Delete</a></td>
			</tr>';
		}
		echo '</table>';
		
	}
	else
	{
		echo '<br><br><center><h3>No Clubs added</h3></center>';
	}
	include("update_clubs_json.php");
	?>
</body>
</html>