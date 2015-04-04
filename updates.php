
<?php
	include("dbconnect.php");
	include("header.php");
	include("update_news.php");
	echo '<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	<form method="post">
	
	<textarea class="form-control" rows="2" cols="50" name="title" placeholder="Enter title Here.." required></textarea>
	<br>
	<textarea class="form-control" rows="4" cols="50" name="desc" placeholder="Enter desc" required></textarea>
	<center><button class="btn btn-danger" type="submit">submit</button></center>
</form> </div>
<div class="col-md-3"></div>';
	if(isset($_POST['title']))
	{
			$title=$_POST['title'];
			$desc=$_POST['desc'];
			$result=mysqli_query($con,"insert into news(title,description) values('$title','$desc') ");
			if (!$result) {
    		die('Invalid query: ' . mysql_error());
			}
			echo '<script>window.location.href="./updates.php";</script>';		
	}
	$result=mysqli_query($con,"select count(*) from news");
	if (!$result) {
    		die('Invalid query: ' . mysql_error());
			}
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		<tr>
			<th>title</th>
			<th>decription</th>
			<th></th>
		</tr>';
		$result=mysqli_query($con,"select * from news");
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['title'].'</td><td>'.$res['description'].'</td><td>
			<a href="edit_update.php?id='.$res['id'].'    ">Edit</a>
			<a href="delete_update.php?id='.$res['id'].'">Delete</a>
			</td></tr>';
		}
		echo '</table>';
	}
	else
	{
		echo '<br><br>No updates Yet';
	}
?>

