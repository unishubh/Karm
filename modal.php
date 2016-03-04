
<?php
//session_start();
?><html>
<head>
<style>
.modalDialog{
	position:fixed;
	font-family:Arial,comic sans ms,sans-serif;
	top:15%;
	bottom:0;
	left:0;
	right:0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition:400ms ease-in;
	pointer-events:none;
	text-decoration: none;
}
.modalDialog:target{
	opacity: 1;
	pointer-events:auto;
}
.modalDialog > div{
	width:400px;
	position: relative;
	top:0;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff,#999);
	background: -webkit-linear-gradient(#fff,#999);
	background: -o-linear-gradient(#fff,#999);
}
.close{
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right:-12px;
	text-align: center;
	top:-10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
}
}
#marg
{
	border-color: black;
	border-spacing: 2px;

}
</style>
</head>
<body>


<div id="openModal" class="modalDialog">
<div>
<div id="mar">
<a href="#close" title="Close" class="close">X</a>
<h2>Search Results</h2>
<?php
//session_start();
include 'connect.php';
//echo"andarr";
if(isset($_POST['search']))
{
	//echo"andar";
	$s=$_POST['search'];
	$query="SELECT id,name,adder,cause FROM fundraiser WHERE name LIKE '%$s%' OR cause LIKE '%$s%' OR adder LIKE '%$s%'";
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
		echo '<a href="event.php?event='.$d['id'].'">'.$d['name'].'</a>';
		?>

		</td>
		<td>By<?php echo $d['adder'];?></td>
		<td> For &nbsp; <?php echo $d['cause'];?></td>
		</tr>
		<?php
		$d=$q->fetch();
	}
	echo '</table>';
   	}}
   	catch(PDOException $e){
   		echo $e; 
   	}
	}
	?>
</div>
</div>
</div>
</body>
</html>
