<?php 
$server='localhost';
$name='root';
$pass='';
$database='EKOTA';

$conn=mysqli_connect($server,$name,$pass)or die("cannot connect");
$db_found=mysqli_select_db($conn,$database);

if(!$conn)
{
	die("cant connect to the database");
}
else
{
	echo "db connected <br>";
}