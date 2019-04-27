<?php
	include "config.php";

	$sid = $sidE = $sidM = $nid = $nidE = $nidM = $doc = $docE = $docM = "";
	$fname = $fnameE = $fnameM = $mname = $mnameE = $mnameM = $lname = $lnameE = $lnameM = "";
	$age = $ageE = $ageM = $gender = $genderE = $genderM = $salary = $salaryE = $salaryM = "";
	$occupation = $occupationE = $occupationM = $contrib = $contribE = $contribM = "";
	$phone = $phoneE = $phoneM = $email = $emailE = $emailM = $working = $workingE = $workingM = "";
	$date = $dateE = $dateM = "";
	$num_rows=0;


if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		/*SID*/	if (empty($_POST['sid'])) {
				$sidE = "Socity ID is required.";
				} 
			else {
				$sid=($_POST['sid']);
				$sid=test_input($sid);
				if (!preg_match("/^[+,0-9]*$/",$sid)) 
				{
				$sidE = "Only numbers allowed."; 
				}
			}
			$sidlength = strlen($sid);
					if ($sidlength > 2 && $sidlength <= 8) {
							$sidM ="";
					}
					else 
						{
							$sidM = $sidE ." " . "Socity ID must be between 3 to 8 character";
						}


		/*fname*/	if (empty($_POST['fname'])) {
				$fnameE = "First name is required.";
				} 
			else {
				$fname=($_POST['fname']);
				$fname=test_input($fname);
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$fname)) 
				{
				$fnameE = "Only letters numbers and white space allowed."; 
				}
			}
			$fnamelength = strlen($fname);
					if ($fnamelength >= 1 && $fnamelength <= 20) {
						$fnameM = "";
						}
					else {
						$fnameM = $fnameE." "." First name must have 1 character & not more than 20 characters";
						}

		/*mname*/	if (empty($_POST['mname'])) {
				$mnameE = "";
				} 
			else {
				$mname=($_POST['mname']);
				$mname=test_input($mname);
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$mname)) 
				{
				$mnameE= "Only letters numbers and white space allowed."; 
				}
			}
			$mnamelength = strlen($mname);
					if ($mnamelength >= 0 && $mnamelength <= 20) {
						$mnameM = "";
						}
					else {
						$mnameM = $mnameE." "." Middle name can not contain more than 20 characters";
					}

		/*lname*/	if (empty($_POST['lname'])) {
				$lnameE = "Lastname is required.";
				} 
			else {
				$lname=($_POST['lname']);
				$lname=test_input($lname);
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$lname)) 
				{
				$lnameE = "Only letters numbers and white space allowed."; 
				}
			}
			$lnamelength = strlen($lname);
					if ($lnamelength >= 1 && $lnamelength <= 25) {
						$lnameM = "";
						}
					else {
						$lnameM = $lnameE." ". "Last name must have 1 character & not more than 25 characters";
						}

		/*age*/	if (empty($_POST['age'])) {
				$ageE = "Age is required.";
				} 
			else {
				$age=($_POST['age']);
				$age=test_input($age);
				if (!preg_match("/^[0-9]*$/",$age)) 
				{
				$age = "Only numbers allowed."; 
				}
			}
			$agelength = strlen($age);
					if ($agelength >= 1 && $agelength <= 3) {
						$ageM = "";
						}
					else {
						$ageM = $ageE." ". "Age must be between 1 to 3 character";
						}

		/*gender*/	if(empty($_POST['gender'])) {
				$genderE = "Gender is required.";
				}
			else {
				$gender="'".($_POST['gender'])."'";
				$gender=test_input($gender);
		}
		$genderM =$genderE;

		/*NID*/	if (empty($_POST['nid'])) {
				$nidE = "National ID number is required.";
				} 
			else {
				$nid=($_POST['nid']);
				$nid=test_input($nid);
				if (!preg_match("/^[0-9]*$/",$nid)) 
				{
				$nidE = "Only numbers allowed."; 
				}
			}
			$nidlength = strlen($nid);
					if ($nidlength >= 4 && $nidlength <= 9) {
						$nidM = "";
						}
					else {
						$nidM = $nidE." ". "National ID must be between 4 to 9 character";
						}

		/*occupation*/	if(empty($_POST['occupation'])) {
				$occupationE = "Occupation is required.";
				}
				else {
				$occupation=($_POST['occupation']);
				$occupation= test_input($occupation);		
			}
			$occupationlength = strlen($occupation);
					if ($occupationlength >= 4 && $nidlength <= 12) {
							$occupationM = "";
						}
					else {
							$occupationM = $occupationE." ". "Occupation must be between 4 to 9 character";
						}

		/*phone*/	if(empty($_POST['phone'])) {
				$phoneE = "";
				}
				else {
				$phone=($_POST['phone']);
				$phone = test_input($phone);
				if (!preg_match("/^[0-9]*$/",$phone)) 
				{
					$phoneE = "Only numbers are allowed."; 
				}
		}
		$phonelength = strlen($phone);
					if ($phonelength >= 0 && $phonelength <= 15) {
							$phoneM = "";
						}
					else {
							$phoneM = $phoneE." ". "Phone Number can not contain more than 15 characters";
							}

		/*email*/	if (empty($_POST['email'])) {
				$emailE = "Email is required.";
				}
		else {
				$email=($_POST['email']);
				$email = test_input($email);				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))  		// check if e-mail address is well-formed
				{
					if (!preg_match('^([a-zA-Z0-9._-]{2,4})+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})^',$email))
					{
						$emailE = "Invalid email format."; 
					}
				}
			}
			$emaillength = strlen($email);
					if ($emaillength >= 4 && $emaillength <= 25) {
							$emailM = "";
						}
					else {
							$emailM = $emailE." ". "Email ID must be between 4 to 25 character";
						}

		/*Birthdate*/if (empty($_POST['date'])) {
				$dateE= "Date required.";
				} 
			else {
				$date=($_POST['date']);
				$date=date_create($date);
				$date=$date->format('Y-m-d');
				$date="'" . test_input($date) . "'";
			}
			$dateM =$dateE;
			
		/*social contrib*/	if (empty($_POST['contrib'])) {
				$contribE = "";
				} 
				else {
				$contrib=($_POST['contrib']);
				$contrib=test_input($contrib);
			}
			$contriblength = strlen($contrib);
					if ($contriblength >= 0 && $contriblength <= 40) {
							$contribM = "";
						}
					else {
							$contribM = $contribE." ". "Social Contribution can not contain more than 40 characters";
						}
			
		/*working institution*/	if (empty($_POST['working'])) {
				$workingE = "Working Place is required.";
				} 
				else {
				$working=($_POST['working']);
				$working=test_input($working);
			}
			$workinglength = strlen($working);
					if ($workinglength >= 4 && $workinglength <= 40) {
							$workingM = "";
						}
					else {
							$workingM = $workingE." ". "Working Institution Name must be between 4 to 40 character";
						}

		/*salary*/	if(empty($_POST['salary'])) {
				$salaryE = "";
				}
				else {
					$salary=($_POST['salary']);
					$salary = test_input($salary);
					if (!preg_match("/^[0-9]*$/",$salary)) 
					{
						$salaryE = "Only numbers are allowed"; 
					}
				}
				$salarylength = strlen($salary);
					if ($salarylength >= 0 && $salarylength <= 8) {
							$salaryM = "";
						}
					else {
							$salaryM = $salaryE." ". "Salary can not contain more than 8 characters";
						}
			
		/*DocID*/	if(empty($_POST['doc'])) {
				$docE = "Doctor ID required";
				}
				else {
					$doc=($_POST['doc']);
					$doc = test_input($doc);
					if (!preg_match("/^[0-9]*$/",$doc)) 
					{
						$docE = "Only numbers are allowed"; 
					}
				}
				$doclength = strlen($doc);
					if ($doclength >= 2 && $doclength <= 8) {
							$docM = "";
						}
					else {
							$docM = $docE." ". "Doctor's ID must be between 2 to 8 character";
						}

		if($sidM == "" && $fnameM == "" && $mnameM == "" && $lnameM == "" && $ageM == "" && $genderM == "" && $nidM == "" && $occupationM == "" && $phoneM == "" && $emailM == "" && $contribM == "" && $workingM == "" && $dateM == "" && $salaryM == "" && $docM == "")
		{
			if($db_found){
					
					$sid = quote_smart($sid, $conn);
					$fname = quote_smart($fname, $conn);
					$mname = quote_smart($mname, $conn);
					$lname = quote_smart($lname, $conn);
					$age = quote_smart($age, $conn);
					$nid = quote_smart($nid, $conn);
					$occupation = quote_smart($occupation, $conn);
					$phone = quote_smart($phone, $conn);
					$email = quote_smart($email, $conn);
					$contrib = quote_smart($contrib, $conn);
					$working = quote_smart($working, $conn);
					$salary = quote_smart($salary, $conn);
					$doc = quote_smart($doc, $conn);
					
					$SQL = "SELECT * FROM members WHERE SID = $sid";
					$result = mysqli_query($conn,$SQL);
					$num_rows = mysqli_num_rows($result);
					
					if ($num_rows > 0) {
						$errorMessage2 = "This Social ID is already registered";
						echo $errorMessage2;
					}
					
					else{
							$SQL = "INSERT INTO members VALUES ($sid,$fname,$mname,$lname,$age,$gender,$nid,$occupation,$phone,$email,$contrib,$working,$date,$salary,$doc)";
							$result = mysqli_query($conn,$SQL);
							mysqli_close($conn);
							header('Location: reg.php');
						}
				}
		}
	}

