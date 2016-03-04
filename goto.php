<?php
include 'connect.php';
$e=$_GET['eid'];
$u=$_GET['uid'];
$q="INSERT INTO going (eid,uid) VALUES ('$e','$u')";
$sql=$conn->prepare($q);
$sql->execute();
$q="INSERT INTO eactivity (eid,uid,creator) VALUES ('$e','$u',0)";
$sql=$conn->prepare($q);
$sql->execute();
echo '<button class="centered btn btn-block btn-lg btn-primary" style="color: white;" id="id" >Going</button>';


?>