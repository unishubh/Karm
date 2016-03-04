<?php 
session_start();
include 'connect.php';

$event=$_GET['event'];
$q="SELECT * FROM event WHERE eid='$event'";
 $query=$conn->prepare($q);
 $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    $vid=$d['url'];
    $cause=$d['cause'];
    $name=$d['name'];
    $de=$d['description'];
    $sd=date('d/m/Y',strtotime($d['sdate']));
   $ed=date('d/m/Y',strtotime($d['edate']));
   $st = $d['stime'];
   $et = $d['etime'];
   $loca = $d['location'];
   $ad = $d['addr'];
    $adder=$d['uid'];
    $eid=$d['eid'];
    $q="SELECT name FROM users WHERE id='$adder'";
    $query=$conn->prepare($q);
 $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    $nam=$d['name'];
    ?>
<?php 
include 'header.php' ;
?>


          <?php 
include 'navbar.php' ;
?>
  <style>
  .img-responsive{
    height: 370px;
  }

  </style>

  <body>


            <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0]
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

   
    <div>  

      <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-7">
      <div class="jumbotron" style="padding:0px; border-bottom:  3px solid rgb(189, 193, 203); height: 500px; background-color: #f3f3f9;">

        <h2 style="padding: 12px; padding-bottom: 1px; text-align: left; color: rgb(51, 51, 51); "><?php echo $name; ?></h2>
       <div style="padding: 12px; padding-top: 1px"><div class="fb-share-button" data-href="aasf.in/white/locate.php?event=<?php echo $eid; ?>" data-layout="button_count"></div>
       <br>
       </div>
       <?php
        if($vid[0]!='e')
       {
       ?>
       <iframe  src="<?php echo $vid; ?>"  height="370px" width="770px" style="padding:10px;"></iframe>
       <?php
       }
       else 
       {
       ?>
       <img class="img-responsive" src="<?php echo $vid; ?>" height="370px" width="770px" style="padding:10px;"/>
       <?php
       }
       ?>
       
      </div>
      </div>
      <!-- <div class="col-md-1"></div> -->
      <div class="col-md-3">
      <div class="jumbotron" style="padding:0px; border-bottom:  3px solid rgb(189, 193, 203); height: 280px; background-color: #f3f3f9;">

        
        <p style="padding: 12px; padding-top: 20px; text-align: left; font-size: 16px;"><i class="fa fa-calendar" ></i> &nbsp;<b><?php echo $sd;?> to <?php echo $ed;?></b></p>
        
        <p style="padding: 12px; text-align: left; font-size: 16px;"><i class="fa fa-clock-o"></i>
&nbsp; <b><?php echo $st;?> to <?php echo $et;?></b></p>
        
        <p style="padding: 12px; text-align: left; font-size: 16px;"><i class="fa fa-map-marker"></i>
 &nbsp; <b><?php echo $loca;?></b></p>
        
        
        <!-- join button -->
        <div style="padding: 12px; padding-top: 15px; ">
        <?php 
              if(isset($_SESSION['id'])){
              $sid=$_SESSION['id'];}
            else {$sid=-1;}
                $q="SELECT * FROM going WHERE eid='$event' AND uid='$sid'";
                $query=$conn->prepare($q);
         $query->execute();
            $query->execute(array(':name' => "Jimbo"));
            $d=$query->fetch();
            if(!($d))
            {
              if((isset($_SESSION['id']))&&($_SESSION['id']!=$adder)){  ?>
              <div id="goto" ><button class="centered btn btn-block btn-lg btn-primary" style="color: white;" id="id" onclick="gotoev(<?php echo $event;?>,<?php echo $_SESSION['id'];?>)">Go to the event</button></div>
              <?php }
              else if((isset($_SESSION['id']))&&($_SESSION['id']==$adder))
              { ?>
              <a href="edit_event.php?event=<?php echo $event; ?>" style="color: white;" <button class="btn btn-primary btn-block" ><i class="fa fa-pencil-square-o"></i>&nbsp;Edit your Event</button></a>
              <?php }
               else if (!isset($_SESSION['id']))
              { ?>
                  <button class="centered btn btn-block btn-lg btn-primary" style="color: white;" ><i class="fa fa-pencil-square-o"></i>&nbsp;Log in to Join Event</button>
              <?php }
             

               }
     else
               {
               echo ' <center><p style="color: green; font-size: 15px;"><b>Thanks For Joining the event.</b></p></center>';
               }
               ?>

               </div>

        <!-- end join button -->



       <!-- <div style="padding: 12px; padding-top: 15px; "><center><a class="centered btn btn-block btn-lg btn-primary" style="color: white;" href="#" role="button"><i class="fa fa-user-plus"></i>
&nbsp;Join Event</a></center> 
       
       </div> -->
       
      </div>

      <div class="jumbotron" style="padding:0px; border-bottom:  3px solid rgb(189, 193, 203); height: 50px; background-color: #f3f3f9;">

        <!--<h4 style="padding: 12px; text-align: left"><i class="fa fa-heart"></i>

 &nbsp; 35 people are going  </h4>-->

       
       </div>
       
      </div>
      </div>

      </div>


      <div class="row">
      <div class="col-md-1"></div>
       <div class="col-md-7 container">
      <div class="jumbotron" style="padding:0px; border-bottom:  3px solid rgb(189, 193, 203); height: auto; background-color: #f3f3f9;">

        <h3 style="padding: 12px; text-align: left; color: rgb(51, 51, 51); font-family: Lucida Sans Unicode"><b>Details</b></h3>
       
        <p style="padding: 12px; font-size: 22px; text-align: left; color: rgb(51, 51, 51); border-bottom: 2px solid rgb(0, 175, 239);">About Event</p>
        <div>
        <p style="padding-left: 10px; padding-right: 10px; font-size: 18px;"><?php echo $de;?></p>
        
        </div>
        <p style="padding: 12px; font-size: 22px; text-align: left; color: rgb(51, 51, 51);  border-bottom: 2px solid rgb(0, 175, 239);">Social Impact</p>
        <p style="padding-left: 10px; padding-right: 10px; font-size: 18px;"><?php echo $cause;?></p>
        <p style="padding: 12px; font-size: 22px; text-align: left; color: rgb(51, 51, 51);  border-bottom: 2px solid rgb(0, 175, 239);">Contact</p>
        <?php 
        $q="SELECT * FROM users where id='$adder'";
         $query=$conn->prepare($q);
         $query->execute();
            $query->execute(array(':name' => "Jimbo"));
            $d=$query->fetch();
            ?>
        <p style="padding-left: 10px; padding-right: 10px; font-size: 18px;"><?php echo $d['name']; ?> </p>

       
      </div>
      </div>
      

      </div>
      <br>
      
      
      <h2  style="padding: 20px; padding-left: 100px;">Comments</h2><hr>
      

      <div class="row">
      <div class="col-md-1"></div>
      <div class="fb-comments" data-href="https://aasf.in/white/locate.php?event=<?php echo $event; ?>" data-numposts="15"></div>

        </div>


    </div>  
    
<br>

<?php 
include 'footer.php' ;
?>



<script>
                function gotoev(eid,uid)
                {
                  console.log(eid);
                  console.log(uid);
                  if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
          }
          else {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.onreadystatechange = function () {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


            document.getElementById("goto").innerHTML=xmlhttp.responseText;
                  console.log(xmlhttp.responseText);

               
              //document.getElementById("al").innerHTML=xmlhttp.responseText;



              } }
          
      
      xmlhttp.open("GET", "goto.php?eid="+eid+"&uid="+uid, true);
      xmlhttp.send();
}
                
</script>      



  </body>
</html>
