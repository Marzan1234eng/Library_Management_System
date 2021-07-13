<?php
session_start();
include "connection.php";

$id = $_GET['id'];
$name = $_GET['name'];

$sql = "SELECT * FROM `category` WHERE `name` = '{$name}' ";
$res = $conn->query($sql);
$row = $res->num_rows;

if($row == 0){

    $sql = "INSERT INTO `category`(`name`) VALUES '{$name}'";

    if($conn->query($sql) == true){
        header("location:../category.php?msg=New Category Added.");
    }
    else{
        header("location:../category.php?msg=Connection Error.");
    }
}
else{
    header("location:../category.php?msg=Category Already Exist.");
}

$conn->close();