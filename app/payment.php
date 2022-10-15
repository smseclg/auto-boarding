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

</head>
<body>

<img src="img/home.PNG" alt="Home-Sketch" width="500" height="300">
<br>
<form method="post" action="pay-boarder.php" name="pay-boarder">

  <div class="container">
    <label>Choose a room for add payment:</label>
	<br>
	
		<select name="rooms" id="rooms">
	
		<?php
			$sql = "SELECT * FROM `room` WHERE roomstatus = 0;";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo '<option value='.$row['roomna'].'>'.$row['roomdesc'].'</option>';
			}
		?>
	</select>
	<br>
	

    <br>
    <button type="submit" name="payadd" value="payadd">Add Payment</button>
  </div>

</form>

</body>
</html>







