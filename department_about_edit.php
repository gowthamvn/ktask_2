<?php

	@session_start();
	if(isset($_POST['department']))
	{
		$dept=$_POST['department'];
		$_SESSION['department']=$dept;
	}
	else
	{
		$dept=$_SESSION['department'];
	}
	
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from department where name='$dept' ");
	$result=mysqli_fetch_array($result);
	$id=$result['id'];
	$about=$result['about'];
	echo $about;
	
?>


<html>
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
	<a href="about_department.php" class="back">BACK</a>
	<br><br>
	<h1>About Content of <?php echo $dept;?> Department</h1>

	<form  method="post">
		<p>
			<label for="editor1">
				Editor 1:
			</label>
			<textarea class="ckeditor" cols="80" id="editor1" name="value" rows="20">
			<?php
				echo $about;
			?>		
			</textarea>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
	
</body>
</html>

<?php
	if(isset($_POST['value']))
	{
		$value=$_POST['value'];
		//echo $value;
		mysqli_query($con,"update department set about='$value' where id='$id' ");
		echo '<script>window.location.href="./department_About_edit.php";</script>';
	}
?>