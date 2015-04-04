<?php

	@session_start();
	include("dbconnect.php");
?>
<html>
<title> add new course</title>
<head>
	<script src="js/ckeditor.js"></script>
	<link rel="stylesheet" href="css/sample.css">
	<style>
		a.back
		{
			text-decoration: none;
			color:red;
			border:1px solid black;
			padding-left: 30px;
			padding-right: 30px;
			padding-top: 10px;
			padding-bottom: 10px;
			border-radius: 3px;
			color:white;
			background-color: black;

		}
		a.back:hover
		{
			text-decoration: none;
			opacity: .8;
		}
	</style>
</head>
<body>
	<br>
	<a href="courses.php" class="back">BACK</a>
	<br><br>
	<center> <h1>New Course</h1></center>
	<form  method="post">		
			<select name="category">
			  <option value="UG">Under Graduate</option>
			  <option value="PG">Post Graduate</option>
			</select>
			<h2>Name</h2>
			<textarea class="ckeditor" cols="80" id="editor1" name="title" rows="10" required></textarea>
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>

<?php
	if(isset($_POST['title']))
	{
		$sql="select count(*) from courses where name='".$_POST['title']."'";
		$result=mysqli_query($con,$sql);
		$result=mysqli_fetch_array($result);
		if($result[0]>0)
		{
			echo '<script>alert("Club with same Name already exists ");</script>';
		}
		else
		{
				$name=$_POST['title'];
				$category=$_POST['category'];
				$query=mysqli_query($con,"insert into courses(name,category) values('$name','$category')");
				if (!$query) {
		    		die('Invalid query: ' . mysql_error());
					}
				
				echo '<script>window.location.href="./courses.php";</script>';
		}
	}
?>
