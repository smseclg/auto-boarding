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
				$boardersharingroomna = $_POST['sharingtxt'];
				
				echo $name."<br>";
				echo $startdate."<br>";
				echo $keymoney."<br>";
				echo $boarderstatus."<br>";
				echo $boarderroomid."<br>";
				echo $boardermonthlyrent."<br>";
				echo $boardersharingroomna."<br>";
				
				$sql = "INSERT INTO  boarder (boarderna, boarderstartdate, boarderkeymoneyamt, boarderstatus, boarderroomid, boardermonthlyrent, boardersharingroom) VALUES ('$name', '$startdate', $keymoney, $boarderstatus, '$boarderroomid', $boardermonthlyrent, '$boardersharingroomna')";

				if(mysqli_query($conn,$sql))
				{
					echo "Records added successfully."."<br>";
				} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
									
				$sql = "UPDATE `room` SET `roomstatus` = '0' WHERE `room`.`roomna` = \"$boarderroomid\"";
				//echo $sql;				

				if(mysqli_query($conn,$sql))
				{
					echo "Records Updated successfully.";
				} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}			
				 
				// Close connection
				mysqli_close($conn);
			//	$_SESSION['message'] = "Memeber saved"; 
				//header('location: member.php');
			}

			if (isset($_POST['roomsave'])) {
				$roomname = $_POST['roomname'];
				$roomdesc = $_POST['roomdesc'];
				$roomstatus = $_POST['roomstatus'];
				
				echo $roomname."<br>";
				echo $roomdesc."<br>";
				echo $roomstatus."<br>";
				
				$sql = "INSERT INTO  room (roomna, roomdesc , roomstatus) VALUES ('$roomname', '$roomdesc', $roomstatus)";

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
			
			
			if (isset($_GET['updatestatus'])) {
				
				$updatestatus = $_GET['updatestatus'];
				$boarderroomid = $_GET['boarderroomid'];
				
				echo $updatestatus."<br>";
				echo $boarderroomid."<br>";
				
				$sql = "UPDATE `boarder` SET `boarderstatus` = '0' WHERE `boarder`.`boarderid` = $updatestatus";

				if(mysqli_query($conn,$sql))
				{
					echo "Boarder Records Updated successfully."."<br>";
				} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
				
				$sql = "UPDATE `room` SET `roomstatus` = 1 WHERE `room`.`roomna` = \"$boarderroomid\"";

				if(mysqli_query($conn,$sql))
				{
					echo "Room Records Updated successfully.";
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