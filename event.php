<?php 
include 'header.php' ;
session_start();
?>
<body>

<?php 
include 'navbar.php' ;
?>


<link rel="stylesheet" type="text/css" href="dtp/jquery.datetimepicker.css"/ >
<script src="dtp/jquery.js"></script>
<script src="dtp/build/jquery.datetimepicker.full.min.js"></script>


<style>
  .modal-header, .abc, .close {
      background-color: #11b9f6;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }





  </style>





<style>
#nstatus {
color:red;
}
</style>

<!-- Modal -->
  <div>
        <!-- Modal content-->
        <div class="modal-content">

           <div class="modal-header" style="padding:35px 50px;">
            <h4 class="abc"> CREATE YOUR EVENT</h4>
           </div>
          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" action="" method="post" enctype="multipart/form-data" onsubmit="return(validate());">
            <div class="row">
            <div class="col-md-3"></div>
             <div class="col-md-6">
             <div class="row">
             <div class="col-md-1"></div>
             <div class="col-md-9">
            <div class="form-group">
              <label for="tit">Title  <sup><font color="red">*</font></sup> </label>
              <input type="text" name="name" class="form-control" id="tit" placeholder="Enter the name of event">
            </div>

            <div class="form-group">
              <label for="desc"> Description </label>
              <textarea class="form-control" name="description" id="desc" rows="5"> </textarea>
            </div>

            <div class="form-group">
              <label for="soc">Social Impact<sup><font color="red">*</font></sup></label>
              <textarea  class="form-control" name="cause" id="soc" rows="5"> </textarea>
            </div>
            
           <div class="row">
            <div class="col-xs-6">

           <div class="form-group">
            <label for="sd"> Start Date<sup><font color="red">*</font></sup></label>
                   
            <input type="text" name="sdate" id="sd" placeholder="Y-m-d"/>
          <script>
		jQuery.datetimepicker.setLocale('de');
		
		jQuery('#sd').datetimepicker({
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Tu", "We", 
		    "Th", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'Y-m-d'
		});
	  </script>
	  
            </div>
                 
             </div>
	  
	 <div class="col-xs-6">

	<div class="form-group">
	

          
          <label for="ed"> End Date<sup><font color="red">*</font></sup></label>
          
	 <input type="text" name="edate" id="ed" width="2px" placeholder="Y-m-d"/>
          <script>
		jQuery.datetimepicker.setLocale('de');
		
		jQuery('#ed').datetimepicker({
		 i18n:{
		  de:{
		   months:[
		    'January','February','March','April',
		    'May','June','July','August',
		    'September','October','November','December',
		   ],
		   dayOfWeek:[
		    "So.", "Mo", "Tu", "We", 
		    "Th", "Fr", "Sa.",
		   ]
		  }
		 },
		 timepicker:false,
		 format:'Y-m-d'
		});
	  </script>
              </div>  
            </div>
         </div>
         
         <div class="row">
         <div class="col-xs-6">
         
	<div class="form-group">
	
           
             <label for="soc">Start Time<sup><font color="red">*</font></sup></label>
             <input type="text" name="stime" id="st" width="2px" placeholder="HH:mm"/>
             
             
              <script>
		            jQuery('#st').datetimepicker({
		  datepicker:false,
		  format:'H:i'
		});
	      </script>
              
        </div>
        </div>
           
		
	<div class="col-xs-6">		
		
	<div class="form-group">
	
           
	   <label for="soc">End Time<sup><font color="red">*</font></sup></label>
	   <input type="text" name="etime" id="et" width="2px" placeholder="HH:mm"/>
	  	 
	  	 <script>
		  jQuery('#et').datetimepicker({
		  datepicker:false,
		  format:'H:i'
			});
		</script>
	  	 
	</div>
	 </div>
	 </div>
	 
	


	<div class="form-group">
        <label for="av"> I want to upload</label>
        &nbsp;
            <script>
		function selector(val)
		{
		 // console.log("in");
		  if(val.localeCompare('image')==0)
		  {
		    console.log("in");
		  document.getElementById("video").style.display="none";
		}  else{
		  console.log("out");
		    document.getElementById("image").style.display="none";}
		  document.getElementById(val).style.display="block";
		}
		function validate()
		{
		  var s=document.getElementById("opt").value;
		  if(s=='NA')
		  {
		    alert("Please select an option to upload");
		    return false;
		  }
		  else
		  {
		    return true;
		  }
		}
	    </script>

<input class="" id="opt" type="radio" name="opt" value="video" onclick="selector(this.value)" style=" -webkit-appearance: radio; border:none;width:auto;height:auto;visibility:visible;" /> Video &nbsp; &nbsp;
<input style=" -webkit-appearance: radio; border:none;width:auto;height:auto;visibility:visible;" class="" id="opt" type="radio" name="opt" value="image" onclick="selector(this.value)"/> Image
<div class=""  id="video" style='display:none;'>

<!-- Video link: -->

<input type="text" name="link" placeholder="Video link" id="link" class="form-control" />

</div>


<div id="image" class="" style='display:none;'>
 

<input style="" type="file" name="photo" class="form-control btn btn-sm btn-default" id="photo"/>
</div>

<!--
</select>  -->
			
