 <!-- LOGIN -->

<?php
/*session_start();*/
 if(isset($_POST['submit']))
{

  include 'connect.php';
$name=$_POST['username'];
$p=md5($_POST['password']);
$q="SELECT count(*) FROM users WHERE username='$name' AND password='$p'";
$query=$conn->prepare($q);
$query->execute();
$r=$query->fetchColumn();
if($r==1)
{
  $q="SELECT * FROM users WHERE username='$name' AND password='$p'";
  $query=$conn->prepare($q);
  $query->execute();
    $query->execute(array(':name' => "Jimbo"));
    $d=$query->fetch();
    $_SESSION['id']=$d['id'];
  $_SESSION['name']=$d['name'];
  $_SESSION['user']=$d['username'];
  $_SESSION['sex']=$d['sex'];
  $_SESSION['age']=$d['age'];
  $_SESSION['city']=$d['city'];
  $_SESSION['image']=$d['image'];
  $_SESSION['work']=$d['work'];
  //echo $_SESSION['image'];
  echo '<script>alert("Welcome");
  window.location.href="profile.php";</script>';
}
else
{
  echo '<script>alert("Wrong username/password");</script>';
}
}

?>


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


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="row">
    	<br><br><br><br>
    	<div class="col-md-4"></div>

    	<div class="col-md-4">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><i class="fa fa-user fa-1x"></i>Sign to Karmyo</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post">
            <div class="form-group">
              <label for="usrname"><i class="fa fa-user"></i> Username</label>
              <input type="text" class="form-control" name="username" id="usrname" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="psw"><i class="fa fa-lock"></i> Password</label>
              <input type="password" class="form-control" name="password" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" name="submit" class="btn btn-success btn-block"><i class="fa fa-case"></i> Login</button>
              
              

               <!-- <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-facebook-square"></i>  Sign in using Facebook
			</button> -->
        <center><h3> OR </h3></center>
      <center><b>SIGN IN USING FACEBOOK &nbsp; </b><fb:login-button scope="public_profile,email" onclick="checkLoginState()";autologoutlink='true' >
</fb:login-button> </center>

          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
          <p>Not a member? <button class="btn btn-danger" id="join">Sign Up</button></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
      </div>
      </div>


    </div>
  </div> 







   <!-- LOGIN END -->



<!-- SIGN UP -->






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




<script>



   function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
     // document.getElementById('status').innerHTML = 'Please log ' +
      //  'into this app.';
    } else {
document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
  
 console.log("Login");
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
   console.log("dasd");
  FB.init({
    appId      : '1650693435171288',
    cookie     : true,  // enable cookies to allow the server to access 
    status     :false,                    // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use 
    });

 



 // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.



  



  FB.getLoginStatus(function(response) {
    console.log('dasd');
    statusChangeCallback(response);
  });

  };

  



// Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=name,email,gender,picture', function(response) {
      console.log('Successful login for: ' + response.id);
     // document.getElementById('status').innerHTML =
        //'Thanks for logging in, ' + response.name + '!';
        //console.log(JSON.stringify(response));
        //var obj=JSON.parse(response);
        //console.log(response.gender);
        //console.log(response.picture.data.url);
       // document.getElementById("pic").innerHTML="<img src="+response.picture.data.url+"></img>";
       console.log('dasd');
       ajaxit(response.name,response.email,response.gender,response.picture.data.url,response.id);
    });
  }
  





function ajaxit(n,e,s,p,fbid)
{
  //console.log(n);
  //var u=_("user").value;
  //if(u!="")
  //  _("unstatus").innerHTML="Checking...";
  //  if (u == '') {
      //    document.getElementById("unstatus").innerHtml = "";
        //  return;
      //}
      p=encodeURIComponent(p);
      console.log(p);
      console.log(fbid);
          if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
          }
          else {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.onreadystatechange = function () {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


        //          //show(sem);
          //        console.log(xmlhttp.responseText);

               if(xmlhttp.responseText!=0)
                {
                  console.log(xmlhttp.responseText);
      //            logout();
               window.location.href="profile.php";
               FB.logout(function(response) {
   // Person is now logged out
});
           }
               else if(xmlhttp.responseText==0)
//_("unstatus").innerHTML="Name already taken";
console.log("Not so nice");



              }
          }
      
      xmlhttp.open("GET", "social.php?sex=" + s+"&name="+n+"&email="+e+"&pic="+p+"&fbid="+fbid, true);
      xmlhttp.send();
}







    /*function ajaxit()
    {
      var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      //document.getElementById("demo").innerHTML = xhttp.responseText;
      if(xhttp.responseText==1){
        console.log("hai toh ");
        window.href.location="home.php";
        }
      else
      {
        alert("Sorry, The Social Log In cannot be activatd on your account, please go manual!!");
      }
    }
  };
  xhttp.open("POST", "social.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("name="+response.name+"&sex="+response.gender+"&email="response.email);
}
    */
    /*function logout(){
 FB.logout(function(response) {
   // Person is now logged out
});}*/
  </script>