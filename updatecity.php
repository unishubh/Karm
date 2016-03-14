<?php
include 'connect.php';
session_start();
$n=$_GET['n'];
$id=$_SESSION['id'];
$_SESSION['city']=$n;
$query="UPDATE users SET city='$n' WHERE id=$id ";
echo $n;
$q=$conn->prepare($query);
$q->execute();



 ?>