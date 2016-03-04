<?php 
session_start();
include 'header.php' ;
$id=$_SESSION['id'];
//echo $_SESSION['id'];
?>


<body onload="nf()">
    
        <?php 
include 'navbar.php' ;
?>
    
    <style>

    input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

    #profile-wrap .tabs-bar .nav-tabs li.active{
        border-bottom:3px solid #11b9f6;


     .mericlass{
        font-family: 'Gotham Narrow SSm A', 'Gotham Narrow SSm B';
font-weight: 400;
font-style: normal;
font-size: 16px;
color: #333;
display: inline-block;

     }   
    }
    #ui
    {
        position:relative;

        left:11%;
        border:none;
        background-color: transparent;
    }
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

    </style>   


        <section class='section_2' id="profile-wrap">
                       <!-- profile header starts here -->
            <div class="row-fluid profile-header" style="background-color: #11b9f6;">
                <div class="profile-container">
                    <div class="col-md-8 col-sm-12 profile-detail">
                        
                        <div class="col-xs-12 col-md-4" id='searchHeader'>
<br>
                            <img class="img-responsive img-circle" style="height: 170px; width: 170px; border: 3px solid white;" src="<?php echo $_SESSION['image'];?>" alt="">  
                                
                            
                          
                            <!-- File upload-->
                            <form method="Post" action="pu.php" id="mf" enctype="multipart/form-data">
                            <div class="fileUpload btn btn-primary">
    <span><i class="fa fa-upload"></i> &nbsp; Upload image</span>
    <input type="file" name="pie" class="upload" onchange="fn()" />
