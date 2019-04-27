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
echo "<h1> new db connected PAGE: SOCIAL CONTRIBUTION <br></h1>";
}

if($db_found)
{
echo "socity db found";
$SQL="CREATE TABLE Members
(
SID int(8) NOT NULL auto_increment,
FIRST_NAME varchar(20) NOT NULL,
MIDDLE_NAME varchar(20) ,
LAST_NAME varchar(25) NOT NULL,
Age int(3) NOT NULL,
Gender varchar(6) NOT NULL,
NID int(9) NOT NULL,
OCCUPATION varchar(12) NOT NULL,
PHONE_NUMBER int(15),
EMAIL_ID varchar(25) NOT NULL,
SOCIAL_CONTRIB varchar(40),
WorkingInstitution varchar(40) NOT NULL,
Birth_DATE date NOT NULL,
SALARY int(8),
DOC_ID int(8) NOT NULL,
PRIMARY KEY (SID),
UNIQUE id (SID,NID,EMAIL_ID,PHONE_NUMBER)
)";

mysqli_query($conn,$SQL);
}


if($db_found)
{
echo "<br>blood db found";
$SQL="CREATE TABLE Blood
(
SID int(8) NOT NULL auto_increment,
Blood_GROUP varchar(3) ,
Last_Blood_Donation date,
PRIMARY KEY (SID),
UNIQUE id (SID)
)";

mysqli_query($conn,$SQL);
}


if($db_found)
{
echo "<br>doctor db found";
$SQL="CREATE TABLE Doctor
(
SID int(8) NOT NULL auto_increment,
Specialist_of varchar(20) NOT NULL,
PRIMARY KEY (SID),
UNIQUE id (SID)
)";

mysqli_query($conn,$SQL);
}

if($db_found)
{
echo "<br>ofice table found";
$SQL="CREATE TABLE OfficesandStores
(
Office_ID int(10) NOT NULL auto_increment,
Office_Name varchar(50) NOT NULL,
Owner_Id int(8) NOT NULL,
Office_Location varchar(100) NOT NULL,
Office_Contact_NO int(15) NOT NULL,
PRIMARY KEY (Office_ID),
UNIQUE id (Office_ID, Owner_Id, Office_Contact_NO)
)";

mysqli_query($conn,$SQL);
}


if($db_found)
{
echo "<br>ofice post found";
$SQL="CREATE TABLE Post
(
SID int(8) NOT NULL,
TYPE varchar(30) NOT NULL,
POSTdate date NOT NULL,
POST varchar(200) NOT NULL,
TIME time NOT NULL,
PRIMARY KEY (TIME),
UNIQUE id (TIME)
)";

mysqli_query($conn,$SQL);
}

?>