</div>


            <div class="form-group">
            <label for="city">City<sup><font color="red">*</font></sup></label>
            <select name="location"  id="city" class="form-control input-sm">
			    				<option value="NA">Please select a city</option>
			    				 <?php
          include 'cities.php';
          while($city)
          {
            ?>

            <option value="<?php echo $city['district'];?>"><?php echo $city['district']; ?></option>
            <?php
          
          $city=$sql->fetch();
        }
          ?>
			    				</select>
			    				<br>
			    				<div class="form-group">
              <label for="locat">Address  <sup><font color="red">*</font></sup> </label>
              <input type="text" name="addr" class="form-control" id="addr" placeholder="Address">
            </div>


                  <br><br>
          <button name="submit12" type="submit" class="btn btn-success btn-block"><i class="fa fa-case"></i> CREATE YOUR EVENT</button>
                
            
			</div>
      

               
              
            
      </div>

            <!-- <div class="form-group">
              <label for="dp"><i class="fa fa-lock"></i>Profile Pic</label>
            <input type="file" class="form-control" name="dp" id="dp"/>
            </div> -->
            </div></div>
          </form>

        </div>
      
      </div>
      </div>

  </div> 


<?php 
include 'footer.php' ;
?>




<!-- </div> -->
</body>
</html>
<?php
if(!isset($_SESSION['id']))
{
  echo '<script>alert("Please Log in to continue");
  history.go(-1);</script>';
}
if(isset($_POST['submit12']))
{
/* echo $_POST['emonth']."/".$_POST['edate']."/". $_POST['eyear'];
  
  $sda=$_POST['sdate'].'-'.$_POST['smonth'].'-'.$_POST['syear'];

  $sd=date('Y-m-d',strtotime($sda));
  $eda=$_POST['edate'].'-'.$_POST['emonth'].'-'.$_POST['eyear'];
  $ed=date('Y-m-d',strtotime($eda));*/
  //echo $sd;
  //echo '<br>'.$ed;
  $sdate=$_POST['sdate'];
  echo $_POST['sdate'];
  $edate=$_POST['edate'];
  $stime=$_POST['stime'];
  $etime=$_POST['etime'];
$add=$_POST['addr'];
  $location=$_POST['location'];
$n=$_POST['name'];
$c=$_POST['cause'];
if($_POST['opt']=='video'){
$l=$_POST['link'];
preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$l,$matches);
$l=$matches[1];
$l='http://www.youtube.com/embed/'.$l;
if(!isset($matches[1]))
{
echo '<script>alert("The youtube link is not valid");
history.go(-1);</script>';
//$a=$_POST['amnt'];/
}}
else
{
  if(isset($_FILES['photo']))
  {
    $dir='events/';
    $img_name=$_FILES['photo']['name'];
    $t=$_FILES['photo']['type'];
    if(($t=="image/gif"||$t=="image/png"||$t="image/jpeg")&&($_FILES['photo']['size']>15000))
    {
      if($_FILES['photo']['error']>0)
  {
    echo '<script>alert("You are going wrong");</script>';
  }
  else{
    $i=1;
    $success=false;
    $new_img_name=$img_name;
    while(!$success)
    {
      if(file_exists($dir.$new_img_name))
      {
        $i++;
        $new_img_name=$i.$new_img_name;
      }
      else
      {
        $success=true;

      }
    }
    move_uploaded_file($_FILES['photo']['tmp_name'], $dir.$new_img_name);
    $l=$dir.$new_img_name;
    //echo '<script>alert('.$l.');</script>';
    }
  }
}
}


$lo=$_POST['location'];
$d=$_POST['description'];
//$ngo=$_POST['ngo'];
$adder=$_SESSION['id'];
try{
$sql="INSERT INTO event (uid,name,cause,ngo,description,url,sdate,edate,location,address,stime,etime) VALUES (:adder,:n,:c,:ngo,:d,:l,:sdate,:edate,:lo,:add,:stime,:etime)";

$query=$conn->prepare($sql);
$query->bindParam(':adder',$adder);
$query->bindParam(':n',$n);
$query->bindParam(':c',$c);
$query->bindParam(':ngo',$ngo);
$query->bindParam(':d',$d);
$query->bindParam(':l',$l);
$query->bindParam(':sdate',$sdate);
$query->bindParam(':edate',$edate);
$query->bindParam(':lo',$lo);
$query->bindParam(':add',$add);
$query->bindParam(':stime',$stime);
$query->bindParam(':etime',$etime);
$query->execute();
}
catch(PDOException $e)
{
echo $e;
}
$sql="INSERT INTO eactivity (eid,uid,creator) SELECT eid,'$adder',1 FROM event WHERE name='$n'";
$query=$conn->prepare($sql);
$query->execute();

$sql="UPDATE districts set hits=hits +1 WHERE district='$lo'";

$query=$conn->prepare($sql);
$query->execute();
$sql="SELECT eid FROM event ORDER BY eid DESC LIMIT 1";
$query=$conn->prepare($sql);
$query->execute();
$query->execute(array(':name' => "Jimbo"));
$d=$query->fetch();
$f=$d['eid'];
echo $f;
echo "<script>alert('Added');
console.log('a');
window.location.href='locate.php?event=".$f."';
</script>";
//echo "<script>alert('Added');</script>";
}
?>
