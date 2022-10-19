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

//DB Insert Payment
			if (isset($_POST['roompay'])) 
			{
				$rbid = $_POST['bid'];
				$rid = $_POST['brid'];
				$roompay = $_POST['paymoney'];
				$payday = $_POST['paydate'];
				
				//echo $payday;
				
				$sql = "INSERT INTO  payment (paymentamt, paymentdate , paymentboarder, paymentroomid) VALUES ($roompay , '$payday', $rbid, '$rid')";
				
				echo "$sql";

				if(mysqli_query($conn,$sql))
				{
					echo "Records added successfully.";
				} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
				 
				// Close connection
				mysqli_close($conn);
				
			}

			
//Function 1 -----------------------------------------------------			
			// Get the detils of the boarders and rooms
			function DetailsBoarderRooms($boarderroomid,$conn) 
			{
			  //echo "details-boarder-rooms!<br>";
			  //echo $boarderroomid;
			  
			  //$sql = "SELECT * FROM `room` WHERE `room`.`roomna` = \"$boarderroomid\"";
			  $sql = "SELECT * FROM `room` WHERE `room`.`roomna` = \"$boarderroomid\"";
			  
			  $result = mysqli_query($conn, $sql);
			  			  
				if (mysqli_num_rows($result) > 0) 
					{
						echo "<b>Got ROOM Results</b>"."<br>";
						while($row = mysqli_fetch_assoc($result)) 
						{
								echo "Room ID :".$row["roomid"]."<br>";
								echo "Room Name :".$row["roomna"]."<br>";
								echo "Room Description :".$row["roomdesc"]."<br>";
								echo "Room Status :".$row["roomstatus"]."<br>";
								echo "<br>";
						}
					}
					else
					{
						echo "Got no ROOM results ";
					}
					
					
				$sql = "SELECT * FROM `boarder` WHERE `boarder`.`boarderroomid` = \"$boarderroomid\"";
				//echo $sql;
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) 
					{
						echo "<b>Got Boarder Results</b>"."<br>";
						while($row = mysqli_fetch_assoc($result)) 
						{
								echo "Boarder ID :".$row["boarderid"]."<br>";
								$bid = $row["boarderid"];
								echo "Boarder Name :".$row["boarderna"]."<br>";
								echo "Boarder Start Date :".$row["boarderstartdate"]."<br>";
								echo "Boarder Key Money :".$row["boarderkeymoneyamt"]."<br>";
								echo "Boarder Room ID :".$row["boarderroomid"]."<br>";
								$brid = $row["boarderroomid"];
								echo "Room Sharing Status".$row["boardersharingroom"]."<br>";
								echo "Boarder Monthly Rental :".$row["boardermonthlyrent"]."<br>";
								//return $bid $brid;
								return [$bid, $brid];
						}
					}
					else
					{
						echo "Got no results ";
					}
	
			}

//Function 2 Get Room Sharing User Details -----------------------------------------------------	
			function SharingBoarderDetails($subroomid,$conn)
			{
				//echo "This is inside the function";
				
				$sql = "SELECT * FROM `room` WHERE `room`.`roomna` = \"$subroomid\"";
			  
				$result = mysqli_query($conn, $sql);
							  
					if (mysqli_num_rows($result) > 0) 
						{
							echo "<b>Got ROOM Results</b>"."<br>";
							while($row = mysqli_fetch_assoc($result)) 
							{
									echo "Room ID :".$row["roomid"]."<br>";
									echo "Room Name :".$row["roomna"]."<br>";
									echo "Room Description :".$row["roomdesc"]."<br>";
									echo "Room Status :".$row["roomstatus"]."<br>";
									echo "<br>";
							}
						}
						else
						{
							echo "Got no ROOM results ";
						}
						
						
				$sql = "SELECT * FROM `boarder` WHERE `boarder`.`boardersharingroom` = '$subroomid'";
				//echo $sql;
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) 
					{
						echo "<b>Got Boarder Results</b>"."<br>";
						
						$x = 0;
						$BoarderArray = array();
						
						while($row = mysqli_fetch_assoc($result)) 
						{
								echo "Boarder ID :".$row["boarderid"]."<br>";
								
								$BoarderDetails = $row["boarderid"]."&";
								//echo $BoarderDetails."1111111111111111";
								
								echo "Boarder Name :".$row["boarderna"]."<br>";
								echo "Boarder Start Date :".$row["boarderstartdate"]."<br>";
								echo "Boarder Key Money :".$row["boarderkeymoneyamt"]."<br>";
								echo "Boarder Room ID :".$row["boarderroomid"]."<br>";
								$BoarderDetails = $BoarderDetails.$row["boarderroomid"]."&".$row["boardersharingroom"];
								//echo $BoarderDetails."2222222222222222";
								
								echo "Room Sharing Status".$row["boardersharingroom"]."<br>";
								echo "Boarder Monthly Rental :".$row["boardermonthlyrent"]."<br><br>";
								
								$BoarderArray[$x] = $BoarderDetails;
								$x = $x + 1;
								
								//return [$bid, $brid];
						}
						
						return $BoarderArray;
					}
					else
					{
						echo "Got no results ";
					}
						
						
						
			}
	
	}
	
?>