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
    // Show users the page!
    // Echo session variables that were set on previous page
    echo "Hellow User : " . $_SESSION["username"] . ".<br>";
    echo "User Status : " . $_SESSION["authuser"] . ".<br>";
	echo"-----------------------------------------"."<br>";
	echo "<a href=\"boarder.php\">Boarder Contract</a>"."<br>";
	
	echo "<br>";
	echo "<br>";
	echo "For logout from the system click on.."."<br><a href=\"logout.php\">LogOut</a>";
	
	}

?>

<!DOCTYPE html>
<html>
<body>


</body>
</html>
