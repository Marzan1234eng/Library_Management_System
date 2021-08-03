<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$inputJSON = file_get_contents('php://input');

$input = json_decode($inputJSON, TRUE);
$email = $input['email'];
$b_id = $input['bookId'];

/*echo $email;
echo $b_id;*/

/*$b_id = $_POST['b_id'];
$email = $_POST['email'];*/

$sql = "SELECT * FROM `member` WHERE `email` = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($row['id'])){

    $m_id = $row['id'];
    $sql = "SELECT * FROM `book_issue` WHERE `b_id` = '$b_id' AND `m_id` = '$m_id'";
    $result = $conn->query($sql);


    if ($result->num_rows == False){

        $sql = "SELECT * FROM `book` WHERE `id` = '$b_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (isset($row['totalbook'])){

            $val = $row['totalbook'] - 1;

            $sql = "INSERT INTO `book_issue`
                        (`b_id`, `m_id`, `issue_date`, `expire_date`) 
                                VALUES 
                            ('{$b_id}','{$m_id}', curdate() , curdate() + INTERVAL 7 DAY) ";
            $result = $conn->query($sql);

            $sql = "UPDATE `book`
                    SET 
                    `totalbook`='{$val}' WHERE `id` = '{$b_id}'";
            $result = $conn->query($sql);
            if ($conn->query($sql) == true){
                //header("location:../book_issue.php?msg=Book Issues");
                print ("Book Issues");
            }
            else{
                //header("location:../book_issue.php?msg=Query is not executed.");
                print ("Query is not executed.");
            }

        }else{
            //header("location:../book_issue.php?msg=There is no book in store.");
            print ("There is no book in store.");
        }

    }else{
        //header("location:../book_issue.php?msg=This Book Is Already Issued By This Member.");
        print ("This Book Is Already Issued By This Member.");
    }
}else{
    //header("location:../book_issue.php?msg=Member Does Not Exist.");
    print ("Member Does Not Exist.");

}
$conn->close();