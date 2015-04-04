<?php
	@session_start();
	include("dbconnect.php");
	//include("header.php");
	$dept_id=$_GET['id'];
?>
<html>
<title> Add new faculty </title>
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
	<?php echo'<a href="edit_department.php?id='.$dept_id.'" class="back">BACK</a>';?>
	<br><br>
	<center> <h1>Add  Faculty</h1></center>

	<form  method="post">		
			<h3>Name</h3>
				<input type="text" name="s_name"  required>
			<h3>Roll number</h3>
				<input type="text" name="roll_no"  required>
						<h3>Designation</h3>
			<input type="text" name="designation" required>
			<h3>Phone</h3>
				<input type="text" name="phone"  >
			<h3>Email</h3>
			<input type="email" name="email" >
			<h3>Area of Specialization</h3>
			
			<textarea class="ckeditor" cols="80" id="editor1" name="interest" rows="10" >
				
			</textarea>
			<input type="submit" value="Submit">
		</p>
	</form>

</body>
</html>

<?php
	if(isset($_POST['s_name']))
	{
		$sql="insert into faculty(name,roll_no,designation,phone,email,interest,dept_id,image_name) values('".$_POST['s_name']."','".$_POST['roll_no']."','".$_POST['designation']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['interest']."','$dept_id','avatar.jpg')";
			
		
		$query=mysqli_query($con,$sql);

		if (!$query) {
    		die('Invalid query: ' . mysql_error());
			}
		//echo $name.$Contact;
			
		echo '<script>window.location.href="./edit_department.php?id='.$dept_id.'";</script>';
	}
?>
