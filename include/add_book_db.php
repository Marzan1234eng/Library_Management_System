<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON, TRUE);

$category = $input['category'];
$name = $input['name'];

/*$image = $_FILES['image']['name'];
// image file directory
$target = "../images/".basename($image);*/

$writeName = $input['writerName'];
$description = $input['description'];
$totalBook = $input['totalBook'];

$sql = "SELECT * FROM `book` WHERE `name` = '{$name}'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();

$old_name = "";
if(isset($row['name']))
    $old_name = $row['name'];

if($old_name != $name){   /*checking if there is any same name book*/

    $sql = "INSERT INTO `book`( `category`, `name`,  `writename`, `description`, `totalbook`) 
VALUES 
       ('$category','$name', '$writeName','$description','$totalBook')";

    if ($conn->query($sql) == true){
        //move_uploaded_file($_FILES['image']['tmp_name'], $target);
        //header('location:../add_book.php?msg=New Book Added.');
        print ("New Book Added.");
    }
    else{
        //header('location:../add_book.php?msg=Connection Error.');
        print ("Connection Error.");
    }
}
else{
    //header('location:../add_book.php?msg=Book Already In Store');
    print ("Book Already In Store");
}

$conn->close();