<?php

	@session_start();
	$id=$_GET['id'];
	$field=$_GET['field'];
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from department where id='$id' ");
	$result=mysqli_fetch_array($result);
	$name=$result['name'];	
	$value=$result[$field];
?>
<html>
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
	<a href="edit_department.php" class="back">BACK</a>
	<br><br>
	<h1>Enter  <?php echo $field;?> for <?php echo $name;?></h1>
	<form  method="post">
		<p>
			<label for="editor1">
				Editor 1:
			</label>
			<textarea class="ckeditor" cols="80" id="editor1" name="value" rows="20">
			<?php
				echo $value;
			?>		
			</textarea>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>
<?php
	if(isset($_POST['value']))
	{
		$val=$_POST['value'];
		$sql="update department set ".$field."='$val' where id='$id' ";
		$query=mysqli_query($con,$sql);
		echo '<script>window.location.href="./edit_department.php?id='.$id.'";</script>';
	}
?>