<?php
session_start();

include('config/db.php');
include('boardercontrol.php');

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
			$roomid = $_POST['rooms'];
			
			//echo $roomid."<br>";
			echo "<h1>Details Room / Boarder</h1>"."<br>";
			
			$ArrayBoarderDetails = DetailsBoarderRooms($roomid,$conn);
			
			//var_dump ($ArrayBoarderDetails);
			$bid = $ArrayBoarderDetails[0];
			$brid = $ArrayBoarderDetails[1];
			
			echo "<form method=\"post\" action=\"boardercontrol.php\" name=\"boardercontrol\">";
			echo "<br><br>";
			echo "<label>Monthly Money Amount</label>";
			echo "<br>";
			echo "<input type=\"number\" name=\"keymoney\" required />";
			echo "<br><br><label>Payment Date</label>";
			echo "<br><input type=\"date\" id=\"paydate\" name=\"paydate\">";
			echo "<br>";
			echo "<br><br>";
			echo "<input type=\"hidden\" id=\"bid\" name=\"bid\" value=$bid>";
			echo "<input type=\"hidden\" id=\"brid\" name=\"brid\" value=$brid>";
			echo "<button type=\"submit\" name=\"roompay\" value=\"roompay\">Save</button><br>";
			echo "</form>";
			
		}
		

		mysqli_close($conn);	
	}

?>


<!DOCTYPE html>
<html>
<head>

</head>
<body>

</body>
</html>