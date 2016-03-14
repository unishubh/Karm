
<?php include 'header.php';
include 'connect.php';
include 'cities.php'; ?>
<title>Signup|Karmyo</title>
<style>
body{
    background-color: #525252;
}
.centered-form{
	margin-top: 120px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>
<link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="fonts.css">
<link rel="stylesheet" href="font-awesome.css">
<link rel="stylesheet" href="homea.css">
<link rel="stylesheet" href="home-prelogin.css">
<script src="fbds.js" ></script>
<script src="bootstrap1.js" ></script>
<script src="headroom.js" ></script>
<script src="gtm.js" ></script>
<script src="jquery.js" ></script>
<script src="jqury-1.js" ></script>
<script src="viewportSize-min.js" ></script>
<script src="validate.js">
  </script>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for Karmyo </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST" action="" onsubmit="return(signup());" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" placeholder="Name (This field is compulsory)" class="form-control input-sm" name="user" id="name" onblur="checkname()" />
			    					<span name="nstatus" id="nstatus"></span>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" placeholder="Username" class="form-control input-sm" name="username" id="user"onblur="checkuser()" />
			    					<span name="unstatus" id="unstatus"></span>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" placeholder="E-mail (This field is compulsory)" class="form-control input-sm" name="email" id="mail" onblur="checkemail()" />
			    			<span name="estatus" id="estatus"></span>
			    			</div>
			    			<div class="form-group">
			    				<select class="form-control input-sm" name="sex" id="sex">
<option value="male">Male</option>
<option value="female">Female</option>
</select><br>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">

			    						<input type="password" class="form-control input-sm" placeholder="Password (This field is compulsory)" name="password" id="pass"onblur="checkonlypass()" />
			    					<span name="pstatus" id="pstatus"></span>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" class="form-control input-sm" placeholder="Confirm Password (This field is compulsory)" name="ppassword" id="cpass" onblur="checkpass()"/>
			    					<span name="ppstatus" id="ppstatus"></span>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<select name="city" class="form-control input-sm">
			    				<option>Please select a city</option>
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
			    			</div>
			    			<div class="form-group">
			    					<input type="text" class="form-control input-sm" placeholder="Age" name="age"/> 
			    					
			    					</div>
			    			<div class="form-group">
			    					<h5 class="panel-title">	Please select a display pic:</h5> 
			    					<input type="file" class="form-control input-sm" name="dp" id="dp"/>
			    					</div>
			    					
			    			<input type="submit" name="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    <?php 
//echo "!";
if (isset($_POST['submit']))
{
  $imagename=$_FILES["dp"]["name"]; 
 // echo $imagename;
//$imagetmp=addslashes (file_get_contents($_FILES['dp']['tmp_name']));
  $folder="/opt/lampp/htdocs/bootbusiness/usrimages/";
  move_uploaded_file($_FILES["dp"]["tmp_name"], "$folder".$_FILES["dp"]["name"]);
 $img=$folder.$_FILES["dp"]["name"];
  //move_uploaded_file($files['dp']['tmp_name'],"latest.img");
  //$instr=fopen("latesdst.img","rb");
  //$image=addslashes(fread($instr,filesize("latest.img")));
//echo '<script>alert("'.$imagetmp.'");</script>';  
//echo "1".$imagetmp;
$t="/bootbusiness/usrimages/".$_FILES["dp"]["name"];
  
  $n=@mysql_escape_string($_POST['user']);
  $un=@mysql_escape_string($_POST['username']);
  $email=@mysql_escape_string($_POST['email']);
  $sex=@mysql_escape_string($_POST['sex']);
  $password=md5($_POST['password']);
  $city=@mysql_escape_string($_POST['city']);
  $a=@mysql_escape_string($_POST['age']);

  $sql="INSERT INTO users (name,username,email,sex,password,city,age,image) VALUES ('$n','$un','$email','$sex','$password','$city','$a','$t')";
  $query=$conn->prepare($sql);
  $query->execute();
  echo '<script>alert("Welcome to Karmyo, Please Sign In");
  window.href.location="index.php"</script>';
}
?>