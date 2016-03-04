<?php
session_start();
include 'connect.php';
//echo"andarr";
if(isset($_POST['search']))
{
	//echo"andar";
	$s=$_POST['search'];
	$query="SELECT id,name,adder FROM fundraiser WHERE name LIKE '%$s%' OR cause LIKE '%$s%' OR adder LIKE '%$s%'";
	//$query = sprintf("SELECT name,adder FROM fundraiser WHERE name LIKE '%s%%'",
      //         mysql_real_escape_string($s));
		$q=$conn->prepare($query);
		try{
			//echo"andar";
	$q->execute();
	$q->execute(array(':name' => "Jimbo"));
	echo '<table>';
	if(!$d=$q->fetch())
		echo 'Sorry, No resluts found';
	else
	{
	while($d)
	{
		//echo $d['id'];?>
		
		<tr>
		<td>
		<?php 
		echo '<a href="events.php?event='.$d['id'].'">'.$d['name'].'</a>';
		?>

		</td>
		<td>By<?php echo $d['adder'];?></td>
		</tr>
		<?php
	}
	echo '</table>';
   	}}
   	catch(PDOException $e){
   		echo $e; 
   	}
	}
	?>
