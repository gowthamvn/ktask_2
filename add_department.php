<?php
	
	include("header.php");
	include("dbconnect.php");
	include("update_dept_json.php");

?>
<form class="navbar-form navbar-left" method="post">
  <div class="form-group">
    <label>Enter Department name to add a new department</label>
    <input type="text" name="name" class="form-control" placeholder="Department name Here.." required>
    <input   type="submit"  class="btn btn-danger" value="Add">
  </div>
</form>
<br><br><br><br><br><br>
<?php

	$result=mysqli_query($con,"select count(*) from department");
	$result=mysqli_fetch_array($result);
	if($result[0]>0)
	{
		$result=mysqli_query($con,"select * from department");
		echo '<table style="margin-left:15px;margin-right:25px;" class="table table-striped">
		<tr>
		<th>Name</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>';
		while($res=mysqli_fetch_array($result))
		{
			echo '<tr><td>'.$res['name'].'</td>
			<td><a href="edit_department.php?id='.$res['id'].'">Edit</a></td>
			<td> <a href="delete_department.php?id='.$res['id'].'">Delete</a></td></tr>';
		}
		echo '</table>';
		
	}
	else
	{
		echo '<br><br>No deparment added';
	}

	if(isset($_POST['name']))
	{
		$name=$_POST['name'];

		$result=mysqli_query($con,"select count(*) from department where  name='$name' ");
		$result=mysqli_fetch_array($result);
		if($result[0]>0)
		{
			echo '<script>alert("Department with same name or id already exists ");</script>';
		}
		else
		{
			
			$result=mysqli_query($con,"insert into department(name) values('$name') ");
			if (!$result) {
    		die('Invalid query: ' . mysql_error());
			}
			echo '<script>window.location.href="./add_department.php";</script>';
		}
	}


?>