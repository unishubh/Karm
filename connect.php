<?php
$dsn="mysql:host=localhost;dbname=aasfdb";
$host="localhost";
$username="root";
$password="gPjMCPv6";
try
{
	$conn=new PDO($dsn,$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	catch(PDOException $e)
	{
echo $e;

	}

 ?>
