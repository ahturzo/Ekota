<?php
include "config.php";

$errorMessage = $errorMessage1 = $sidErr = $specialErr = "";
$sid = $special = "";

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

	/*specialist*/if (empty($_POST['special'])) {
				$specialErr = "Specialist information required.";
				} 
			else {
				$special=($_POST['special']);
				$special=test_input($special);
			}

		$sidlength = strlen($sid);
		$speciallength = strlen($special);

		if ($sidlength > 2 && $sidlength <= 8) {
				$errorMessage ="";
		}
		else 
			{
				$errorMessage = $sidErr ." " . "Socity ID must be between 3 to 8 character";
			}
			
		if ($speciallength >=3 && $speciallength <= 20) {
			$errorMessage1 = "";
			}
		else {
				$errorMessage1 = $specialErr ." "."Specialist information must be between 3 to 20 characters";
			}


		if($errorMessage=="" && $errorMessage1== "" && $sidErr== "" && $specialErr == "")
			{
				if($db_found){
				
					$sid = quote_smart($sid, $conn);
					$special = quote_smart($special, $conn);
					
					$SQL = "SELECT * FROM Doctor WHERE SID = $sid";
					$result = mysqli_query($conn,$SQL);
					$num_rows = mysqli_num_rows($result);
					
					if ($num_rows > 0) {
						$errorMessage2 = "This ID is already registered";
						echo $errorMessage2;
					}
					
					else{
							$SQL = "INSERT INTO Doctor VALUES ($sid,$special)";
							$result = mysqli_query($conn,$SQL);
							mysqli_close($conn);
							header('Location: successfull.php');
						}
				}				
				else{
					//sleep(2);
					header('Location: header.php');
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
	<title>Add Doctor</title>
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
                            <li><a href="addBlood.php">Add Blood Info</a></li>
                            <li><a href="updateBlood.php">Update Blood Info</a></li>
                            <li><a href="needBlood.php">Needed Blood</a></li>
                        </ul>                    
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">Doctor Info <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="addDoctor.php">Add Doctor Info</a></li>
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
						<h2 style="color:blue"><strong>Add Doctor's Info</strong><h2>
					</div>
			</div>

			<form name="signup" method="POST" action="addDoctor.php">
				<div class="row">
					<table border="0" style="width:100%" class="signuptable">

						<tr>
						<th Style="width:10px" ><label>Social ID:</label></th>
						<td><input type="number" name="sid" maxlength="8"/><span class="error"> <?php echo $errorMessage;?></span></td>
						</tr>

						<tr>
						<th Style="width:10px"><label>Specialist OF:</label></th>
						<td><input type="text" name="special" maxlength="20"/><span class="error"> <?php echo $errorMessage1;?></span></td>
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