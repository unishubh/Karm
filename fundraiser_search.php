<div class="container">
          <div class="page-header">
            <h2><center>Fundraisers Results</center></h2>
          </div>
          <div class="row-fluid">
            <table class="thumbnails">
            <tr>
           <?php
//session_start();
//include 'connect.php';
//echo"andarr";
if(isset($_POST['search']))
{
	//echo"andar";
	$s=$_POST['search'];
	$query="SELECT collected,amount,url,id,description,name,adder,cause FROM fundraiser WHERE name LIKE '%$s%' OR cause LIKE '%$s%' OR adder LIKE '%$s%'";
	//$query = sprintf("SELECT name,adder FROM fundraiser WHERE name LIKE '%s%%'",
      //         mysql_real_escape_string($s));
		$q=$conn->prepare($query);
		
			//echo"andar";
	$q->execute();
	$q->execute(array(':name' => "Jimbo"));
	$i=0;$k=0;
	if(!$d=$q->fetch())
		echo '<script>alert("Sorry No results found");history.go(-1);</script>';
	else
	{
	while($d)
	{
		
		$vid=$d['url'];
		//  echo $vid;
		if($i==3)
		{
			echo '<tr></tr>';
			$i=0;
		}
    $i++;
    $k++;
	
	?>
      
              <td class="span4">
                <div class="thumbnail">
                  <!--<img src="img/placeholder-360x200.jpg" alt="product name">-->
                  <iframe width="360" height="200"
src=<?php echo '"'.$vid.'"'; ?>>
</iframe>
                  <div class="caption">
                    <h3><?php echo $d['name']; ?></h3>
                    <p>
                      <?php $s=substr($d['description'], 0,100); 
                      $s.='...';
                      echo $s; 
                      $ty=$d['id'];?>
                    </p>
                  </div>
                  <div class="widget-footer">
                    <p>
                      <a href="#" class="btn btn-primary">Donate</a>&nbsp;
                      <a href="<?php echo 'event.php?event='.$ty;?>" class="btn">Read more</a>
                    </p>
                  </div>
                  <div id="<?php echo'progressbar'.$k;?>">
  <div>
                </div>
</div>
</div>
<style>
#progressbar<?php echo $k;?> {
  background-color: black;
  border-radius: 13px; /* (height of inner div) / 2 + padding */
  padding: 3px;
}

#progressbar<?php echo $k;?> > div {
   background-color: orange;
   width: <?php 
   $s=($d['collected']/$d['amount'])*100; echo $s.'%';?>; /* Adjust with JavaScript */
   height: 20px;
   border-radius: 10px;
}
</style>
              </td>
              <?php
              $d=$q->fetch();
          }
             } }?>
       
              
            </table>
          </div>
    
      <!-- End: PRODUCT LIST -->
    </div>-->