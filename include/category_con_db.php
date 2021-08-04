<?php
session_start();
include "connection.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON, TRUE);

$name = $input['name'];

$sql = "SELECT * FROM `category` WHERE `name` = '{$name}' ";
$res = $conn->query($sql);
$row = $res->num_rows;

if($row == 0){

    $sql = "INSERT INTO `category`(`name`) VALUES '{$name}'";

    if($conn->query($sql) == true){
        echo "hello";
        //header("location:../add_category.php?msg=New Category Added.");
        print ("New Category Added.");
    }
    else{
        //header("location:../add_category.php?msg=Connection Error.");
        print ("Connection Error.");
    }
}
else{
    //header("location:../add_category.php?msg=Category Already Exist.");
    print ("Category Already Exist.");
}

$conn->close();