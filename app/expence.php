<?php
session_start();

include('config/db.php');

//if(!isset($_SESSION['authuser']))
if($_SESSION['authuser'] == 0)
    {
        //header("location: ./login.php");
        //exit;
		echo "Logging to the Syatem first !!!";
    } 
    else 
    {
		// Show users the page!
		// Echo session variables that were set on previous page
		echo "Hellow User : " . $_SESSION["username"] . ".<br>";
		echo "User Status : " . $_SESSION["authuser"] . ".<br>";
		echo"-----------------------------------------"."<br>";
		
		$sql = "SELECT * FROM `payment`";
		$result = mysqli_query($conn, $sql);
		

			
		

	
	
	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		table, th, td {
		  border:1px solid black;
		}
		
		.d-none {
			display: none;
		}
	</style>

</head>
<body>

<br><a href="dashboard.php">Go to Add Main page!!!</a><br>

</body>
</html>
