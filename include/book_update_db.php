<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON, TRUE);

if(isset($input['name']) && isset($input['writer'])){
    $name = $input['name'];
    $writer = $input['writer'];
    $totalbook = $input['totalbook'];
    $description = '';

    $sql = "SELECT * FROM `book` WHERE `name` = '$name' AND `writename` = '$writer'";
    $res = $conn->query($sql);
    $row = $res->num_rows;

    if ($row > 0){

        if (!empty($input['description'])){
            $description = $input['description'];
        }
        else{
            $res = $res->fetch_assoc();
            $description = $res['description'];
        }

        $sql = "UPDATE `book` SET `totalbook`='$totalbook' ,`description` = '$description'
                                WHERE `name` = '{$name}' AND `writename` = '{$writer}'";

        if($conn->query($sql) === TRUE){
            //header("location:./book_update.php?msg=Book Updated.");
            print ("Book Updated.");
        } else{
            //header("location:./book_update.php?msg=Book is not found.");
            print ("Book is not found.");
        }
    }
    else{
        // header("location:./book_update.php?msg=Book is not found.");
        print ("Book is not found.");
    }
}
$conn->close();