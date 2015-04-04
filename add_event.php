<?php

	@session_start();
	
	include("dbconnect.php");
	//include("header.php")
?>
<html>
<title> add new event</title>
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
	<a href="events.php" class="back">BACK</a>
	<br><br>
	<center> <h1>New Event</h1></center>
	<form  method="post">		
			<h2>Name</h2>
			<textarea class="ckeditor" cols="80" id="editor1" name="title" rows="10" required></textarea>
			<h2>Date</h2>
			<input type="date" name="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}[-][0-9]{2}-[0-9]{2}" hint="yyyy-mm-dd"required>
			<h2>Start time</h2>
			<input type="text" name="s_time" placeholder="hh:mm:ss" required>
			<h2>End time</h2>
			<input type="text" name="e_time" placeholder="hh:mm:ss" required>
			<h2>Description</h2>
			<textarea class="ckeditor" cols="80"  name="description" rows="10" required>
			</textarea>
			<h2>Organiser</h2>
			<textarea class="ckeditor" cols="80"  name="organiser" rows="10" required></textarea>
			<h2>Organiser Contact</h2>
			<input type="number" name="contact" required>
			<h2>Location</h2>
			<textarea class="ckeditor" cols="60"  name="location" rows="10" required>
			</textarea>

		
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>

<?php
	if(isset($_POST['title']))
	{
		$name=$_POST['title'];
		$location=$_POST['location'];
		$date=$_POST['date'];
		$Organiser=$_POST['organiser'];
		$Contact=$_POST['contact'];
		$desc=$_POST['description'];
		$s_time=$_POST['s_time'];
		$e_time=$_POST['e_time'];
//		echo $name.$Contact.$s_time.$e_time.$datee.$desc;
		$query=mysqli_query($con,"insert into events(name,date,location,Organiser,Contact,description,start_time,end_time) values('$name','$date','$location','$Organiser','$Contact','$desc','$s_time','$e_time')");
		if (!$query) {
    		die('Invalid query: ' . mysql_error());
			}
		
		echo '<script>window.location.href="./events.php";</script>';
	}
?>
