<?php
$servername = "localhost";
$username = "root";
$password = "";	
$dbname = "nln_b1906336";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();
?>