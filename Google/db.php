<?php
$host = "localhost";
$user = "root"; // Default XAMPP username
$pass = "";     // Default XAMPP password is blank
$dbname = "complaint_system";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>