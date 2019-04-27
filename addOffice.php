<?php

$server='localhost';
$name='root';
$pass='';
$database='EKOTA';

$conn=mysqli_connect($server,$name,$pass);
$db_found=mysqli_select_db($conn,$database);

if(!$conn)
{
die("cant connect to the database");

}
else
{
echo "db connected zerin<br>";
}

if($db_found)
{
	echo "db found";

    $sql = "INSERT INTO OfficesandStores VALUES (991015 ,'SQUARE Textile', 1260 , '48 Mohakhali C/A Dhaka-1212, Bangladesh.' , 01123673254)";
	$result = mysqli_query($conn,$sql);

}
else
	{ echo "db not found";}
?>