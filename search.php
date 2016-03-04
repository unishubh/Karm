<?php 
session_start();
include 'header.php' ;
?>
<body>


<style>
td{
  margin:5px 5px 5px 5px;
}

.imgs{
width:225px;
height:175px;
}
</style>

		<?php 
include 'navbar.php' ;
?>


          <div class="page-header">
            <h2><center>Event Results</center></h2>
          </div>
          <table class="thumbnails">
<tr>
          <?php


if(isset($_GET['search']))
{
  //echo"andar";
  $s=$_GET['search'];
  if(isset($_GET['city']))
  $c=$_GET['city'];
  else
  $c="NA";
  //echo $c;
  if($c=="NA"){
             $equery="SELECT url,eid,description,name,uid,cause,location FROM event WHERE name LIKE '%$s%' OR cause LIKE '%$s%'";
    //         echo $equery;
             $eq=$conn->prepare($equery);
    }
    else
    {
      
       $equery="SELECT url,eid,description,name,uid,cause,location FROM event WHERE (name LIKE '%$s%' OR cause LIKE '%$s%') AND location='$c'";
      // echo $equery;
        $eq=$conn->prepare($equery);   
    }
   // echo $equery;
  $eq->execute();
  $eq->execute(array(':name' => "Jimbo"));
  $i=0;
  try{
  if(!$ed=$eq->fetch())
    echo '<script>alert("Sorry No events found");
  history.go(-1);</script>';
  else
  {
  while($ed)
    {
      if($i==3)
    { ?>
      </tr><tr>

      <?php 
      $i=0;
    }
    ?>
    <td>
    <?php
    $vid=$ed['url'];
    //echo $vid;
    
    $i++;
    
  
  
       
              ?>
          
       	<div >
  				<div>
  					<div class="col-lg-4">
   					 <div>
      						<?php if($vid[0]=='<')
                {
                ?>
                  <?php echo '<img src="'.$vid.'"width="360" height="210">'; ?>
                  
                  <?php }
                  else { ?>
                  <iframe
src=<?php echo '"'.$vid.'"'; ?>>
</iframe>  <?php } ?>
      						<div class="caption">
	                    		<h3><?php echo $ed['name']; ?></h3>
	                    		<p>
	                     		 <?php $s=substr($ed['description'], 0,10); 
                      $s.='...';
                      echo $s; 
                      $ty=$ed['eid'];?>
	                    		</p>
                  			</div>
    				</div>

    				<div class="widget-footer">
                    <p>
                      <a href="<?php echo 'locate.php?event='.$ty;?>" class="btn btn-success">Read More</a>
                     
                    </p>
                  </div>
  				</div>
  
     		 </div>
    	</div>

       <?php
              $ed=$eq->fetch();?>

              </td>
              

              <?php 
          }
             } }catch(PDOException $e){
             echo $e;}}

             ?>

             </tr>
             </table>
             </body>

  	
