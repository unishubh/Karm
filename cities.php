<?php
include 'connect.php';
$q="SELECT district FROM districts WHERE 1";
$sql=$conn->prepare($q);
$sql->execute();
    $sql->execute(array(':name' => "Jimbo"));
    $city=$sql->fetch();
 ?>