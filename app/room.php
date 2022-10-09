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
	//}
?>


<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>
<img src="img/home.PNG" alt="Home-Sketch" width="500" height="300">
<form method="post" action="boardercontrol.php" name="boardercontrol">

  <div class="container">
    <label>Room-Name</label>
    <input type="text" name="roomname" pattern="[a-zA-Z0-9]+" required />
    <br>
	<label>Description</label>
    <input type="text" name="roomdesc" />
    <br>
 <!-- 	
	<label>Key Money Amount</label>
    <input type="number" name="keymoney" required />
    <br>
	<label for="rooms">Choose a room:</label>

	<select name="rooms" id="rooms">
	  <option value="A">A Room</option>
	  <option value="B">B Room</option>
	  <option value="C">C Room</option>
	  <option value="E">E Room</option>
	  <option value="F">F Room</option>
	  <option value="G">G Room</option>
	</select>
	<br>
	<label>Monthly Rent Amount</label>
    <input type="number" name="monthlyrent" required />
    <br>
-->

	<p>Room Status is </p>
	<input type="radio" id="active" name="roomstatus" value="1">
	<label for="html">Vacant</label><br>
	<input type="radio" id="left" name="roomstatus" value="0">
	<label for="css">Occupied</label>
	<br>
    <br>
    <button type="submit" name="roomsave" value="roomsave">Save</button>
    <button type="reset" name="reset" value="reset">Reset</button>
  </div>

</form>

<?php
$sql = "SELECT * FROM room";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<table style=\"width:100%\"><tr><th>Room ID</th>
    <th>Room Name</th>
    <th>Room Status</th>
	<th>Room Description</th>
  </tr>";
  
  while($row = mysqli_fetch_assoc($result)) 
  {
    //echo "boarderidid: " . $row["boarderid"]. " - Name: " . $row["boarderna"]. " " . $row["boarder-start-date"]. $row["boarder-keymoneyamt"]. " " .$row["boarder-status"]. "<br>";
	echo "<tr>";
	echo "<td>".$row["roomid"]."</td>";
	echo "<td>".$row["roomna"]."</td>";
	echo "<td>".$row["roomdesc"]."</td>";
	//echo "<td>".$row["roomstatus"]."</td>";
	
	if ($row["roomstatus"] == 1){
		echo "<td>Vacant</td>";
	}
	else {
		echo "<td>Occupied</td>";
	}
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
}
?>

</body>
</html>	