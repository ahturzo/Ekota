<?php
include "config.php";
$sid=$sidE=$sidM=$type=$typeM=$post=$postE=$postM=$date=$time="";

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
		/*type*/ if(empty($_POST['typee'])) {
				$typeM = "Post Type is required.";
				}
			else {
				$type="'".($_POST['typee'])."'";				
				$type=test_input($type);
			}

		/*date*/$date= "'".date("Y-m-d")."'";
		/*time*/$time="'".date("h:i:s")."'";
		echo $time;

		/*post*/	if (empty($_POST['postt'])) {
				$postE = " "."Please type your post.";
				} 
			else {
				$post="'".($_POST['postt'])."'";
				$post=test_input($post);
			}
			$postlength = strlen($post);
					if ($postlength >= 1 && $postlength <= 500) {
						$postM = "";
						}
					else {
						$postM = $postE." "." Your post must have 1 character & not more than 200 characters";
						}

		if($sidM == "" && $typeM == "" && $postM == "")
		{
			if($db_found)

				$SQL = "SELECT * FROM post WHERE TIME=$time && SID=$sid";
					$result = mysqli_query($conn,$SQL);
					$num_rows = mysqli_num_rows($result);
					
					if ($num_rows > 0) {
						header('Location: cant.php');
					}

			else
			{
				$SQL = "INSERT INTO post VALUES ($sid,$type,$date,$post,$time)";
							$result = mysqli_query($conn,$SQL);
							mysqli_close($conn);
							header('Location: can.php');
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
	<title>Ekota-Post</title>
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
                            <li><a href="addDoctor.php">Add Doctor Info</a></li>
                            <li><a href="showDoc.php">All Doctor Info</a></li>                        
                        </ul>                    
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">Post <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="post.php">Add Post</a></li>
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
						<h2 style="color:blue"><strong>Post Here</strong><h2>
					</div>
				</div>
		

			

		<form name="signup" method="POST" action="post.php">
			<div class="row">
				<table>

					<tr>
					<th><label>Social ID:</label></th>
					<td><input class="fsignup" type="number" name="sid" maxlength="8"/><span class="error"> <?php echo $sidM;?></span></td>
					</tr>

					<tr>
					<th rowspan="7"><label>Post Type:</label></th>
					<td><input type="radio" name="typee" value="Blood Donation"/><strong>Blood Donation</strong></td>
					</tr>
					<tr>
					<td><input type="radio" name="typee" value="Financial Donation"/><strong>Financial Donation</strong><span class="error"><?php echo $typeM;?></span></td>
					</tr>
					<tr>
					<td><input type="radio" name="typee" value="Road Constraction"/><strong>Road Construction</strong></td>
					</tr>
					<tr>
					<td><input type="radio" name="typee" value="Charity"/><strong>Charity</strong></td>
					</tr>
					<tr>
					<td><input type="radio" name="typee" value="Orphanage"/><strong>Orphanage</strong></td>
					</tr>
					<tr>
					<td><input type="radio" name="typee" value="Cleaning"/><strong>Cleaning</strong></td>
					</tr>
					<tr>
					<td><input type="radio" name="typee" value="Rearing senior citizen"/><strong>Rearing senior citizen</strong></td>
					</tr>
					

					<tr>
					<th><label>Enter Your Post:</label></th>
					<td><textarea class="fsignup" name="postt" rows="7" cols="50" maxlength="500"/></textarea><span class="error"> <?php echo $postM;?></span></td>
					</tr>

					

				</table>
			</div>
				<input type='submit' name='textarea' class='btn btn-primary btn-lg' value='Submit'/>

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