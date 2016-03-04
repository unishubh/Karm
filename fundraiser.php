<?php 
session_start();
include 'connect.php';?>
<?php
if(!isset($_SESSION['id']))
{
  echo '<script>alert("Please Log in to continue");
  history.go(-1);</script>';
}
if(isset($_POST['submit1']))
{
$n=$_POST['name'];
$c=$_POST['cause'];
$l=$_POST['link'];
preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$l,$matches);
$l=$matches[1];
$l='https://www.youtube.com/embed/'.$l;
$a=$_POST['amnt'];
$d=$_POST['description'];
$ngo=$_POST['ngo'];
$adder=$_SESSION['id'];
$sql="INSERT INTO fundraiser (name,cause,ngo,description,url,amount,adder) VALUES ('$n','$c','$n','$d','$l','$a','$adder')";

$query=$conn->prepare($sql);
$query->execute();
$sql="INSERT INTO activity (eid,uid,donation,creator) SELECT id,'$adder',0,1 FROM fundraiser WHERE name='$n'";
$query=$conn->prepare($sql);
$query->execute();
echo "<script>alert('Added');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title>Bootbusiness | Give unique title of the page here</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="css/boot-business.css" rel="stylesheet">
    <script src="validate.js">
  </script>
  </head>
  <body>
    <!-- Start: HEADER -->
    <?php
    include'header.php';
    ?>

    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Signup to Bootbusiness</h1>
        </div>
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-gift"></i> Be a part of Bootbusiness</h4>
            <div class="widget-body">
              <div class="center-align">
               <!-- <form class="form-horizontal form-signin-signup">-->
                <form method="POST" action="" class="form-horizontal form-signin-signup">
<table>
<tr>
<td>
Name the fundraiser:
</td>
<td>
<input type="text" name="name" id="name"/>
</td>
</tr>
<tr>
<td>
What is the fundraiser for:
</td>
<td>
<input type="text" name="cause" id="cause"/>
</td>
</tr>
<tr>
<td>
Please select the NGO:
</td>
<td>
<select  name="ngo" id="ngo">
<option value="NGO1">NGO1</option>
<option value="NGO2">NGO2</option>
<option value="NGO3">NGO3</option>
<option value="NGO4">NGO4</option>
</select>
</td>
</tr>
<tr>
<td>
Please write the descriptions about the funnd raiser: 
</td>
<td>
<input type="text" name="description" id="desc"/>
</td>
</tr>
<tr>
<td>
Link of the youtube video:
</td>
<td>
<input type="text" name="link" id="link"/>
</td>
</tr>
<tr>
<td>
Amount you want to raise:
</td>
<td>
<input type="text" name="amnt" id="amnt"/>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit1" value="Submit" />
</td>
</tr>
</table>
</form>
                <h4><i class="icon-question-sign"></i> Already have an account?</h4>
                <a href="signin.html" class="btn btn-large bottom-space">Signin</a>
                <h4><i class="icon-thumbs-up"></i> Sign in with third party account</h4>
                <ul class="signin-with-list">
                 
                  <li>
                    <a class="btn-facebook">
                      <i class="icon-facebook icon-large"></i>
                      Signin with Facebook
                    </a>
                  </li>
                  <li>
                    <a class="btn-google">
                      <i class="icon-google-plus icon-large"></i>
                      Signin with Google
                    </a>
                  </li>
                  <li>
                    <a class="btn-github">
                      <i class="icon-github icon-large"></i>
                      Signin with Github
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
   <?php
   include 'footer.php';
   ?>
    <!-- End: FOOTER -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/boot-business.js"></script>
  </body>
</html>
<?php 
if (isset($_POST['submit']))
{
  $n=@mysql_escape_string($_POST['user']);
  $un=@mysql_escape_string($_POST['username']);
  $email=@mysql_escape_string($_POST['email']);
  $sex=@mysql_escape_string($_POST['sex']);
  $password=md5($_POST['password']);
  $city=@mysql_escape_string($_POST['city']);
  $a=@mysql_escape_string($_POST['age']);

  $sql="INSERT INTO users (name,username,email,sex,password,city,age) VALUES ('$n','$un','$email','$sex','$password','$city','$a')";
  $query=$conn->prepare($sql);
  $query->execute();

}
?>