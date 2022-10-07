<?php
session_start();
include('config/db.php');

if (isset($_POST['login'])) {

	$username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
	
	$sql = "SELECT * FROM user where uname='$username'";
	$result = mysqli_query($conn, $sql);
#	print_r ($result);
	
	if (mysqli_num_rows($result) > 0) {

	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		echo "id: " . $row["uid"]. " - Name: " . $row["uname"]. " " . $row["upass"]. "<br>";
	  }

	} else {
	  echo "0 results";
	}
/*
This is multipline comment
*/
	mysqli_close($conn);

}

?>
