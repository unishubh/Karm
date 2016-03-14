<?php

session_start();
include 'header.php' ;
include 'navbar.php' ;
$n=$_GET['event'];
$query="SELECT * FROM event WHERE eid='$n'";
$q=$conn->prepare($query);
$q->execute();
    $q->execute(array(':name' => "Jimbo"));
    $d=$q->fetch();
    $vid=$d['url'];
    $cause=$d['cause'];
   // echo $cause;
    $name=$d['name'];
    $de=$d['description'];
    $sd=date('d/m/Y',strtotime($d['sdate']));
   $ed=date('d/m/Y',strtotime($d['edate']));
    $adder=$d['uid'];


 ?>
 <?php 
 if($_SESSION['id']!=$adder)
 {
 echo '<script>alert("You are not allowed to visit this page");</script>';
 
 }  ?>






<link rel="stylesheet" type="text/css" href="dtp/jquery.datetimepicker.css"/ >
<script src="dtp/jquery.js"></script>
<script src="dtp/build/jquery.datetimepicker.full.min.js"></script>


<style>
  .modal-header, h4, .close {
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
            <i class="fa fa-pencil-square-o"><h4> Edit Event</h4></i>

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
              <input type="text" name="name" class="form-control" id="tit" value="<?php echo $name; ?>">
            </div>

            <div class="form-group">
              <label for="desc"> Description </label>
              <textarea class="form-control" name="description" id="desc" rows="5" value="<?php echo $de; ?>"> <?php echo $de; ?>`</textarea>
            </div>

            <div class="form-group">
              <label for="soc">Social Impact<sup><font color="red">*</font></sup></label>
              <textarea  class="form-control" name="cause" id="soc" rows="5" value="<?php echo $cause; ?>"><?php echo $cause; ?> </textarea>
            </div>
            
           <div class="row">
            <div class="col-xs-6">

           <div class="form-group">
            <label for="sd"> Start Date<sup><font color="red">*</font></sup></label>
                   
            <input type="text" name="sdate" id="sd" value="<?php echo $sd; ?>"/>
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
          
	 <input type="text" name="edate" id="ed" width="2px" value="<?php echo $ed; ?>"/>
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
          
			 <div class="row">
			 <div class="col-md-5">
          <button name="submit" type="submit" class="btn btn-success btn-block"><i class="fa fa-floppy-o"></i>
SAVE EVENT</button>
          	</div><div class="col-md-1"></div>
          	<div class="col-md-5">
        <a href="delete.php?event=<?php echo $n; ?>"  <button name="submit" type="submit" class="btn btn-default btn-block" style="background-color: rgb(212, 44, 44); color: #fff;"><i class="fa fa-times"></i>
DELETE EVENT</button> </a>     
            </div>
            </div>
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
if(isset($_POST['submit']))
{
	$n=$_POST['n'];
	$d=$_POST['d'];
	$c=$_POST['c'];

	$sd=$_POST['sdate'];
	$ed=$_POST['edate'];
	$query="UPDATE event SET name='$n', description ='$d',cause='$c',sdate='$sd',edate='$ed' WHERE eid='$n'";
	$q=$conn->prepare($query);
	$q->execute();
  echo'<script>alert("Changes Done");
  window.href.location="locate.php?event='.$eid.'";</script>'; 
}

?>
