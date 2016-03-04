<?php 
include 'connection.php';
session_start();
$n=$_GET['event'];
$query="DELETE FROM event WHERE eid='$n'";
$q=$conn->prepare($query);
$q->execute();
echo '<script>alert("Deleted");
window.location.href="index.php"; ';


?>