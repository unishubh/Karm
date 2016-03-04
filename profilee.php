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

    </style>   


        <section class='section_2' id="profile-wrap">
                       <!-- profile header starts here -->
            <div class="row-fluid profile-header" style="background-color: #11b9f6;">
                <div class="profile-container">
                    <div class="col-md-8 col-sm-12 profile-detail">
                        
                        <div class="col-xs-12 col-md-4" id='searchHeader'>
<br>
                            <img class="img-responsive img-circle" style="height: 170px; width: 170px; border: 3px solid white;" src="<?php echo $_SESSION['image'];?>" alt="">  
                                
                            <button class="btn btn-primary btn-sm" id="ui"><i class="fa fa-upload"></i> &nbsp; Upload image</button>
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
                                    <span>News Feed</span>
                                </a></li>
                                <li role="presentation">
                                  <a href="#about"  onclick="abt();"  aria-controls="attendies" role="tab" data-toggle="tab">
                                      <span>About</span>
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
                            <b>Full Name:</b> <br><br>
                            <b>Age:</b> <br><br>
                            <b>Gender:</b> <br><br>
                            <b>Email id:</b> <br><br>
                            <b>Address:</b> <br><br>
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
                                <input type="email" id="" name="email" value="New email" class="form-control" placeholder="New Email">
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
if (isset($_POST['submit45']))
{
  $imagename=$_FILES["pie"]["name"];
 // echo $imagename;
//$imagetmp=addslashes (file_get_contents($_FILES['pie']['tmp_name']));
  $folder="usrimages/";
  move_uploaded_file($_FILES["pie"]["tmp_name"], "$folder".$_FILES["pie"]["name"]);
 $img=$folder.$_FILES["pie"]["name"];
  //move_uploaded_file($files['pie']['tmp_name'],"latest.img");
  //$instr=fopen("latesdst.img","rb");
  //$image=addslashes(fread($instr,filesize("latest.img")));
//echo '<script>alert("'.$imagetmp.'");</script>'; 
//echo "1".$imagetmp;
$n="usrimages/".$_FILES["pie"]["name"];
$_SESSION['image']=$n;
$query="UPDATE users SET image='$n' WHERE id=$id ";
/*echo $n;*/
$q=$conn->prepare($query);
$q->execute();
}
?>
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
    echo '<script>window.location.href="profilee.php"</script>';

}
?>