<?php

include "connection.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if($password == $confirmPassword){
    $query = "SELECT * FROM `register` WHERE `username` = '{$username}'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if($username == !$row["username"]){
        $sql = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `username`, `password`)
VALUES 
       ('{$firstname}','{$lastname}','{$email}','{$username}','{$password}')";

        if ($conn->query($sql) === TRUE) {
            header('location:../index.php?msg=You have registered successfully.');
        } else {
            echo "Error creating database: " . $conn->error;
        }
    }
    else{
        header('location:../register.php?msg=User already exist.');
    }

}else{
    header('location:../register.php?msg=Password are not matched.');
}

$conn->close();