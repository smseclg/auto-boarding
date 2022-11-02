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
		
		
		if (mysqli_num_rows($result) > 0) 
		{
			echo "<table style=\"width:100%\">
				  <tr>
					<th>Payment ID</th>
					<th>Payment Date</th>
					<th>Payment</th>
					<th>Room ID</th>
					<th>Boarder ID</th>
					<th>Sharing Status</th>
				  </tr>";
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				echo "<td>".$row["paymentid"]."</td>";
				echo "<td>".$row["paymentdate"]."</td>";
				echo "<td>".$row["paymentamt"]."</td>";
				echo "<td>".$row["paymentroomid"]."</td>";
				echo "<td>".$row["paymentboarder"]."</td>";
				echo "<td>".$row["paymentsharing"]."</td>";
				echo "</tr>";
			}
		}
		else
		{
			echo "Got no results <br>";
			
		}
		
		//get the total of the income from the boarding
		$sql = "SELECT SUM(paymentamt) AS paysum FROM `payment`";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0){
			
			//var_dump ($result);
			//print_r ($result);
			$row = mysqli_fetch_assoc($result);
			echo "<br>Total collection : ".$row["paysum"]."<br>";
		}
		else
		{
			echo "Got no results <br>";
		}
		
		// get the total of the expences		
		$sql = "SELECT SUM(expamt) AS expesum FROM `expenses`";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0){
			
			//var_dump ($result);
			//print_r ($result);
			$row = mysqli_fetch_assoc($result);
			echo "<br>Total Expenses : ".$row["expesum"]."<br>";
		}
		else
		{
			echo "Got no results <br>";
		}
		
		
		// print the expenses table		
	
		$sql = "SELECT expenses.expid AS expeid, expenses.expdate AS expdate, expenses.expamt AS expamt, expensetypes.exptypena AS type FROM `expenses` INNER JOIN expensetypes ON expensetypes.exptypeid=expenses.exptypeid;";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) 
		{
			echo "<table style=\"width:100%\">
				  <tr>
					<th>Expence ID</th>
					<th>Expence Date</th>
					<th>Expence type</th>
					<th>Expence Amount</th>
				  </tr>";
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				echo "<td>".$row["expeid"]."</td>";
				echo "<td>".$row["expdate"]."</td>";
				echo "<td>".$row["type"]."</td>";
				echo "<td>".$row["expamt"]."</td>";
				echo "</tr>";
			}
		}
		else
		{
			echo "Got no results <br>";
			
		}

	
	
	
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

<br><a href="dashboard.php">Go to Add Payment Page!!!</a><br>

</body>
</html>
