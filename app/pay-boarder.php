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
			$subroomid = $_POST['sharingtxt'];
			
			if ($roomid == "SH")
			{
				echo $subroomid."<br>";
				echo "<h1>Details Sharing Room / Boarder</h1>"."<br>";
				$outcome = SharingBoarderDetails($subroomid,$conn);

				//var_dump ($outcome);
				$arrlength =  count($outcome);
				
				//Get the variable type (INT/String etc etc)
				//echo gettype($arrlength);
				
				echo "<form method=\"post\" action=\"boardercontrol.php\" name=\"boardercontrol\">";
				echo "<label for=\"cars\">Choose a Boarder to add Payment:</label><br>";

				echo "<select name=\"cars\" id=\"cars\">";
				  
				  if ($arrlength >= 0)
				  {	
					
					for($x = 0; $x < $arrlength; $x++)
					{
						$someWords = $outcome[$x];
						//echo "<br>".$someWords."********************<br>";
						$wordChunks = explode("&", $someWords);
						//var_dump ($outcome);
						echo "<option value=\"$wordChunks[0]\">Boarder ID : $wordChunks[0]</option>";
					}
			
				  }
				  else
				  {
					  echo "No Data !!!";
				  }
				echo "</select>";
				
				echo "<br><br>";
			
				echo "<label>Monthly Money Amount</label>";
				echo "<br>";
				echo "<input type=\"number\" name=\"paymoney\" required />";
				echo "<br><br><label>Payment Date</label>";
				echo "<br><input type=\"date\" id=\"paydate\" name=\"paydate\">";
				echo "<br>";
				echo "<br><br>";
				echo "<input type=\"hidden\" id=\"bid\" name=\"bid\" value=$bid>";
				echo "<input type=\"hidden\" id=\"brid\" name=\"brid\" value=$brid>";
				echo "<button type=\"submit\" name=\"roompay\" value=\"roompay\">Add Payment</button><br>";
				echo "</form>";
				
				
				if ($arrlength >= 0)
				{	
					for($x = 0; $x < $arrlength; $x++)
					{
						$someWords = $outcome[$x];
						//echo "<br>".$someWords."********************<br>";
						$wordChunks = explode("&", $someWords);
						//var_dump ($outcome);
						//echo "<option value=\"$wordChunks[0]\">Boarder ID : $wordChunks[0]</option>";
						
						$sql = "SELECT * FROM `payment` WHERE paymentboarder = '$wordChunks[0]'";
						//echo $sql."<br>";
						$result = mysqli_query($conn, $sql);
						
						if (mysqli_num_rows($result) > 0) 
						{
						  // output data of each row
						  echo "<table style=\"width:100%\">
						  <tr>
							<th>Boarder ID</th>
							<th>Boarder Payment Date</th>
							<th>Boarder Payment</th>
							<th>Boarder Room ID</th>
						  </tr>";
						  
						   while($row = mysqli_fetch_assoc($result)) 
							  {
								echo "<tr>";
								echo "<td>".$row["paymentboarder"]."</td>";
								echo "<td>".$row["paymentdate"]."</td>";
								echo "<td>".$row["paymentamt"]."</td>";
								echo "<td>".$row["paymentroomid"]."</td>";
							  }
						    
							echo "<br>";
						}
						else
						{
							echo "No payments found!!!";
							echo "<br>";
						}				
					}
			
				}
				else
				{
					  echo "No Data !!!";
				}								
			}
			else
			{			
				echo $roomid."<br>";
				echo "<h1>Details Room / Boarder</h1>"."<br>";
				
				$ArrayBoarderDetails = DetailsBoarderRooms($roomid,$conn);
				
				//var_dump ($ArrayBoarderDetails);
				$bid = $ArrayBoarderDetails[0];
				$brid = $ArrayBoarderDetails[1];
				
				echo "<form method=\"post\" action=\"boardercontrol.php\" name=\"boardercontrol\">";
				echo "<br><br>";
				echo "<label>Monthly Money Amount</label>";
				echo "<br>";
				echo "<input type=\"number\" name=\"paymoney\" required />";
				echo "<br><br><label>Payment Date</label>";
				echo "<br><input type=\"date\" id=\"paydate\" name=\"paydate\">";
				echo "<br>";
				echo "<br><br>";
				echo "<input type=\"hidden\" id=\"bid\" name=\"bid\" value=$bid>";
				echo "<input type=\"hidden\" id=\"brid\" name=\"brid\" value=$brid>";
				echo "<button type=\"submit\" name=\"roompay\" value=\"roompay\">Add Payment</button><br>";
				echo "</form>";
				
				$sql = "SELECT * FROM `payment` WHERE paymentroomid = '$roomid'";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) 
				{
				  // output data of each row
				  echo "<table style=\"width:100%\">
				  <tr>
					<th>Boarder ID</th>
					<th>Boarder Payment Date</th>
					<th>Boarder Payment</th>
					<th>Boarder Room ID</th>
				  </tr>";
				  
				   while($row = mysqli_fetch_assoc($result)) 
					  {
						echo "<tr>";
						echo "<td>".$row["paymentboarder"]."</td>";
						echo "<td>".$row["paymentdate"]."</td>";
						echo "<td>".$row["paymentamt"]."</td>";
						echo "<td>".$row["paymentroomid"]."</td>";
					  }
				}
				else
				{
					echo "No payments found!!!";
				}
			}
		}
		

		mysqli_close($conn);	
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

</body>
</html>