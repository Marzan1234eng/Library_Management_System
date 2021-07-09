<?php
session_start();
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT `username`, `password` FROM `register` WHERE `username` = '{$username}' AND `password` = '{$password}'";

$result = $conn->query($sql);

if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $_SESSION["username"] = $row["username"];
    header("location:../dashboard.php");
}
else{
    header("location:../index.php?msg=Username password is incorrect.");
}
$conn->close();