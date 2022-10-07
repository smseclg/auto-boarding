<?php
$servername = "db";
$username = "rent";
$password = "rent";
$dbname = "rent";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  echo "Error connecting database: " . mysqli_error($conn);
}

#echo "Database connected successfully!!! " . mysqli_error($conn);

#mysqli_close($conn);
?>

