<?php
	$id=$_GET['id'];
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from faculty where roll_no='$id' ");
    $result=mysqli_fetch_array($result);
if (!$result) {
    		die('Invalid query: ' . mysql_error());
			}
    

	mysqli_query($con,"delete from faculty where roll_no='$id' ");
	$id=$result['dept_id'];
		echo '<script>window.location.href="./edit_department.php?id='.$id.'";</script>';
	//header('Location:edit_department.php?id='.$result['dept_id'].');
?>