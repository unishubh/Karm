<?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{
   $user=$_SESSION['id'];
 // echo $user;
$eid=$_POST['eid'];
 $comm=$_POST['comment'];
  //echo $comm;
  if(isset($_FILES['pic']))
  {
if($_FILES['pic']['error']!=4){
    $img_name=$_FILES['pic']['name'];
$t=$_FILES['pic']['type'];
$dir='comments/';
if(($t=="image/gif"||$t=="image/png"||$t="image/jpeg")&&($_FILES['pic']['size']>15000))
{
  if($_FILES['pic']['error']>0)
  {
    echo '<script>alert("You are going wrong");</script>';
  }
  else{
    $i=1;
    $success=false;
    $new_img_name=$img_name;
    while(!$success)
    {
      if(file_exists($dir.$new_img_name))
      {
        $i++;
        $new_img_name=$i.$new_img_name;
      }
      else
      {
        $success=true;

      }
    }
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_img_name);
    $comm='<img src="'.$dir.$new_img_name.'"width=100 height=75></img>';
    $q="INSERT INTO comment (eid,uid,comment) VALUES ('$eid','$user','$comm')";
    $sql=$conn->prepare($q);
  $sql->execute();
  //echo "SRT";
  echo '<script>alert("Done");
    location.href="locate.php?event='.$eid.'";</script>';
 

}
  }
}}
if($_FILES['pic']['error']==4)
{
// echo "5";
  $q="INSERT INTO comment (eid,uid,comment) VALUES ('$eid','$user','$comm')";
  $sql=$conn->prepare($q);
  $sql->execute();
echo '<script>alert("Done");
    location.href="locate.php?event='.$eid.'";</script>';
  }
  
}
?>