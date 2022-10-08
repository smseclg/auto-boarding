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
    <label>Boarder-Name</label>
    <input type="text" name="bname" pattern="[a-zA-Z0-9]+" required />
    <br>
	<label>Start Date</label>
    <input type="date" id="startdate" name="startdate">
    <br>
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
	<p>Boarder Status is </p>
	<input type="radio" id="active" name="boarderstatus" value="1">
	<label for="html">Active</label><br>
	<input type="radio" id="left" name="boarderstatus" value="0">
	<label for="css">Left</label>
	<br>
    <br>
    <button type="submit" name="save" value="save">Save</button>
    <button type="reset" name="reset" value="reset">Reset</button>
  </div>

</form>

<?php
$sql = "SELECT * FROM boarder";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<table style=\"width:100%\"><tr><th>Boarder ID</th>
    <th>Boarder Name</th>
    <th>Boarder Start Date</th>
	<th>Boarder Key Money</th>
	<th>Boarder Room ID</th>
	<th>Boarder Monthly Rent</th>
	<th>Boarder Status</th>
  </tr>";
  while($row = mysqli_fetch_assoc($result)) 
  {
    //echo "boarderidid: " . $row["boarderid"]. " - Name: " . $row["boarderna"]. " " . $row["boarder-start-date"]. $row["boarder-keymoneyamt"]. " " .$row["boarder-status"]. "<br>";
	echo "<tr>";
	echo "<td>".$row["boarderid"]."</td>";
	echo "<td>".$row["boarderna"]."</td>";
	echo "<td>".$row["boarderstartdate"]."</td>";
	echo "<td>".$row["boarderkeymoneyamt"]."</td>";
	echo "<td>".$row["boarderroomid"]."</td>";
	echo "<td>".$row["boardermonthlyrent"]."</td>";
	//echo "<td>".$row["boarderstatus"]."</td>";
	if ($row["boarderstatus"] == 1){
		echo "<td>ACTIVE</td>";
	}
	else {
		echo "<td>LEFT</td>";
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