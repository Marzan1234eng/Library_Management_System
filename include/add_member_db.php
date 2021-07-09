<?php

include "connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$dob = $_POST['dob'];
$bloodgroup = $_POST['bloodgroup'];

$sql = "SELECT * FROM `member` WHERE `email` = '{$email}' OR `number` = '{$number}'";
$result = $conn->query($sql);

if ($conn->query($sql) == true) {

    $row = $result->fetch_assoc();

    if ($email == !$row['email'] && $number == !$row['number']) {

        $sql = "INSERT INTO member (`name` ,`email` ,`number`, `dob`, `blood-group`) 
VALUES 
       ('$name','$email','$number','$dob','$bloodgroup')";
        $conn->query($sql);
        header("location:../add_member.php?msg=Member Added");
    }
    else{
        header("location:../add_member.php?msg=Member Already Exists");
    }
}else {
    die("Connection failed: " . mysqli_connect_error());
}
$conn->close();