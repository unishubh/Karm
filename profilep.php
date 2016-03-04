<?php 
session_start();
include 'header.php' ;
$id=$_SESSION['id'];
//echo $_SESSION['id'];
?>


<style>

body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 504px;
}


</style>


<body onload="nf()" >



		<?php 
include 'navbar.php' ;
?>


<script src="edit1.js"></script>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">

				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo $_SESSION['image'];?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $_SESSION['name']; ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo ' '.$_SESSION['work'];?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<!--<button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-heart"></i> Follow</button>
					<button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-comment"></i> Message</button>-->
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active" onclick="nf()">
							<button class="btn btn-danger btn-block">
							<i class="fa fa-newspaper-o"></i>
							News Feed </button>
						</li><br>
                        <li onclick="abt()">
                            <button class="btn btn-danger btn-block">
                            <i class="fa fa-user"></i>
                            About </button>
                            </a>
                        </li><br>
						<li onclick="edt()">
							<button class="btn btn-danger btn-block">
							<i class="fa fa-pencil"></i>
							Edit Profile </button>
						</li><br>
						<br><br>
						
						
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="list-group" id="newsfeed">
            <br><br>

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
            <div class="profile-content" id="about">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">ABOUT</h3>
                  </div>
                  <div class="panel-body">
                    <b>Full Name:</b> <br><br>
                    <b>Age:</b> <br><br>
                    <b>Gender:</b> <br><br>
                    <b>Email id:</b> <br><br>
                    <b>Address:</b> <br><br>
                  </div>
                </div>

            </div>

      <div class="profile-content" id="edit">
			 


       Name:  <?php echo $_SESSION['name']; ?>  <a onclick="namer();"><i class="fa fa-pencil"></i></a><br>
          <div id="name" style="display:none;">
            <div class="form-group">
          <input class="form-control" placeholder="Change Your Name" type="text" id="nameedit"  name="name_edit" value="as" />
          <button class="btn" onclick="name_update();"> Done</button><tr><tr><button onclick="namerd();"> Cancel </button>
            </div>

            </div>
            <br>
            Age : <?php echo $_SESSION['age']; ?>  <br> <a onclick="ager();">edit</a><br>
           <div id="agee" style="display:none;">

          <input type="text" id="ageedit"  name="age_edit" />
          <button onclick="age_update();"> Done</button><tr><tr><button onclick="agerd();"> Cancel </button>


            </div>
            <br>
            City: <?php echo $_SESSION['city']; ?> <br>  <a onclick="citer();">edit</a> <br>
             <div id="citee" style="display:none;">

          <input type="text" id="cityedit"  name="city_edit" />
          <button onclick="city_update();"> Done</button><tr><tr><button onclick="citerd();"> Cancel </button>
        </div>
        Work: <?php echo $_SESSION['work']; ?>   <a onclick="worker();">edit</a>
        <div id="workee" style="display:none;">

          <input type="text" id="workedit"  name="work_edit" />
          <button onclick="work_update();"> Done</button><tr><tr><button onclick="workerd();"> Cancel </button>
        </div>
        Change Profile Picture : <form method="Post" action=" " enctype="multipart/form-data">
                          <input type="file" name="pie" />
                          <input type="submit" name="submit45" value="" />
                          </form>      



            </div> 
		</div>
		
		
		


	</div>
</div>
<br>
<br>

</body>


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