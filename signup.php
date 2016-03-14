<?php 
include 'header.php' ;
?>
<body>

<?php 
include 'connect.php';+
include 'cities.php';

include 'navbar.php' ;
?>





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




<!-- SIGN UP -->

<script src="validate.js"></script>

<style>
#nstatus {
color:red;
}
</style>

  <!-- Modal -->

    <div class="row">
      <br>
      <div class="col-md-4"></div>

      <div class="col-md-5">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
         
          <h4 class="abc"><i class="fa fa-user fa-1x"></i>Lets Karmyo</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="POST" action="" onsubmit="return(signup());" enctype="multipart/form-data">
            <div class="form-group">
              <label for="usrname">Name</label>
              <input type="text"  class="form-control" id="name" style="border: 2px ridge #e9adad;" placeholder="Name (This field is compulsory)" name="user" id="name" onblur="nor(this.id)"/>
              <span name="nstatus" id="nstatus"></span>
            </div>
            <div class="form-group">
              <label for="user"> Username</label>
              <input type="text" placeholder="Username (This field is compulsory)" class="form-control" name="username" id="user"onblur="nor(this.id)" />
              <span name="unstatus" id="unstatus"></span>
            </div>

            <div class="form-group">
              <label for="mail">Email</label>
              <input type="email" placeholder="E-mail (This field is compulsory)" class="form-control" name="email" id="mail" onblur="nor(this.id)" />
              <span name="estatus" id="estatus"></span>
            </div>

            <div class="form-group">
            <label for="sex">Gender</label>
           <input id="sex" type="radio" name="sex" value="male" />Male &nbsp;

<input type="radio" name="sex" value="female" />Female
      </div>


      <div class="form-group">
              <label for="psw">Password</label>
              <input type="password" class="form-control" placeholder="Enter password" name="password" id="pass"onblur="nor(this.id)">
              <span class="alert" name="pstatus" id="pstatus"></span>
            </div>

            <div class="form-group">
              <label for="psw">Confirm Password</label>
              <input type="password" class="form-control" placeholder="Enter password" name="ppassword" id="cpass" onblur="nor(this.id)">
              <span class="alert" name="ppstatus" id="ppstatus"></span>
              
            </div>

            <div class="form-group">
              <label for="age">Age</label>
            <input type="number" class="form-control" id="age" placeholder="Age" name="age"/>
            </div>

            <div class="form-group">
            <label for="city">City</label>
            <select name="city"  id="city" class="form-control input-sm">
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
              <label for="dp">Profile Pic</label>
            <input type="file" class="form-control" name="dp" id="dp"/>
            </div>

		<br>
             <!-- <button type="submit" class="btn btn-success btn-block" name="submit1" value="Register"><i class="fa fa-case"></i> Lets Karmyo</button>-->
               <input type="submit" class="btn btn-success btn-block" name="sutfgbmit1" value="Lets Karmyo"><i class="fa fa-case"></i>
              <br>
              

          </form>
        </div>
        <div class="modal-footer">
          
          <p>Already a member? <a href="login1.php"<button class="btn btn-danger" style="color:white; background-color: #D43F3A ">Log In</button></a></p>
        </div>
      </div>
      
      </div>
      </div>


    </div>
<br>

<?php 
include 'footer.php' ;
?>


</body>
</html>


<?php 
//echo "!";
if (isset($_POST['submit1']))
{
  if(!(isset($_FILES["dp"]["name"]))) {
  echo '<script>alert("Here");</script>';
  $imagename='usrimages/avatar.jpeg'; 
  $t=$imagename;
}
else 
{

 // echo $imagename;
//$imagetmp=addslashes (file_get_contents($_FILES['dp']['tmp_name']));
  $folder="usrimages/";
  move_uploaded_file($_FILES["dp"]["tmp_name"], "$folder".$_FILES["dp"]["name"]);
 $img=$folder.$_FILES["dp"]["name"];
  //move_uploaded_file($files['dp']['tmp_name'],"latest.img");
  //$instr=fopen("latesdst.img","rb");
  //$image=addslashes(fread($instr,filesize("latest.img")));
//echo '<script>alert("'.$imagetmp.'");</script>';  
//echo "1".$imagetmp;
$t="usrimages/".$_FILES["dp"]["name"];
  }
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
  echo '<script>alert("Welcome to Karmyo, Please Sign In")
  window.location.href="login1.php"</script>;
  window.href.location="login1.php"</script>';
}
?>

