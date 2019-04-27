<!DOCTYPE>
<html>
<head>
	<title>Error</title>
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
				<h1>No record Found under this Social Number</h1>
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