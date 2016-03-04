<?php
session_start();
include 'connect.php';

$n=$_GET['name'];
$e=$_GET['email'];
$p=$_GET['pic'];
$fbid=$_GET['fbid'];
//echo 'image:'.$p;
//echo 
//echo 0;
$s=$_GET['sex'];
$_SESSION['name']=$n;
	$_SESSION['user']=$e;
	$_SESSION['sex']=$s;
	//$_SESSION['age']=$d['age'];
	$q="SELECT * from users WHERE fbid='$fbid'";
	$query=$conn->prepare($q);
	$query->execute();
	$query->execute(array(':name' => "Jimbo"));
$r=$query->fetch();
if($r)
echo 'id = '.$r['fbid'].' fbid rcvd is'.$fbid;
if(!$r)
{
	//echo 'Number of rows is 0';
	echo ' fbid rcvd is'.$fbid;
	$q="INSERT INTO users (name,email,sex,image,fbid)VALUES ('$n','$e','$s','$p','$fbid')";
	$query=$conn->prepare($q);
	$query->execute();
	

    //
    

	//echo 1;

}
if($e!="")
$q="SELECT * FROM users WHERE name='$n' AND email='$e' AND sex='$s' ";
else
$q="SELECT * FROM users WHERE name='$n' AND  sex='$s' ";

	$query=$conn->prepare($q);
	$query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    $_SESSION['id']=$d['id'];
    $_SESSION['image']=$d['image'];
    //echo $d['id'];
echo 1;

 ?>