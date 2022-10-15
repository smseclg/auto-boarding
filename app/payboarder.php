<?php
session_start();

include('config/db.php');
include('app/pay-boarder.php');

//if(!isset($_SESSION['authuser']))
if($_SESSION['authuser'] == 0)
    {
        //header("location: ./login.php");
        //exit;
		echo "Logging to the Syatem first !!!";
    } 
    else 
    {
		echo "Hellow User : " . $_SESSION["username"] . ".<br>";
		echo "User Status : " . $_SESSION["authuser"] . ".<br>";
		echo"-----------------------------------------"."<br>"; 
		
		if (isset($_POST['payadd'])) 
		{
			$boarderroomid = $_POST['rooms'];
			
			echo $boarderroomid."<br>";
			
			DetailsBoarderRooms();
			
		}
		

			
	}

?>


<!DOCTYPE html>
<html>
<head>

</head>
<body>

</body>
</html>