<?php
session_start();
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON, TRUE);

$fname = $input['fname'];
$lname = $input['lname'];
$email = $input['email'];
$username = $input['username'];
$oldPassword = $input['old_password'];
$newPassword = $input['password'];
$confirmPassword = $input['confirm_password'];

$session_UserName = $_SESSION['username'];
if($username == $session_UserName){
    $sql = "SELECT * FROM register where username='$username' AND password='$oldPassword'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (empty($fname)){
        $fname = $row['firstname'];
    }
    if(empty($lname)){
        $lname = $row['lastname'];
    }
    if(empty($email)){
        $email = $row['email'];
    }
    if($result->num_rows == 1) {
        if ($oldPassword == $row['password']){
            if ($newPassword == $confirmPassword){
                $sql = "UPDATE `register` SET 
                      `firstname`='$fname',`lastname`='$lname',`email`='$email',`password`='$newPassword' 
WHERE `username` = '$username'";

                if ($conn->query($sql) == true){
                   // header("location:../user_update.php?msg=User Updated");
                    print ("User Updated");
                }
            }
            else{
               // header("location:../user_update.php?msg=Password Do Not Match");
                //echo "Password Do Not Match";
                print ("Password Do Not Match");
            }
        }
        else{
           // header("location:../user_update.php?msg=Incorrect Password");
            //echo "Incorrect Password";
            print ("Incorrect Password");
        }
    }else{
        //header("location:../user_update.php?msg=Wrong User Name");
       // echo "Wrong User Name";
        print ("Incorrect Password");
    }
}else{
    //header("location:../user_update.php?msg=Wrong User Name");
    //echo "Wrong User Name";
    print ("Wrong User Name");
}


$conn->close();