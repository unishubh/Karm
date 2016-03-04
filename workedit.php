<?php
include 'connect.php';
session_start();
$n=$_GET['n'];
$id=$_SESSION['id'];
$_SESSION['work']=$n;
$query="UPDATE users SET work='$n' WHERE id=$id ";
echo $n;
$q=$conn->prepare($query);
$q->execute();



 ?>