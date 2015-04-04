<?php

	$id=$_GET['id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from department where id='$id' ");
	header('Location:add_department.php');
?>