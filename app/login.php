<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config/db.php');

if (isset($_POST['login'])) {

	$username = $_POST['username'];
        $password = $_POST['password'];

        //echo $username;
	
	$sql = "SELECT upass FROM user where uname='$username'";
	$result = mysqli_query($conn, $sql);
#	print_r ($result);
	
	if (mysqli_num_rows($result) > 0) 
        {

	  // output data of each row
	  /*
          while($row = mysqli_fetch_assoc($result)) {
		echo "id: " . $row["uid"]. " - Name: " . $row["uname"]. " " . $row["upass"]. "<br>";
	  }
          */

          while($row = mysqli_fetch_assoc($result)) 
          {
           //echo "Password: " . $row["upass"];
           $userpass =  $row["upass"];
          }
          //echo "Password: " . $userpass;
          
          if ($password == $userpass)
          {
          echo "User is authenticated";
		  
		  error_log("INFO - User Logged : ".$username);
		  
          session_start();
          $_SESSION["authuser"] = 1;
          $_SESSION["username"] = $username;
          echo "Session variables are set.<br>";
          header("location: ./dashboard.php");
          }
          else
          {
          echo "Please check the Password. Password is wrong";
          // remove all session variables
		session_unset();

	  // destroy the session
		session_destroy();
          }  

	} 
        else 
        {
	  
          echo "0 results <br> User Not Found!!";
          // remove all session variables
                session_unset();

          // destroy the session
                session_destroy();
		
	}
/*
This is multiline comment
*/
	mysqli_close($conn);

}

?>
