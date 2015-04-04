<?php
	@session_start();
	include("dbconnect.php");
?>
<?php
	if(isset($_POST['c_name']))
	{
		$sql="select count(*) from clubs where name='".$_POST['c_name']."'";
		$result=mysqli_query($con,$sql);
		$result=mysqli_fetch_array($result);
		if($result[0]>0)
		{
			echo '<script>alert("Club with same Name already exists ");</script>';
		}
		else
		{
			
			$sql="insert into clubs(name,president_name,email,phone,description) values('".$_POST['c_name']."','".$_POST['president_name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['description']."')";
			$query=mysqli_query($con,$sql);
			if (!$query) {
	    		die('Invalid query: ' . mysql_error());
				}
			echo '<script>window.location.href="./clubs.php";</script>';
		}

	}
?>

<html>
<title> New Club of CEG </title>
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
	<?php echo'<a href="clubs.php" class="back">BACK</a>';?>
	<br><br>
	<center> <h1>Add New Club</h1></center>

	<form  method="post">		
			<h3>Name</h3>
				<input type="text" name="c_name"  required>
			<h3>President Name </h3>
				<input type="text" name="president_name" required>
			<h3>Email</h3>
			<input type="email" name="email" required>
			<h3>Phone</h3>
			<input type="text" name="phone" required>
			<h3>Description</h3>
			<textarea class="ckeditor" cols="80" id="editor1" name="description" rows="10" required>
			</textarea>
			<input type="submit" value="Submit">
		
	</form>
</body>
</html>