</div>
</form>
<script>
function fn()
{
  document.getElementById("mf").submit();
}
</script>
<!--end-->


                        </div>
                       


                        <div class="col-xs-12 col-md-8 profile-info" id="profileInfo">
                            <h1><?php echo $_SESSION['name']; ?></h1>
                                                        <h3 style="line-height:30px;">&nbsp; <?php echo ' '.$_SESSION['work'];?></h3>
                                                        <h5></h5>
                            
                        </div>
                    </div>
                   
                    
                   
                    
                </div>
            </div>
            <!-- End profile header -->
            <div class="row">
                <div class="profile-tabs-wrap">
                    <div role="tabpanel">
                      <!-- Nav tabs -->
                      <div class="tabs-bar edit-tabs" >
                          <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"  >
                                <a href="#newsfeed" onclick="nf()" aria-controls="activity" role="tab" data-toggle="tab">
                                    <span>Events</span>
                                </a></li>
                                <li role="presentation">
                                  <a href="#about"  onclick="abt();"  aria-controls="attendies" role="tab" data-toggle="tab">
                                      <span>News Feed</span>
                                  </a>
                              </li>
                              <li role="presentation">
                                  <a href="#edit"  onclick="edt()"  aria-controls="tickets" role="tab" data-toggle="tab">
                                        <span>Edit Profile</span>
                                  </a>
                              </li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="newsfeed">
                            <div class="container">
         
          <div class="page-header">
            <h2>Top Events</h2>
          </div>
          <div class="row-fluid" >
            <table class="thumbnails" >
    <tr style="padding: 10px;">
              <?php
            $q="SELECT users.name AS uname,event.name AS fname,eid,cause,ngo,description,url,location,sdate,edate FROM users JOIN event ON users.id=uid ORDER BY eid DESC LIMIT 6 ";
           $query=$conn->prepare($q);
          $i=0;
            $query->execute();
              $query->execute(array(':name' => "Jimbo"));
              $d=$query->fetch();
              while($d)
              {
          if($i==3){
          echo '</tr><tr>';
          $i=0;
          }
          $i++;
            $vid=$d['url'];
            $ty=$d['eid'];
                 ?>
              <td class="span4" style="padding: 10px;">
            
               
                <div class="thumbnail" id = "amon" >
                  
                  <!--<img src="img/placeholder-360x200.jpg" alt="product name">-->
                   <?php
        if($vid[0]!='e')
       {
       ?>
       <iframe src="<?php echo $vid; ?>" style="height: 230px; width:100%" ></iframe>
       <?php
       }
       else
       {
       ?>
                  <img scrolling="no" style="height: 230px; width:100%"
      src=<?php echo $vid; ?>>
      
      <?php 
      }
      ?>


          <a href="<?php echo 'locate.php?event='.$ty;?>">
                  <div class="caption">
                    <h3><?php echo $d['fname']; ?></h3>
                    <b style="font-size: 14px;">
                      <?php 
                      
                      echo $d['sdate'].' to '.$d['sdate'];

                      ?>
                      </b>
                  </div>
                  <div class="widget-footer">
                   

                  </div>
                 </a>
                </div>
                
     
              </td>
              <?php
              $d=$query->fetch();
            }
               ?>
    </tr>
               </table>
               </div>
               </div>                      
                        </div>
                        <div role="tabpanel" class="tab-pane" id="about">
                       <div style="font-family: 'Gotham Narrow SSm A', 'Gotham Narrow SSm B';
                                font-weight: 500;
                                font-style: normal;
                                font-size: 18px;
                                color: #999;
                                margin-bottom: 20px;
                                padding: 0 15px;">
                        <h2>Profile</h2></div><br>
                          <div class="mericlass">


                           <div class="row">
                           <div class="col-md-6">
                           <?php
                             // echo '1';
                              $q="SELECT users.name,tr.name,tr.creator FROM `users` JOIN (SELECT eactivity.creator,eactivity.eid AS `eeid`,eactivity.uid AS `euid`,event.name,event.eid,event.uid FROM `eactivity` JOIN `event`  ON  event.eid=eactivity.eid) AS tr ON users.id=tr.euid WHERE users.id='$id' LIMIT 6 ";
                            // echo $id;
                              //echo $q;

                              $query=$conn->prepare($q);
                            $query->execute();
                              $query->execute(array(':name' => "Jimbo"));
                              $d=$query->fetch();
                              while($d)
                              {
                                //echo '1';
                          if($d['creator']==0)
                                    echo '<a href="#" class="list-group-item"><i class="fa fa-arrow-circle-right"></i>&nbsp;
            '.$_SESSION["name"].' is going to '.$d["name"].'</a><br>'; 
                                  else 
                                    echo '<a href="#" class="list-group-item"><i class="fa fa-arrow-circle-right"></i>&nbsp;
            '.$_SESSION["name"]. ' created the event '.$d["name"]. '</a><br>';
                                  $d=$query->fetch();?>
                                  <?php   }
                            ?>
                            </div>
                            </div>



                            
                           <!-- <b>Full Name: <?php echo $_SESSION['name']; ?></b> <br><br>
                            <b>Age: <?php echo $_SESSION['age']; ?></b> <br><br>
                            <b>Gender: <?php echo $_SESSION['sex']; ?></b> <br><br>
                            <b>Email id: <?php echo $_SESSION['email']; ?></b> <br><br>
                            <b>Address: <?php echo $_SESSION['city']; ?></b> <br><br>-->
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane mericlass" id="edit">

                        <form method="post" action=" " role="form">

                            <div class="form-group row" style="padding: 10px 0px">
                            
                            <span class=" col-md-1">Name</span>
                            <span class="col-md-5">
                                <input type="text" id="" name="name" value="<?php echo $_SESSION['name']; ?>" class="form-control" placeholder="<?php echo $_SESSION['name']; ?>">
                            </span>
                            
                            </div>
                           
                            <div class="form-group row" style="padding: 10px 0px">
                            
                            <span class="col-md-1">
                                Age
                                </span>
                                <span class="col-md-5">
                                <input type="number" id="" name="age" value="<?php echo $_SESSION['age']; ?>" class="form-control" placeholder="<?php echo $_SESSION['age']; ?>">
                            </span>
                            
                            </div>
                            
                            <div class="form-group row" style="padding: 10px 0px">
                            <span class="col-md-1">
                                Work
                                </span>
                                <span class="col-md-5">
                                <input type="text" id="" name="work" value="<?php echo $_SESSION['work']; ?>" class="form-control" placeholder="<?php echo $_SESSION['work']; ?>">
                            </span>
                            </div>

                            <div class="form-group row" style="padding: 10px 0px">
                            <span class="col-md-1">
                                City
                                </span>
                                <span class="col-md-5">
                                <input type="text" id="" name="city" value="<?php echo $_SESSION['city']; ?>" class="form-control" placeholder="<?php echo $_SESSION['city']; ?>">
                            </span>
                            </div>

                            <div class="form-group row" style="padding: 10px 0px">
                            <span class="col-md-1">
                                Email
                                </span>
                                <span class="col-md-5">
                                <input type="email" id="" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" placeholder="New Email">
                            </span>
                            </div>

                            <br>
                            <div class="row">
                            <div class="col-md-3"></div>
                            
                            <div class="col-md-2">
                            <input class="btn btn-primary btn-lg text-center" type= "submit" name="submitre" value="Submit" />
                            </div>
                            </div>
                            </form> 



                                                <!-- <form method="post" action=" "> 
                                                Name: <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" >
                                                 Age: <input type="text" name="age" value="<?php echo $_SESSION['age']; ?>" >
                                                 Work: <input type="text" name="work" value="<?php echo $_SESSION['work']; ?>" >
                                                 City: <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>" >
                                                 <input type= "submit" name="submitre" value="Submit" />
                                                </form>        
                                                 -->


                          
                           <!--  Change Profile Picture : <form method="Post" action=" " enctype="multipart/form-data">
                                              <input type="file" name="pie" />
                                              <input type="submit" name="submit45" value="" />
                                              </form>  -->


                        </div>
                        
                    </div>

                </div>
            </div>

        </div>
    </section>
   



<?php 
include 'footer.php' ;
?>




</body>

<script src="edit1.js"></script>
<script>
        function abt()
        {

            
            document.getElementById("edit").style.display="none";
            document.getElementById("about").style.display="block";
            document.getElementById("newsfeed").style.display="none";


        }
        function nf()
{
            document.getElementById("edit").style.display="none";
            document.getElementById("about").style.display="none";
            document.getElementById("newsfeed").style.display="block";
        }
        function edt()
        {
            document.getElementById("edit").style.display="block";
            document.getElementById("about").style.display="none";
            document.getElementById("newsfeed").style.display="none";
        }

        </script>



</html>

<?php
if(isset($_POST['submitre']))
{
    $ide=$_SESSION['id'];

    $n=$_POST['name'];
    $c=$_POST['city'];
    $w=$_POST['work'];
    $a=$_POST['age'];
    $q="UPDATE users SET name='$n', city='$c',work='$w',age='$a' WHERE id=$ide ";
    $query=$conn->prepare($q);
    $query->execute();
    $_SESSION['name']=$n;
    $_SESSION['work']=$w;
    $_SESSION['age']=$a;
    $_SESSION['city']=$c;
    echo '<script>window.location.href="profile.php"</script>';

}
?>