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
			echo "<b>Got Payment Details</b>"."<br>";
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
		
		$sql = "SELECT SUM(paymentamt) AS paysum FROM `payment`";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0){
			
			//var_dump ($result);
			//print_r ($result);
			$row = mysqli_fetch_assoc($result);
			echo "Total collection : ".$row["paysum"];
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
