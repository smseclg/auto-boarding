<?php
session_start();

//if(!isset($_SESSION['authuser']))
if($_SESSION['authuser'] == 0)
    {
        //header("location: ./login.php");
        //exit;
		echo "Logging to the Syatem first !!!";
    } 
    else 
    {
	
	}

?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <label>Boarder-Name</label>
    <input type="text" name="roomname" pattern="[a-zA-Z0-9]+" required />
    <br>
	<label>Description</label>
    <input type="text" name="roomdesc" />
    <br>

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

</body>
</html>
