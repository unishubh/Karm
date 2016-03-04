<?php 
session_start();
include 'header.php' ;
$id=$_SESSION['id'];
$x=$_GET['id'];
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
  <?php  
                      $q="SELECT * FROM users WHERE id='$x'";
$query=$conn->prepare($q);
  $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    $n=$d['name'];

    ?>
                            <img class="img-responsive img-circle" style="height: 170px; width: 170px; border: 3px solid white;" src="<?php echo $d['image'];?>" alt="">  
                                
                           
                        </div>
                    

                        <div class="col-xs-12 col-md-8 profile-info" id="profileInfo">
                            <h1><?php echo $n; ?></h1>
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
                              
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="newsfeed">
                           <div class="row">
                           <div class="col-md-6">
                           <?php
                             // echo '1';
                             $q="SELECT users.name,tr.name,tr.cause,tr.donation,tr.creator FROM `users` JOIN (SELECT * FROM `activity` JOIN `fundraiser`  ON `adder`=`uid` AND`eid`=`id`) AS tr ON users.id=tr.uid WHERE users.id='$x'   LIMIT 6 ";
                            // echo $id;
                              //echo $q;
//echo 1;
                               $query=$conn->prepare($q);
  $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    while($d)
    {
      //echo '1';
      
if($d['creator']==0)
          echo '<h5>'.$n.' is going to '.$d["name"].'</h5><br>'; 
        else 
          echo '<h5>'.$n. ' created the event '.$d["name"]. '</h5><br>';
        $d=$query->fetch();?>
        <?php   }
        ?>
                                 
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
                          <?php
                          $q="SELECT * FROM users WHERE id='$x'";
                          $query=$conn->prepare($q);
  $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
                          ?>
                            <b>Full Name: <?php echo $d['name']; ?></b> <br><br>
                            <b>Age: <?php echo $d['age']; ?></b> <br><br>
                            <b>Gender: <?php echo $d['sex']; ?></b> <br><br>
                            <b>Email id: <?php echo $d['email']; ?></b> <br><br>
                            <b>Address: <?php echo $d['city']; ?></b> <br><br>
                          </div>
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