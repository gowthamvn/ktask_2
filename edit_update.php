<?php

	@session_start();
	$id=$_GET['id'];	
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from news where id='$id' ");
	$result=mysqli_fetch_array($result);
	$title=$result['title'];
	$description=$result['description'];
	//echo $about;
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
	<a href="updates.php" class="back">BACK</a>
	<br><br>
	<h1>Updates</h1>
	<form  method="post">
		
		
			<h1>Title</h1>
			<textarea class="ckeditor" cols="80" id="editor1" name="title" rows="20">
				<?php echo $title; ?>
			</textarea>
			<h1>Description</h1>
			<textarea class="ckeditor" cols="80"  name="description" rows="20">
				<?php echo $description; ?>
			</textarea>
		
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>

<?php
	if(isset($_POST['title']))
	{
		
		$title=$_POST['title'];
		$desc=$_POST['description'];
		mysqli_query($con,"update news set title='$title',description='$desc' where id='$id' ");
		
		echo '<script>window.location.href="./updates.php";</script>';
	}
?>