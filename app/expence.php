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
		
		echo "<br>";
		//$sql = "SELECT * FROM `expenses` ORDER BY expid DESC LIMIT 6";
		$sql = "SELECT expenses.expid AS expid, expenses.expdate AS expdate, expenses.expamt AS expamt, expensetypes.exptypena AS exptypena FROM `expenses` INNER JOIN expensetypes ON expenses.exptypeid=expensetypes.exptypeid ORDER BY expid DESC LIMIT 6";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) 
		{
			echo "<table style=\"width:100%\"><tr>
				<th>Expenses ID</th>
				<th>Expenses Amount</th>
				<th>Expenses Date</th>
				<th>Expenses Type</th>
			  </tr>";
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				echo "<td>".$row["expid"]."</td>";
				echo "<td>".$row["expamt"]."</td>";
				echo "<td>".$row["expdate"]."</td>";
				echo "<td>".$row["exptypena"]."</td>";
				echo "</tr>";
			}
			
			echo "</table>";
			echo "<br>";
		}
		else
		{
			echo "0 results";
		}
	
		
		
		
		
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
