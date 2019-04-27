<?php

include "config.php";

$errorMessage = $errorMessage1 = $sidErr = $dateErr = $bloodErr = "";
$sid = $blood = $date = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		/*SID*/	if (empty($_POST['sid'])) {
				$sidErr = "Socity number is required.";
				} 
			else {
				$sid=($_POST['sid']);
				$sid=test_input($sid);
				if (!preg_match("/^[+,0-9]*$/",$sid)) 
				{
				$sidErr = "Only numbers allowed."; 
				}
			}

		/*blood*/if (empty($_POST['blood'])) {
				$bloodErr = "Blood Group required.";
				} 
			else {
				$blood=($_POST['blood']);
				$blood=test_input($blood);
			}

		/*Bdate*/if (empty($_POST['blooddate'])) {
				$dateErr = "Date required.";
				} 
			else {
				$date=($_POST['blooddate']);
				$date=date_create($date);
				$date=$date->format('Y-m-d');
				$date="'" . test_input($date) . "'";
			}

		$sidlength = strlen($sid);
		$bloodlength = strlen($blood);

		if ($sidlength > 2 && $sidlength <= 8) {
				$errorMessage ="";
		}
		else 
			{
				$errorMessage = $sidErr ." " . "Socity ID must be between 3 to 8 character";
			}
			
		if ($bloodlength >=2 && $bloodlength <= 3) {
			$errorMessage1 = "";
			}
		else {
				$errorMessage1 = $bloodErr ." "."Blood Group must be between 2 to 3 characters";
			}


		if($errorMessage=="" && $errorMessage1== "" && $sidErr== "" && $bloodErr== "" && $dateErr == "")
			{
				if($db_found){
				
					$sid = quote_smart($sid, $conn);
					$blood = quote_smart($blood, $conn);
					
					$SQL = "SELECT * FROM Blood WHERE SID = $sid";
					$result = mysqli_query($conn,$SQL);
					$num_rows = mysqli_num_rows($result);
					
					if ($num_rows > 0) {
						echo "<h1>This Social Id is already registered.</h1>";

					}
					
					else{
							$SQL = "INSERT INTO Blood VALUES ($sid,$blood,$date)";
							$result = mysqli_query($conn,$SQL);
							mysqli_close($conn);
							header('Location: successfull.php');
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
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/respond.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel = "stylesheet" type="text/css" href = "css/signinlogin.css" />
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
                            <li  class="active"><a href="addBlood.php">Add Blood Info</a></li>
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
                    <li><a href="addmember.php">SignUp</a></li>
                </ul> 
            </div>
         </nav> 
    </div>

    <div class="row">
		<div id = "heading" >
			<h2 style="color:blue"><strong>Blood</strong><h2>
		</div>
	</div>

		<form name="blood" method="POST" action="addBlood.php">
			<div class="row">
				<table border="0" style="width:100%" class="signuptable">

					<tr>
					<th><label>Social ID:</label></th>
					<td><input class="fsignup" type="number" name="sid" maxlength="8"/><span class="error"> <?php echo $errorMessage;?></span></td>
					</tr>


					<tr>
					<th><label>Blood Group:</label></th>
					<td><input class="fsignup" type="text" name="blood" maxlength="3"/><span class="error"> <?php echo $errorMessage1;?></span></td>
					</tr>


					<tr>
					<th><label>Last Date Of Blood Donation:</label></th>
					<td><input class="fsignup" type="date" name="blooddate"/><span class="error"> <?php echo $dateErr;?></span></td>
					</tr>

				</table>
			</div>
				<input type='submit' name='submit' class='btn btn-primary btn-lg' value='Submit'/>

			</form>


			<footer class="row" style="text-align:center">
                <font>  
                    <br><br><br><br><br><strong>Copyright &copy <?php echo date("Y");?> All Rights Reserved - </strong><font>Team Ekota</font>
                </font>
            </footer>

</div>
<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>