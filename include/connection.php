<?php

$servername = "localhost";
$serverUsername = "root";
$password = "";
$database = "library_management_system";

$conn = mysqli_connect($servername,$serverUsername,$password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*echo "Connected successfully";*/