<?php
		
	//include("header.php");
	include("dbconnect.php");
	$id=$_GET['id'];
	$result=mysqli_query($con,"select * from department where id='$id' ");
	$result=mysqli_fetch_array($result);
	$name=$result['name'];
	$about=$result['about'];
?>



<html>
<head>
	<script src="js/ckeditor.js"></script>
	<link rel="stylesheet" href="css/sample.css">
	
</head>
<body>
	
<form  method="post">
 
  	<label>Department Id</label>
  	<?php
    echo '<input type="text" name="id"  placeholder="Department Id Here.." value="'.$id.'" required>';
    ?>
    &nbsp;&nbsp;
    <label>Department Name</label>
    <?php

    echo '<input type="text" name="name"  placeholder="Department name Here.." value="'.$name.'" required>';
    ?>
   
  

		<p>
			<label for="editor1">
				About:
			</label>
			<textarea class="ckeditor" cols="80" id="editor1" name="value" rows="20">
				<?php echo $about; ?>
			</textarea>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
	
</body>
</html>

<?php
	if(isset($_POST['id']))
	{
		$cid=$_POST['id'];
		mysqli_query($con,"update department set id='$cid' where id='$id' ");

		$name=$_POST['name'];
		mysqli_query($con,"update department set name='$name' where id='$id' ");

		$value=$_POST['value'];
		mysqli_query($con,"update department set about='$value' where id='$id' ");

		echo '<script>window.location.href="./add_department.php";</script>';
	}
?>