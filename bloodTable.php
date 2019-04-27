
<?php
	include "config.php";
	$blood = "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
			if(empty($_POST['blood'])) {
				header('Location: needBlood.php');
				}
			else 
            {
				$blood="'".($_POST['blood'])."'";
				$blood=test_input($blood);
                echo $blood;
            }
                if($blood == "'A+'")
                {
                    header('Location: a+.php');
                }
                else if($blood == "'A-'")
                {
                    header('Location: a-.php');
                }
                else if($blood == "'B+'")
                {
                    header('Location: b+.php');
                }
                else if($blood == "'B-'")
                {
                    header('Location: b-.php');
                }
                else if($blood == "'O+'")
                {
                    header('Location: o+.php');
                }
                else if($blood == "'O-'")
                {
                    header('Location: o-.php');
                }
                else if($blood == "'AB+'")
                {
                    header('Location: ab+.php');
                }

               

		  
	}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = strtoupper($data);
   return $data;
}
?>