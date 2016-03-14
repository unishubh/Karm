<?php
include 'connect.php';
session_start();
$n=$_GET['n'];
$id=$_SESSION['id'];
$_SESSION['age']=$n;
$query="UPDATE users SET age='$n' WHERE id=$id ";
echo $n;
$q=$conn->prepare($query);
$q->execute();



 ?>