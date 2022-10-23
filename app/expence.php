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
		
		echo "<form method=\"post\" action=\"boardercontrol.php\" name=\"boardercontrol\">";
		echo "<br>";
		echo "<label>Expense Date : </label>";
		echo "<br>";
		echo "<input type=\"date\" id=\"expdate\" name=\"expdate\">";
		echo "<br><br>";
		echo "<label>Expense Type : </label><br>";
		echo "<select name=\"exp\" id=\"exp\">";
			$sql = "SELECT * FROM `expensetypes`;";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo '<option value='.$row['exptypeid'].'>'.$row['exptypena'].'</option>';
			}
		echo "</select>";
		echo "<br><br>";
		echo "<label>Expense Amount : </label>";
		echo "<br>";
		echo "<input type=\"number\" name=\"expamt\" required />";
		echo "<br><br>";
		
		echo "<button type=\"submit\" name=\"expsave\" value=\"expsave\">Save</button>";
		echo "<button type=\"reset\" name=\"reset\" value=\"reset\">Reset</button>";
		echo "</form>";
		

			
		

	
	
	
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
