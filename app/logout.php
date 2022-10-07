<?php
session_start();
//if(!isset($_SESSION['authuser']))
if($_SESSION['authuser'] == 0)
    {
        header("location: ../index.php");
        //exit;
		echo "Login to the system first"."<br>";
    } 
    else 
    {
    // Show users the page!
    // Echo session variables that were set on previous page
    
    echo "User Status : " . $_SESSION["authuser"] . ".<br>";
	echo "Hellow User : " . $_SESSION["username"] . ".<br>";
	
	
?>

<!DOCTYPE html>
<html>
<body>

<?php

echo "Good Bye : ". $_SESSION["username"];
// remove all session variables
session_unset();

// destroy the session
session_destroy();
  }
?>

</body>
</html>
