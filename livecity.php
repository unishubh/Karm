<?php
include 'connect.php';
$s=$_GET['q'];
$q="SELECT district FROM districts WHERE district LIKE '$s%'";
$d=$conn->prepare($q);
$d->execute(array(':name' => "Jimbo"));
$cd=$d->fetch();
$tr="";
while ($cd)
{
	$name=$cd['district'];
 $tr.='<div class="live" onclick="change(this)" id="'.$name.'">'.$name.'</div><br>';
 $cd=$d->fetch();

}
echo $tr;
?>