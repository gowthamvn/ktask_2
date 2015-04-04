<?php
	$id=$_GET['id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from courses where id='$id' ");
	header('Location:courses.php');
?>