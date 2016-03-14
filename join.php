<style>
  .modal-header, h4, .close {
      background-color: #C85B43;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }





  </style>


<?php include 'header.php';
include 'connect.php';
include 'cities.php'; ?>

<!-- SIGN UP -->



<style>
#nstatus {
color:red;
}
</style>

  <!-- Modal -->
  <div class="modal fade" id="signupModal" role="dialog">
    <div class="row">
      <br><br><br><br>
      <div class="col-md-2"></div>

      <div class="col-md-4">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><i class="fa fa-user fa-1x"></i> SIGN UP</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="POST" action="" onsubmit="return(signup());" enctype="multipart/form-data">
            <div class="form-group">
              <label for="usrname">Name</label>
              <input type="text" class="form-control" id="usrname" placeholder="Name (This field is compulsory)" name="user" id="name" onblur="checkname()"/>
              <span name="nstatus" id="nstatus"></span>
            </div>
            <div class="form-group">
              <label for="user"> Username</label>
              <input type="text" placeholder="Username (This field is compulsory)" class="form-control" name="username" id="user"onblur="checkuser()" />
              <span name="unstatus" id="unstatus"></span>
            </div>

            <div class="form-group">
              <label for="mail">Email</label>
              <input type="email" placeholder="E-mail (This field is compulsory)" class="form-control" name="email" id="mail" onblur="checkemail()" />
              <span name="estatus" id="estatus"></span>
            </div>

            <div class="form-group">
            <label for="sex">Sex</label>
          <!--  <select class="form-control" name="sex" id="sex">
      <option value="male">Male</option>
      <option value="female">Female</option>
      </select>-->
      <input type="radio" name="sex" value="male" />

<input type="radio" name="sex" value="female" />
      
      </div>


      <div class="form-group">
              <label for="psw">Password</label>
              <input type="password" class="form-control" placeholder="Enter password" name="password" id="pass"onblur="checkonlypass()">
              <span name="pstatus" id="pstatus"></span>
            </div>

            <div class="form-group">
              <label for="psw">Confirm Password</label>
              <input type="password" class="form-control" placeholder="Enter password" name="ppassword" id="cpass" onblur="checkpass()">
              <span name="ppstatus" id="ppstatus"></span>
              
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


              <button type="submit" class="btn btn-success btn-block" name="submit1" value="Register"><i class="fa fa-case"></i> SIGN UP</button>
              <br>
              

          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
          <p>Already a member? <button class="btn btn-danger" id="login">Log In</button></p>
        </div>
      </div>
      
      </div>
      </div>


    </div>
  </div> 



<?php 
//echo "!";
if (isset($_POST['submit1']))
{
  $imagename=$_FILES["dp"]["name"]; 
 // echo $imagename;
//$imagetmp=addslashes (file_get_contents($_FILES['dp']['tmp_name']));
  $folder="C://xampp/htdocs/white/usrimages/";
  move_uploaded_file($_FILES["dp"]["tmp_name"], "$folder".$_FILES["dp"]["name"]);
 $img=$folder.$_FILES["dp"]["name"];
  //move_uploaded_file($files['dp']['tmp_name'],"latest.img");
  //$instr=fopen("latesdst.img","rb");
  //$image=addslashes(fread($instr,filesize("latest.img")));
//echo '<script>alert("'.$imagetmp.'");</script>';  
//echo "1".$imagetmp;
$t="C://xampp/htdocs/white/usrimages/".$_FILES["dp"]["name"];
  
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



<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
    $("#signup").click(function(){
        $("#signupModal").modal();
    });
    $("#login").click(function(){
      $("#myModal").modal('show');
      $('#signupModal').modal('hide');
        
    });
    $("#join").click(function(){
      $('#signupModal').modal('show');
      $("#myModal").modal('hide');
        
    });
});

</script>