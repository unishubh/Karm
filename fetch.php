<?php
include 'connect.php';
$eid=$_GET['eid'];
$q="SELECT photo FROM images WHERE eid='$eid'";
$query=$conn->prepare($q);
$query->execute();
$query->execute(array(':name' => "Jimbo"));

    $d=$query->fetch();
    $i=0;
    $tr='<table>
    <tr>
    ';
    ?>
   

    <?php
    while ($d) {
    	# code...
$i++;
    	?>
    	<?php $tr=$tr.'<td><img src="uploads/'.$eid.'/'.$d['photo'].'" width=30 height=20 />
    	</td>'; ?>
    	<?php
    	if($i==5)
    	{
    		
    		$tr=$tr.'</tr>';
    		$tr=$tr.'<tr>';

    	}
   $d=$query->fetch(); }
    $tr=$tr.'</tr></table>';
    echo $tr;
?>