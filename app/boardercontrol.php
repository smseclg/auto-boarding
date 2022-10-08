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

	if (isset($_POST['save'])) {
		$name = $_POST['bname'];
		$startdate = $_POST['startdate'];
        $keymoney = $_POST['keymoney'];
		$boarderstatus = $_POST['boarderstatus'];
		$boarderroomid = $_POST['rooms'];
		$boardermonthlyrent = $_POST['monthlyrent'];
		
		echo $name."<br>";
		echo $startdate."<br>";
		echo $keymoney."<br>";
		echo $boarderstatus."<br>";
		echo $boarderroomid."<br>";
		echo $boardermonthlyrent."<br>";
		
		$sql = "INSERT INTO  boarder (boarderna, boarderstartdate, boarderkeymoneyamt, boarderstatus, boarderroomid, boardermonthlyrent) VALUES ('$name', '$startdate', $keymoney, $boarderstatus, '$boarderroomid', $boardermonthlyrent)";

		if(mysqli_query($conn,$sql))
		{
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
		 
		// Close connection
		mysqli_close($conn);
	//	$_SESSION['message'] = "Memeber saved"; 
		//header('location: member.php');
	}	
	}
	
?>