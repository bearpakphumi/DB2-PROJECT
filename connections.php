<?php
// Connection with Database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create the Connection
$conn = new mysqli($servername, $username, $password, $dbname); // mySQL Connection


// Verify Connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error); // Fail
}

// If Connection is established
// echo "Connction Successfully"; // OK

?>