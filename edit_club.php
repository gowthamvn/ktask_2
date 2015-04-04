<?php
	include("dbconnect.php");
	$id=$_GET['id'];
	$result=mysqli_query($con,"select * from clubs where id='$id' ");
	$result=mysqli_fetch_array($result);
?>
<html>
<title> Update Club </title>
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
	<center> <h1>Edit Club</h1></center>

	<form  method="post">		
		<h3>Name</h3>
			<?php echo '	<input type="text" name="c_name"   value="'.$result['name'].'" required>';			?>
			<h3>President Name </h3>
			<?php echo '	<input type="text" name="president_name"   value="'.$result['president_name'].'" required>';			?>
				
			<h3>Email</h3>
			<?php echo '	<input type="email" name="email"   value="'.$result['email'].'" required>';			?>
			<h3>Phone</h3>
			<?php echo '	<input type="text" name="phone"   value="'.$result['phone'].'" required>';			?>
			<h3>Description</h3>
			<textarea class="ckeditor" cols="80" id="editor1" name="description" rows="10" required>
				<?php echo $result['description']; ?>
			</textarea>
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>

<?php
	if(isset($_POST['c_name']))
	{
		$sql="select count(*) from clubs where name='".$_POST['name']."'";
		$result=mysqli_query($con,$sql);
		$result=mysqli_fetch_array($result);

		if($result[0]>1)
		{
			echo '<script>alert("club with same name already exists ");</script>';
		}
		else
		{
			$sql="update clubs set name='".$_POST['c_name']."',president_name='".$_POST['president_name']."',email='".$_POST['email']."',description='".$_POST['description']."',phone='".$_POST['phone']."' where id='$id'";
			$query=mysqli_query($con,$sql);
			if (!$query) {
				echo '<script>alert("Invalid details entered");</script>';
	    		die('Invalid query: ' . mysql_error());

				}

			echo '<script>window.location.href="./clubs.php";</script>';
		}

	}
?>
