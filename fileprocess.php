<?php
session_start();
//echo '22';
 if(isset($_POST['submit22']))
{

  include 'connect.php';
$name=$_POST['username'];
$p=md5($_POST['password']);
$q="SELECT count(*) FROM users WHERE  email='$name' AND password='$p'";
$query=$conn->prepare($q);
$query->execute();
$r=$query->fetchColumn();
if($r==1)
{
  $q="SELECT * FROM users WHERE  email='$name' AND password='$p'";
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
  $_SESSION['email']=$d['email'];
  $_SESSION['address']=$d['city'];
  if($d['image']=="usrimages/")
  {
  $_SESSION['image']="usrimages/avatar.jpeg";
  }
  else {
  $_SESSION['image']=$d['image'];}
  $_SESSION['work']=$d['work'];
  //echo $_SESSION['image'];
  echo '<script>alert("Welcome");
  window.location.href="profile.php";
  </script>';
}
else
{
  echo '<script>alert("Wrong username/password");
  window.location.href="index.php";
  </script>';
}
}

?>