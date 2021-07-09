<?php
session_start();
include ("connection.php");

$category = $_POST['category'];
$name = $_POST['name'];

$image = $_FILES['image']['name'];
// image file directory
$target = "../images/".basename($image);

$writeName = $_POST['writerName'];
$description = $_POST['description'];
$totalBook = $_POST['totalBook'];

$sql = "SELECT * FROM `book` WHERE `name` = '{$name}'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();

$old_name = "";
if(isset($row['name']))
    $old_name = $row['name'];

if($old_name != $name){

    $sql = "INSERT INTO `book`( `category`, `name`, `image`, `writename`, `description`, `totalbook`) 
VALUES 
       ('$category','$name','$image','$writeName','$description','$totalBook')";

    if ($conn->query($sql) == true){
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        header('location:../add_book.php?msg=New Book Added.');
    }
    else{
        header('location:../add_book.php?msg=Connection Error.');
    }
}
else{
    header('location:../add_book.php?msg=Book Already In Store');
}

$conn->close();