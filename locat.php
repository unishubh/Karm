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


<style>

.merascroll {
   height: 450px;
   
   overflow: scroll;
   overflow-x: hidden;
}
.merascroll::-webkit-scrollbar {
    width: 8px;
}

.merascroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}

.merascroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

</style>



<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <?php 
include 'navbar.php' ;
?>

 <br><br>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><center><b> EVENT </b></center></div>
        <div class="panel-body">
          <center><b><p style="text-transform: uppercase";><?php echo $name; ?></p></b></center>
          <div class="center-align">
                <?php if($vid[0]!='<'){?>
                <iframe width="400" height="310"
src=<?php echo '"'.$vid.'"'; ?>>
</iframe>
                
              <?php }
              else
               echo '<img src='.$vid.'width="400" height="295"/>';?>  
                
              </div>
<?php
  

?>

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
              <button class="btn btn-primary btn-block" id="id" onclick="gotoev(<?php echo $event;?>,<?php echo $_SESSION['id'];?>)">Go to the event</button>
              <?php }
              else if((isset($_SESSION['id']))&&($_SESSION['id']==$adder))
              { ?>
              <a href="edit_event.php?event=<?php echo $event; ?>" <button class="btn btn-primary btn-block" ><i class="fa fa-pencil-square-o"></i>&nbsp;Edit your Event</button></a>
              <?php }
               else if (!isset($_SESSION['id']))
              { ?>
                  <button class="btn btn-primary btn-block" ><i class="fa fa-pencil-square-o"></i>&nbsp;Log in to Join Event</button>
              <?php }
             

               }
     else
               {
               echo ' <button class="btn btn-primary btn-block" >Thanks For Joining the event.</button>';
               }
               ?>
        </div>

       
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-default merascroll">
        <!-- Default panel contents -->
        <div class="panel-heading"><div class="fb-share-button" data-href="localhost/white/locate.php?event=<?php echo $eid; ?>" data-layout="button_count"></div></div>
        <div class="panel-body">
          <p><b>Event Description</b><hr><?php echo $de;?></p><br>
          <p><b>Social Impact</b><hr><?php echo $cause;?></p><br>
          <p><b>Event starting on</b><hr><?php echo $sd;?></p><br>
          <p><b>Event ending on</b><hr><?php echo $ed;?></p><br>
          
        </div>

        <!-- Table -->
        <table class="table">
        
        </table>
      </div>
    </div>
  </div>  
<script>
                function gotoev(eid,uid)
                {
                  document.getElementById("id").style.visibility="hidden";
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


            
                  console.log(xmlhttp.responseText);

               
              document.getElementById("al").innerHTML=xmlhttp.responseText;
              alert("You Successfully joined the event");



              } }
          
      
      xmlhttp.open("GET", "goto.php?eid="+eid+"&uid="+uid, true);
      xmlhttp.send();
}
                
                </script>      



  

<br><br>
  <div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-8">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><center><b>ATTENDANCE</center></b></div>
        <div class="panel-body">
          <p>  </p>
        </div>

        <!-- Table -->
        <table >
          
<tr>
<?php
$i=0;
$sql="SELECT uid,image,name FROM `going` JOIN `users` on going.uid = users.id WHERE going.eid='$event' LIMIT 10";
$query=$conn->prepare($sql);
 $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    while($d)
      {
        $t='view.php?id='.$d["uid"];
        ?>
        <td>
        <a href="<?php echo $t;?>"><img src="<?php echo $d['image'];?>" height=75 width=75 /></td></a>
        <?php
        $i++;
        if($i==5){
          $i=0;
          echo '</tr><tr>';
        }
        $d=$query->fetch();}
        ?>
        </tr>
        
        </table>
      </div>
    </div>




  </div>
  <br><br>
  <!-- fb plugin comment box -->
  
  <center><h3>Comments</h3></center><hr>
  
  <div class="row">
  <div class="col-md-2"></div>
  <div class="fb-comments" data-href="https://aasf.in/white/locate.php?event=<?php echo $event; ?>" data-numposts="15"></div>

</div>


<!--   PURANA COMMENT
 
<div class="span8">
     <div class="left-align">
    <div class="center-align"><h2>Comments</h2></div>
    
   
      <?php 
    $sql="SELECT image,users.name AS uname,comment FROM users JOIN comment ON users.id=uid WHERE eid='$event'";
    $query=$conn->prepare($sql);
     $query->execute();
        $query->execute(array(':name' => "Jimbo"));
        $d=$query->fetch();
        while($d)
        {
      ?>
    <div id="boxx">
  <div id="imgc" ><img src="<?echo $d['image'];?>" width=50 height=50/></div>
  <div id="details"><?php echo $d['comment'];?></div>
  </div>
  <?php $d=$query->fetch();
  echo '<br>';
  }  ?>
    </div>
    </div>
    
  
    <div class="span8">
    <form method="POST" action="comment.php" enctype="multipart/form-data">
    
    <textarea rows="3" cols="0" name="comment" id="comm" style="width:100%; height:5%;"></textarea>
   <input id="text" type="submit" name="submit" value="Comment" />
   <input type="hidden" name="eid" value="<?php echo $event; ?>" />
   <input type="file" name="pic" id="pic" />
   </form>
    </div>


-->

<!-- </div> -->
</body>


</html>