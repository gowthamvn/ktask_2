<?php
	
	@session_start();
	if(isset($_SESSION['admin']))
	{
		include("admin.php");
	}
	else
	{
		include("login.php");
	}
?>