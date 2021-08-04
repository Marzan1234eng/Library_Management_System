<?php

include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON, TRUE);

$name = $input['name'];
$email = $input['email'];
$number = $input['number'];
$dob = $input['dob'];
$bloodgroup = $input['bloodgroup'];

$sql = "SELECT * FROM `member` WHERE `email` = '{$email}' OR `number` = '{$number}'";
$result = $conn->query($sql);

if ($conn->query($sql) == true) {

    $row = $result->fetch_assoc();

    if (isset($row['email']) && isset($row['number'])){
        print ("Member Already Exists.");
    }else{
        $sql = "INSERT INTO member (`name` ,`email` ,`number`, `dob`, `blood-group`) 
                                        VALUES 
                           ('$name','$email','$number','$dob','$bloodgroup')";
        $conn->query($sql);
        //header("location:../add_member.php?msg=Member Added");
        print ("Member Added");
    }

}else {
    die("Connection failed: " . mysqli_connect_error());
}
$conn->close();