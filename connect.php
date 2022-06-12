<?php
$servername = "freedb.tech";
$username = "freedbtech_Animesh";
$password = "animesh@1999";
$dbname = "freedbtech_stockdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>