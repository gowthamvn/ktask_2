<?php
	@session_start();
	include("dbconnect.php");
	$id=$_GET['id'];
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from events where id='$id' ");
	$result=mysqli_fetch_array($result);
	
		$location=$result['location'];
		$date=$result['date'];
		$Organiser=$result['Organiser'];
		$Contact=$result['Contact'];
		$desc=$result['description'];
		$s_time=$result['start_time'];
		$e_time=$result['end_time'];
	$name=$result['name'];
	$description=$result['description'];
?>
<html>
<title> Edit  event</title>
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
	<a href="events.php" class="back">BACK</a>
	<br><br>
	<center> <h1>Event Edit</h1></center>
	<form  method="post">		
			<h2>Name</h2>
			<textarea class="ckeditor" cols="80" id="editor1" name="title" rows="10" required>
				<?php echo $name; ?>
			</textarea>
			<h2>Date</h2>
			<?php echo '<input type="date" name="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}[-][0-9]{2}-[0-9]{2}" hint="yyyy-mm-dd"required
			value="'.$date.'">'; ?>
			<h2>Start time</h2>
			<?php echo '
			<input type="text" name="s_time" placeholder="hh:mm:ss" required value="'.$s_time.'">';			?>
			<h2>End time</h2>
			<?php echo '<input type="text" name="e_time" placeholder="hh:mm:ss" required value="'.$e_time.'">';?>
			<h2>Description</h2>
			<textarea class="ckeditor" cols="80"  name="description" rows="10" required>
			<?php echo $desc; ?>
			</textarea>
			<h2>Organiser</h2>
			<textarea class="ckeditor" cols="80"  name="organiser" rows="10" required>
				<?php echo $Organiser; ?>
			</textarea>
			<h2>Organiser Contact</h2>
			<?php echo '<input type="number" name="contact" required value="'.$Contact.'">';?>
			<h2>Location</h2>
			<textarea class="ckeditor" cols="60"  name="location" rows="10" required>
			<?php echo $location; ?>
			</textarea>

		
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>

<?php
	if(isset($_POST['title']))
	{
		$name=$_POST['title'];
		$location=$_POST['location'];
		$date=$_POST['date'];
		$Organiser=$_POST['organiser'];
		$Contact=$_POST['contact'];
		$desc=$_POST['description'];
		$s_time=$_POST['s_time'];
		$e_time=$_POST['e_time'];
		$sql="update events set name='$name',description='$desc',location='$location',date='$date',Organiser='$Organiser',Contact='$Contact',end_time='$e_time',start_time='$s_time' where id='$id'";
		$query=mysqli_query($con,$sql);
		if (!$query) {
    		die('Invalid query: ' . mysql_error());
			}
		echo $name.$Contact;
		echo '<script>window.location.href="./events.php";</script>';
	}
?>
