<?php
	@session_start();
	include("dbconnect.php");
	$roll_no=$_GET['id'];
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from faculty where roll_no='$roll_no' ");
	$result=mysqli_fetch_array($result);
	$id=$result['id'];
?>
<html>
<title> Edit faculty details</title>
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
	<?php echo'<a href="edit_department.php?id='.$result['dept_id'].'" class="back">BACK</a><center>';?>
	<br><br>
	<center> <h1>Edit Faculty</h1></center>

	<?php 
	$iname="staff".$result['id'];
	include("image.php");
		echo '<img width="150px" height="200px" src="images/'.$result['image_name'].'">';
		//echo $result['image_name'];
		
	 	
	 	//          echo '<script>window.location.href="./edit_faculty.php?id='.$result['id'].'";</script>';
	 	echo '</center>';
	 	
	 	
	?>
	<form  method="post">		
			<h3>Name</h3>
			<?php echo '	<input type="text" name="s_name"  required value="'.$result['name'].'" required>';			?>
			<h3>Roll number</h3>
			<?php echo '	<input type="text" name="roll_no"  required value="'.$result['roll_no'].'" required>';			?>
			<h3>Designation</h3>
			<?php echo '	<input type="text" name="designation"  required value="'.$result['designation'].'" required>';			?>
			<h3>Phone</h3>
			<?php echo '	<input type="text" name="phone"  required value="'.$result['phone'].'"  required>';			?>
			<h3>Email</h3>
			<?php echo '	<input type="email" name="email"  required value="'.$result['email'].'" required>';			?>
			<h3>Area of Specialization</h3>
			<textarea class="ckeditor" cols="80" id="editor1" name="interest" rows="10" required>
				<?php echo $result['interest']; ?>
			</textarea>
			<input type="submit" value="Submit">
		</p>
	</form>

</body>
</html>

<?php
	if(isset($_POST['s_name']))
	{
		$sql="update faculty set name='".$_POST['s_name']."',roll_no='".$_POST['roll_no']."',designation='".$_POST['designation']."',phone='".$_POST['phone']."',email='".$_POST['email']."',interest='".$_POST['interest']."' where id='$id'";
		$query=mysqli_query($con,$sql);
		if (!$query) {
    		die('Invalid query: ' . mysql_error());
			}
		//echo $name.$Contact;
			include('update_faculty_json.php');
		echo '<script>window.location.href="./edit_department.php?id='.$result['dept_id'].'";</script>';
	}
?>
