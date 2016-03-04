<?php
$dsn="mysql:dbname=aasfDB";
$username="root";
$password="";
try
{
	$conn=new PDO($dsn,$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	catch(PDOException $e)
	{
echo "Connection cannot be established";

	}

 ?>
