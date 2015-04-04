<?php
	
	include("header.php");
	include("dbconnect.php");
	$result=mysqli_query($con,"select * from department");


?>

<form class="navbar-form navbar-left" method="post" action="department_about_edit.php">
  <div class="form-group">
    <label>Department</label>
    <select name="department" class="form-control" >
    	<?php
    		while($res=mysqli_fetch_array($result))
    		{
    			$name=$res['name'];
    			echo '<option value='.$name.'>'.$name.'</option>';
    		}
    	?>
    </select>
  
    <input   type="submit"  class="btn btn-danger" value="Edit">
  </div>
</form>

