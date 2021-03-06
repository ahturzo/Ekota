<!DOCTYPE HTML>
<html>
<head>
    <title>Office's Info</title>
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

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
            }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
            }

    tr:nth-child(even) {
        background-color: #dddddd;
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
                    <li class="active"><a href="office.php">office's</a></li>
                    <li><a href="addmember.php">SignUp</a></li> 
                </ul> 
            </div>
         </nav> 
    </div>

                <div class="row">
                        <div id = "heading" >
                            <h2 style="color:blue"><strong>Office's Info</strong><h2>
                        </div>
                    </div>

            <div class="row">
                <table>
                    
                <tr>
                    <th>Office Name</th>
                    <th>Office Owner</th>
                    <th>Office Address</th>
                    <th>Office Contact No</th>
                    <th>Owner Contact No</th>
                    <th>Owner Email ID</th>
                </tr>

                <?php

                $server='localhost';
                $name='root';
                $pass='';
                $database='EKOTA';

                $conn=mysqli_connect($server,$name,$pass);
                $db_found=mysqli_select_db($conn,$database);

                $sql="Select o.Office_Name,concat(m.FIRST_NAME,' ' ,m.MIDDLE_NAME, ' ' ,m.LAST_NAME) AS Name , Office_Location,Office_Contact_NO,m.Phone_Number,m.EMAIL_ID From OfficesandStores o JOIN members m Where o.Owner_ID=m.SID";
                $result= $conn->query($sql);


                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Office_Name"]. "</td>";
                        echo "<td>" . $row["Name"]. "</td>";
                        echo "<td>" . $row["Office_Location"]. "</td>";
                        echo "<td>" . $row["Office_Contact_NO"] . "</td>";
                        echo "<td>" . $row["Phone_Number"] . "</td>";
                        echo "<td>" . $row["EMAIL_ID"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();

                ?>
                </table>
            </div>

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