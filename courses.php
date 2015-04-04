<?php
		
	include("header.php");
	include("dbconnect.php");
?>
<html>
<head>
	<title>Courses</title>
</head>
<body>
	<center>
		<h2>Courses available in CEG</h2>
	</center>
		<?php echo'<center><a href="add_course.php">
		<button class="btn btn-danger"> Add new Course</button>
		</a><center>';?>
		<br><br>
		</center>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<h2>Under Gratuaate Courses</h2>
	<?php
		$sql="select count(*) from courses where category='UG'";
	$result=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		$sql="select * from courses where category='UG'";
		$result=mysqli_query($con,$sql);
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">';
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['name'].'</td>
			<td> <a href="delete_course.php?id='.$res['id'].'">Delete</a></td>
			</tr>';
		}
		echo '</table>';
		
	}
	else
	{
		echo '<br><br><center><h3>No UG  Courses added</h3></center>';
	}
	echo '<h2>Post Gratuaate Courses</h2><br>';
	$sql="select count(*) from courses where category='PG'";
	$result=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		$sql="select * from courses where category='PG' ";
		$result=mysqli_query($con,$sql);
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		';
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['name'].'</td>
			<td> <a href="delete_course.php?id='.$res['id'].'">Delete</a></td>
			</tr>';
		}
		echo '</table>';
		
	}
	else
	{
		echo '<br><br><center><h3>No PG Courses added</h3></center>';
	}
	include("update_courses_json.php");
	?>
	</div>
	<div class="col-md-2"></div>
	</div>
</body>
</html>