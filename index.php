<?php
session_start();
//if(isset($_SESSION['id']))
//{
//echo '<script>window.location.href="kamryo.com/profile.php"<script>';
//}
include 'header.php' ;
include 'connect.php';
?>
<script src="validate.js"></script>

<style>
body {
    
}

.backg {
	padding-top: 80px;
    position: relative;
    height: 600px;
    z-index: 1;
}

.backg:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: url("images/linked.jpg") center center;
    opacity: .9;
}


.panel-login {
	border: 2px solid #727272;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}



</style>

<body>

<div class="backg">
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<h4 style="color: black; padding: 10px;"> KARMYO - It's time to give back!</h4>
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="fileprocess.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="usrname" tabindex="1" class="form-control" placeholder="Email-Id" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="psw" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit22" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								
								<form id="register-form" action="" method="post" onsubmit="return(signup());" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="name" tabindex="1" class="form-control" placeholder="Name" value="" onfocus="doit()" onblur="nor(this.id)">
									</div>
									<div class="form-group">
										<input type="email" onblur="nor(this.id)" name="email" id="mail" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" onblur="nor(this.id)" name="password" id="pass" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="cpass" onblur="nor(this.id)" id="cpass" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Let's Karmyo">
											</div>
										</div>
									</div>
								</form>
                   
                    <center><h3> OR </h3></center>
      <!-- <center><fb:login-button data-size="xlarge" style="width:320px;" scope="public_profile,email" onlogin="checkLoginState()";autologoutlink='true' >
</fb:login-button> </center> -->
<center><fb:login-button size="large"
                 onlogin="checkLoginState()">
  Connect using Facebook
</fb:login-button></center>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




</div>

<?php 
include 'footer.php' ;
?>

<script>

$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});


</script>


<!-- </div> -->
</body>


</html>
<?php
if(isset($_POST['submit']))
{
	$i='usrimages/';
	$n=$_POST['username'];
	//echo $n;
	$e=$_POST['email'];
	$p=md5($_POST['password']);
	  $sql="INSERT INTO users (name,email,password,image) VALUES ('$n','$e','$p','$i')";
  $query=$conn->prepare($sql);
  $query->execute();
}
?>

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
  };

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
  
 console.log("Login");
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  };

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
