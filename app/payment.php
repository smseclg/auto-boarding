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
		echo "Hellow User : " . $_SESSION["username"] . ".<br>";
		echo "User Status : " . $_SESSION["authuser"] . ".<br>";
		echo"-----------------------------------------"."<br>";

		echo "<br>";
		
		$sql = "SELECT * FROM `payment` ORDER BY paymentid DESC LIMIT 6";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) 
		{
			echo "<table style=\"width:100%\"><tr>
				<th>Payment ID</th>
				<th>Payment Amount</th>
				<th>Payment Date</th>
				<th>Boarder ID</th>
				<th>Room ID</th>
			  </tr>";
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				echo "<td>".$row["paymentid"]."</td>";
				echo "<td>".$row["paymentamt"]."</td>";
				echo "<td>".$row["paymentdate"]."</td>";
				echo "<td>".$row["paymentboarder"]."</td>";
				echo "<td>".$row["paymentroomid"]."</td>";
				echo "</tr>";
			}
			
			echo "</table>";
			echo "<br>";
		}
		else
		{
			echo "0 results";
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

	<script type="text/javascript">
		function enablesTextSharing(answer)
		{
			console.log(answer.value);
			if (answer.value == "SH")
			{
				document.getElementById('sharingtxt').classList.remove('d-none');
			}
			else
			{
				document.getElementById('sharingtxt').classList.add('d-none');
			}

		}	
	</script>

<img src="img/home.PNG" alt="Home-Sketch" width="500" height="300">
<br>
<form method="post" action="pay-boarder.php" name="pay-boarder">

  <div class="container">
    <label>Choose a room for add payment:</label>
	<br>
	
		<select name="rooms" id="rooms" onChange="enablesTextSharing(this)">
	
		<?php
			$sql = "SELECT * FROM `room` WHERE roomstatus = 0;";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo '<option value='.$row['roomna'].'>'.$row['roomdesc'].'</option>';
			}
			echo '<option value='.'SH'.'>'.'Sharing'.'</option>';
		?>
	</select>
	
	<p>If sharing mention the room name here </p>
	<input type="text" name="sharingtxt" id="sharingtxt" class="d-none" value="Sharing Room ID">
	<br><br>
	
    <br>
    <button type="submit" name="payadd" value="payadd">Add Payment</button>
  </div>

</form>


<br><br><a href="dashboard.php">Go to Main Page!!!</a>

</body>
</html>







