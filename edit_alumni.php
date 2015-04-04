<?php
	include("dbconnect.php");
	$id=$_GET['id'];
	$result=mysqli_query($con,"select * from alumni where id='$id' ");
	$result=mysqli_fetch_array($result);
?>
<html>
<title> Update Alumni </title>
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
	<center> <h1>Edit Alumni</h1></center>

	<form  method="post">		
			<h3>Name</h3>
			<?php echo '	<input type="text" name="a_name"   value="'.$result['name'].'" required>';			?>
				
			<h3>Works at </h3>
			<?php echo '	<input type="text" name="works_at"   value="'.$result['works_at'].'" required>';			?>
			
			<h3>Email</h3>
			<?php echo '	<input type="email" name="email"   value="'.$result['email'].'" required>';	?>
			<h3>Description</h3>
			<textarea class="ckeditor" cols="80" id="editor1" name="description" rows="10" >
			<?php echo $result['description']; ?>
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

		if($result[0]>1)
		{
			echo '<script>alert("Alumni with same Email already exists ");</script>';
		}
		else
		{
			
			$sql="update alumni set name='".$_POST['a_name']."',email='".$_POST['email']."',description='".$_POST['description']."',works_at='".$_POST['works_at']."' where id='$id'";
			$query=mysqli_query($con,$sql);
			if (!$query) {
	    		die('Invalid query: ' . mysql_error());
				}
			echo '<script>window.location.href="./alumni.php";</script>';
		}

	}
?>
