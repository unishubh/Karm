<?php
include 'connect.php';
session_start();
$n=$_GET['n'];
$id=$_SESSION['id'];
$_SESSION['name']=$n;
$query="UPDATE users SET name='$n' WHERE id=$id ";
echo $n;
$q=$conn->prepare($query);
$q->execute();



 ?>