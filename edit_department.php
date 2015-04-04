<?php
		
	include("header.php");
	include("dbconnect.php");
	include("update_dept_json.php");
	$id=$_GET['id'];
	$result=mysqli_query($con,"select * from department where id='$id' ");
	$result=mysqli_fetch_array($result);
	$name=$result['name'];
	$about=$result['about'];
	$c_name=$result['contact_name'];
	$c_email=$result['contact_email'];
	$c_phone=$result['contact_phone'];
?>
<html>
<body>
	<center><h2>Genreal Details</h2></center>
	<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		<tr>
			<td>Name</td>
			<td><?php echo $name; ?></td>
				<td><?php echo '<a href="edit_dept_detail.php?id='.$id.'&field=name">Edit</a>';?></td>
		</tr><tr>
			<td>About</td>
			<td><?php echo $about; ?></td>
			<td><?php echo '<a href="edit_dept_detail.php?id='.$id.'&field=about">Edit</a>';?></td>
		</tr><tr>
			<td>Contact Person</td>
			<td><?php echo $c_name; ?></td>
				<td><?php echo '<a href="edit_dept_detail.php?id='.$id.'&field=contact_name">Edit</a>';?></td>
		</tr><tr>
			<td>Phone</td>
			<td><?php echo $c_phone; ?></td>
				<td><?php echo '<a href="edit_dept_detail.php?id='.$id.'&field=contact_phone">Edit</a>';?></td>
		</tr><tr>
			<td>Email</td>
			<td><?php echo $c_email; ?></td>
				<td><?php echo '<a href="edit_dept_detail.php?id='.$id.'&field=contact_email">Edit</a>';?></td>
		</tr>
		</table>	
		<center><h2>Staffs</h2>
		<?php echo'<a href="add_new_faculty.php?id='.$id.'">
		<button class="btn btn-danger"> Add new faculty</button>
		</a><center>';?>

		<br><br>
		</center>


		<?php
		$sql="select count(*) from faculty where dept_id=".$id;
	$result=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		$sql="select * from faculty where dept_id=".$id;
		$result=mysqli_query($con,$sql);
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		
		<tr>
		<th>Roll no</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Area of Specialization<th>
		<th></th>
		</tr>';
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['roll_no'].'</td>
			<td>'.$res['name'].'</td>
			<td>'.$res['designation'].'</td>
			<td>'.$res['phone'].'</td>
			<td>'.$res['email'].'</td>
			<td>'.$res['interest'].'</td>
			<td><a href="edit_faculty.php?id='.$res['roll_no'].'">Edit</a></td>
			<td> <a href="delete_faculty.php?id='.$res['roll_no'].'">Delete</a></td>
			</tr>';
		}
		echo '</table>';
		
	}
	else
	{
		echo '<br><br><center><h3>No staff added</h3></center>';
	}
	include('update_faculty_json.php');
?>
</body>
</html>