<?php
  @session_start();
?>
<html style="overflow-x:hidden;">
	<head>
		<title>Home</title>
		 <script src="js/jquery.js"></script>
		 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		 <script src="js/bootstrap.js"></script>
	</head>
	<body>

	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Page</a>

    </div>

   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if(isset($_SESSION['admin'])){ ?>
      <ul class="nav navbar-nav">
         <li class="active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          Home<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
             <li><a href="updates.php">updates</a></li>
                <li class="divider"></li>
            <li><a href="events.php">Events</a></li>
                
          </ul>
          </li>

        <li class="active"><a href="add_department.php">Departments<span class="sr-only">(current)</span></a></li>

         <li class="active"><a href="alumni.php">Alumni <span class="sr-only">(current)</span></a></li>
         <li class="active"><a href="clubs.php">Clubs<span class="sr-only">(current)</span></a></li>
         <li class="active"><a href="courses.php">Courses <span class="sr-only">(current)</span></a></li>
          <li class="active"><a href="image.php">Upload Image <span class="sr-only">(current)</span></a></li>
      </ul>
      <?php } 
      ?>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if(!isset($_SESSION['admin']))
        {
          ?>
        <li><a data-toggle="modal"data-target="#login" style="cursor:pointer;">Login</a></li>
       <?php
     }
     else
     {
       ?>
        <li><a href="logout.php" style="cursor:pointer;">Logout</a></li>
       <?php
     }
       ?>
      </ul>
    </div>
  </div>
</nav>
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"  >Login</h4>
      </div>

     	<form method="post"  class="form-horizontal;">
     		<div class="form-group" style="position:relative;left:20%;">
     			<br><br>
     			<label>Email id</label>
     			<input type="email" name="email" class="form-control" placeholder="Email ID  Here.." style="width:300px;" required><br>
     			<label>Password</label>
     			<input type="password" name="password" class="form-control" placeholder="Password Here.." style="width:300px;" required><br><br>
     		</div>

      <div class="modal-footer">
       <input type="submit" value="Login" id="submit" class="btn btn-danger">
      </form> 
      </div>

    </div>
  </div>
</div>

	</body>
</html>

<?php
		
	include("dbconnect.php");

	if(isset($_POST['email']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		 $result=mysqli_query($con,"select password from admin where email='$email' ");
			$result=mysqli_fetch_array($result);
			if($result['password']==$password)
      {
        $_SESSION['admin']=$email;
        header('Location:index.php');
      }
      else
      {
        echo '<script>alert("Wrong password")</script>';
      }

	}


?>