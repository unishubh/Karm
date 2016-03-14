 <?php
 session_start();
 include 'connect.php';
 $id=$_SESSION['id'];
  //echo '<script>alert("Hie");</script>';
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
echo '<script>
  window.location.href="profile.php";
  </script>';
//$_SESSION['image']=

?>