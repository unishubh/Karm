<?php
include 'connect.php';
$name=$_GET['un'];
$q="SELECT count(*) FROM users WHERE email='$name'";
$query=$conn->prepare($q);
$query->execute();
$r=$query->fetchColumn();
if($r==0)
echo "1";
else
echo "0";

 ?>