<?php
include 'connect.php';
$s=$_GET['q'];
$q="SELECT url,eid,description,name,uid,cause,location FROM event WHERE name LIKE '%$s%' OR cause LIKE '%$s%'";
$d=$conn->prepare($q);
$d->execute(array(':name' => "Jimbo"));
$cd=$d->fetch();
$tr="";
while ($cd)
{
	$eid=$cd['eid'];
	$name=$cd['name'];
 $tr.='<a href=" locate.php?event='.$eid.'"><div class="live" onclick="change(this)"id="'.$name.'">'.$name.'</div></a><br>';
 $cd=$d->fetch();

}
echo $tr;
?>