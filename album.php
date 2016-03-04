<?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{
	$eid=$_POST['eid'];

	//$qq=$_POST['n'].$eid;
	//echo $qq;
$img_name=$_FILES['photo']['name'];
$t=$_FILES['photo']['type'];
//echo $eid;
$dir='uploads/'.$eid.'/';
if(!file_exists($dir))
{
	mkdir($dir,0777,true);

}
if(($t=="image/gif"||$t=="image/png"||$t="image/jpeg")&&($_FILES['photo']['size']>15000))
{
	if($_FILES['photo']['error']>0)
	{
		echo '<script>alert("You are going wrong");</script>';
	}
	else{
		$i=1;
		$success=false;
		$new_img_name=$img_name;
		while(!$success)
		{
			if(file_exists($dir.$new_img_name))
			{
				$i++;
				$new_img_name=$i.$new_img_name;
			}
			else
			{
				$success=true;

			}
		}
		move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$new_img_name);
		$q="INSERT INTO images(eid,photo) VALUES ('$eid','$new_img_name')";
		$query=$conn->prepare($q);
		$query->execute();
		echo '<script>alert("Done");
		location.href="locate.php?event=.'.$eid.'";</script>';
	}
}

}

 ?>}
