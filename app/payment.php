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

</body>
</html>