function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysqli_real_escape_string($handle,$value) . "'";
   }
   return $value;
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = strtoupper($data);
   return $data;
}

?>

<!DOCTYPE>
<html>
<head>
	<title> Signup</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/respond.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel = "stylesheet" type="text/css" href ="css/signinlogin.css" />

    <style>
        body {
        background-color: #cccccc;
                }
    </style>
</head>
<body>

<div class="container">

	<header class="row" style="background-color:white">
        <div class="col-lg-6 col-sm-5">
            <a href="home.php"><img src="image/Ekota.jpg" alt="Ekota-logo" class="img-responsive"></a>
        </div>
    </header>

    <!-- row 1: navigation -->
    <div class="row">
        <nav class="navbar navbar-default navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="glyphicon glyphicon-arrow-down"></span>
                  MENU
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">Blood Info <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="addBlood.php">Add Blood Info</a></li>
                            <li><a href="updateBlood.php">Update Blood Info</a></li>
                            <li><a href="needBlood.php">Needed Blood</a></li>
                        </ul>                    
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">Doctor Info <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="addDoctor.php">Add Doctor Info</a></li>
                            <li><a href="showDoc.php">All Doctor Info</a></li>                        
                        </ul>                    
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">Post <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="post.php">Add Post</a></li>
                            <li><a href="todaypost.php">Today's Post</a></li>
                            <li><a href="allpost.php">All Post</a></li>
                        </ul>                    
                    </li>
                    <li><a href="office.php">office's</a></li>
                    <li class="active"><a href="addmember.php">SignUp</a></li>
                </ul> 
            </div>
         </nav> 
    </div>

	<div  style = "width:100%;">
		<div class="row">
			<div id = "heading" >
					<h2 style="color:blue"><strong>Sign Up From Here....</strong><h2>
			</div>
		</div>

					

		<form name="signup" method="POST" action="addmember.php">
			<div class="row">
				<table border="0" style="width:100%" class="signuptable">

					<tr>
						<th Style="color:"><label>Social ID:</label></th>
						<td><input Style="border-radius:7px;" type="number" name="sid" maxlength="8"/><span class="error"> <?php echo $sidM;?></span></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>First Name:</label></th>
						<td><input Style="border-radius:7px;" type="text" name="fname" maxlength="20"/><span class="error"> <?php echo $fnameM;?></span></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>Middle Name:</label></th>
						<td><input Style="border-radius:7px;" type="text" name="mname" maxlength="20"/><span class="error"><?php echo $mnameM;?></span></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>Last Name:</label></th>
						<td><input Style="border-radius:7px;" type="text" name="lname" maxlength="25"/><span class="error"><?php echo $lnameM;?></span></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>Age:</label></th>
						<td><input Style="border-radius:7px;" type="number" name="age" maxlength="3"/><span class="error"><?php echo $ageM;?></span></td>
					</tr>

					<tr>
						<th rowspan="2"><label>Gender:</label></th>
						<td><input type="radio" name="gender" value="male"/><strong>Male</strong><span class="error"><?php echo $genderM;?></span></td>
					</tr>
					<tr>
						<td><input type="radio" name="gender" value="female"/><strong>Female</strong></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>National ID:</label></th>
						<td><input Style="border-radius:7px;" type="number" name="nid" maxlength="9"/><span class="error"> <?php echo $nidM;?></span></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>Occupation:</label></th>
						<td><input Style="border-radius:7px;" type="text" name="occupation" maxlength="12"/><span class="error"> <?php echo $occupationM;?></span></td>
					</tr>

					<tr>
						<th><label>Phone:</label></th>
						<td><input type="number" name="phone" maxlength="15"/><span class="error"> <?php echo $phoneM;?></td>
					</tr>

					<tr>
						<th><label>Email:</label></th>
						<td><input Style="border-radius:7px;" type="text" name="email" maxlength="25"/><span class="error"> <?php echo $emailM;?></td>
					</tr>

					<tr>
						<th Style="width:10px"><label>BirthDate:</label></th>
						<td><input Style="border-radius:7px;" type="date" name="date"/><span class="error"> <?php echo $dateM;?></span></td>
					</tr>

					<tr>
						<th><label>Social Contribution:</label></th>
						<td><input Style="border-radius:7px;" type="textbox" name="contrib" maxlength="40"/><span class="error"> <?php echo $contribM;?></td>
					</tr>

					<tr>
						<th><label>Working Institution:</label></th>
						<td><input Style="border-radius:7px;" type="textbox" name="working" maxlength="40"/><span class="error"> <?php echo $workingM;?></td>
					</tr>

					<tr>
						<th><label>Salary:</label></th>
						<td><input Style="border-radius:7px;" type="number" name="salary" maxlength="8"/><span class="error"> <?php echo $salaryM;?></td>
					</tr>
								
					<tr>
						<th Style="width:10px"><label>Doctor ID:</label></th>
						<td><input Style="border-radius:7px;" type="number" name="doc" maxlength="8"/><span class="error"> <?php echo $docM;?></span></td>
					</tr>

				</table>
					
					<input type='submit' name='submit' class="btn btn-primary btn-lg" value='SIGN UP'/>

			</form>
		</div>			
		
		<div class="row">
			<strong Style="color:blue">Social Contribution is like Blood Donation , Financial Donation , Road Construction , Charity , Orphanage , Cleaning , Rearing senior citizen etc . It can also be empty .<br><br></strong>
		</div>

			<footer class="row" style="text-align:center">
                <font>  
                    <br><br><br><br><br><strong>Copyright &copy <?php echo date("Y");?> All Rights Reserved - </strong><font>Team Ekota</font>
                </font>
            </footer>

	</div>

</div>

<!-- javascript -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>