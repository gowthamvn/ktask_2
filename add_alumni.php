<?php
	@session_start();
	include("dbconnect.php");
?>
<html>
<title> New Alumni </title>
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
	<?php echo'<a href="alumni.php" class="back">BACK</a>';?>
	<br><br>
	<center> <h1>Add New Alumni</h1></center>

	<form  method="post">		
			<h3>Name</h3>
				<input type="text" name="a_name"  required>
			<h3>Works at </h3>
				<input type="text" name="works_at" >
			<h3>Email</h3>
			<input type="email" name="email" >
			<h3>Description</h3>
			<textarea class="ckeditor" cols="80" id="editor1" name="description" rows="10" >
			</textarea>
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>

<?php
	if(isset($_POST['a_name']))
	{
		$sql="select count(*) from alumni where email='".$_POST['email']."'";
		$result=mysqli_query($con,$sql);
		$result=mysqli_fetch_array($result);

		if($result[0]>0)
		{
			echo '<script>alert("Alumni with same Email already exists ");</script>';
		}
		else
		{
			echo "inside ";
			$sql="insert into alumni(name,works_at,email,description) values('".$_POST['a_name']."','".$_POST['works_at']."','".$_POST['email']."','".$_POST['description']."')";
			
			
			$query=mysqli_query($con,$sql);
			if (!$query) {
	    		die('Invalid query: ' . mysql_error());
				}
			echo '<script>window.location.href="./alumni.php";</script>';
		}

	}
?>
