<?php
		//include('dbconnect.php');
		if($_FILES)
		{
			//$iname="123";
			$image="";

			if($_FILES)
			{
				foreach ($_FILES['file']['name'] as $f => $name)
				{
		 			$allowedExts = array("gif", "jpeg", "jpg", "png");
    				$temp = explode(".", $name);
    				$extension = end($temp);
					if ((($_FILES["file"]["type"][$f] == "image/gif")
					|| ($_FILES["file"]["type"][$f] == "image/jpeg")
					|| ($_FILES["file"]["type"][$f] == "image/jpg")
					|| ($_FILES["file"]["type"][$f] == "image/png"))
					&& ($_FILES["file"]["size"][$f] < 2000000)
					&& in_array($extension, $allowedExts))
					{
		  				if ($_FILES["file"]["error"][$f] > 0)
  						{
		    				echo "Return Code: " . $_FILES["file"]["error"][$f] . "<br>";
  						}
  						else
  						{
   							/*if (file_exists("images/question/".$name))
   							{
		    					echo "File already exists";
   							}
   							else*/
   							{
	    						$tmp=explode(".", $name);
   								$name=$tmp[0].".".$tmp[1];
   								$iname=$iname.".".$tmp[1];
    							//$iconv(in_charset, out_charset, str)mgs.='<img src="img/quetion/'.$name.'">';
								move_uploaded_file($_FILES["file"]["tmp_name"][$f], "images/".$iname);
       							//echo $name;
       							//$image[$f]="img/question/" .$name;
   							}
						}
						//$location="http://localhost/apps/ceg/images/".$iname.$extension;
						//mysqli_query($con,"insert into images(name,location) values('$iname','$location') ");

						$sql="update faculty set image_name='".$iname."'where id='$id'";
					 	$query=mysqli_query($con,$sql);
					 	

					}
					else
					{
	    				$error =  "Invalid file";
					}
				}
					
			}
		}

		
	?>
	
		


<html>
		<h3>change photo here</h3>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="file" name="file[]">	
		<input type="submit" name="submit" value="upload">

	</form>
</html>

