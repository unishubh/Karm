<?php
session_start();
include 'connect.php';

$n=$_GET['name'];
$e=$_GET['email'];
$p=$_GET['pic'];
$fbid=$_GET['fbid'];
//echo 'image:'.$p;
//echo $fbid.'<br>'; 
//echo 0;
$s=$_GET['sex'];
//$_SESSION['name']=$n;
//	$_SESSION['user']=$e;
//	$_SESSION['sex']=$s;
	//$_SESSION['age']=$d['age'];
	$q="SELECT * from users WHERE fbid='$fbid'";
	$query=$conn->prepare($q);
	$query->execute();
	$query->execute(array(':name' => "Jimbo"));
$r=$query->fetch();
if($r)
echo 'name = '.$r['name'].' fbid rcvd is'.$fbid;
if(!$r)
{
	echo 'Number of rows is 0';
	//echo ' fbid rcvd is'.$fbid;
	$q="INSERT INTO users (name,email,sex,image,fbid)VALUES ('$n','$e','$s','$p','$fbid')";
	$query=$conn->prepare($q);
	$query->execute();
	echo "Updated";	

    //
    

	//echo 1;

}
//if($e!="undefined")
//$q="SELECT * FROM users WHERE fbid='$fbid' ";
//else
$q="SELECT * FROM users WHERE fbid='$fbid' ";
	$query=$conn->prepare($q);
	$query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
if(isset($d['id']))
    echo 'to'.$d['id'];
else 
echo 'Nont found';
 
//echo 'Shubh';
    $_SESSION['name']=$d['name'];
   $_SESSION['sex']=$d['sex'];

    $_SESSION['id']=$d['id'];
    $_SESSION['image']=$d['image'];
    //echo $d['id'];
//echo $_SESSION['id'];
//echo '101';

 ?>
