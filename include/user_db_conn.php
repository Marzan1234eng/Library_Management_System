<?php
session_start();

include "connection.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['username'];
$oldPassword = $_POST['old_password'];
$newPassword = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

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
                    header("location:../user_update.php?msg=User Updated");
                }
            }
            else{
                header("location:../user_update.php?msg=Password Do Not Match");
                //echo "Password Do Not Match";
            }
        }
        else{
            header("location:../user_update.php?msg=Incorrect Password");
            //echo "Incorrect Password";
        }
    }else{
        header("location:../user_update.php?msg=Wrong User Name");
       // echo "Wrong User Name";
    }
}else{
    header("location:../user_update.php?msg=Wrong User Name");
    //echo "Wrong User Name";
}


$conn->close();