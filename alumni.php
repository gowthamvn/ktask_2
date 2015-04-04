<?php
		
	include("header.php");
	include("dbconnect.php");


?>
<html>
<head>
	<title>Alumni</title>
</head>
<body>
	<center><h2> Alumni of CEG</h2></center>
		<?php echo'<center><a href="add_alumni.php">
		<button class="btn btn-danger"> Add new Alumni</button>
		</a><center>';?>
		<br><br>
		</center>


		<?php
		$sql="select count(*) from alumni";
	$result=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		$sql="select * from alumni";
		$result=mysqli_query($con,$sql);
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		<tr>
		
		<th>Name</th>
		<th>Works at</th>
		<th>About</th>
		<th>Contact</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>';
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['name'].'</td>
			<td>'.$res['works_at'].'</td>
			<td>'.$res['description'].'</td>
			<td>'.$res['email'].'</td>
			<td><a href="edit_alumni.php?id='.$res['id'].'">Edit</a></td>
			<td> <a href="delete_alumni.php?id='.$res['id'].'">Delete</a></td>
			</tr>';
		}
		echo '</table>';
		
	}
	else
	{
		echo '<br><br><center><h3>No Alumnus added</h3></center>';
	}
	include("update_alumni_json.php");
	?>
</body>
</html>