<?php
ob_start();
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    include "include/connection.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-10 dashboard-right-side">
            <h1 class="header-welcome">Welcome To Library Management System</h1>
            <h2 class="header-book-list">Book Return</h2>
            <div class="row right-common-row">
                <div class="col-md-12">
                    <form action="" method="POST">
                        <?php
                        if(isset($_GET['msg'])){
                            ?>
                            <div class="bg-msg-system">
                                <?php echo $_GET['msg'];?>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-2">
                                <label class="category-label-text"><h5>Member Email</h5></label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-input form-div-input-size" required name="email" type="text" placeholder="Enter Member Email">
                                <br>
                                <br>
                                <input class="category-submit" type="submit" value="Submit">
                                <br>
                                <br>
                            </div>
                        </div>
                    </form>

                    <?php
                        if (isset($_POST['email'])){  /*If form button is clicked*/

                            $email = $_POST['email'];

                            $sql = "SELECT * FROM `member` WHERE `email` = '$email'"; /*To Know the member*/

                            include "include/connection.php";
                            /*$servername = "localhost";
                            $serverUsername = "root";
                            $password = "";
                            $database = "library_management_system";

                            $conn = mysqli_connect($servername,$serverUsername,$password,$database);

// Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }*/
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){   /*Check member is exist or not*/

                                $row = $result->fetch_assoc();
                                $m_id = $row['id'];

                                $sql = "SELECT * FROM `book_issue` WHERE `m_id` = '{$m_id}'";
                                $res = $conn->query($sql);
                                if ($res->num_rows > 0){   /*check if there is any book issued by the member*/
                                    ?>
                                    <div class="table-responsive">
                                        <div class="table my-custom-scrollbar">
                                            <table class="table table-striped">
                                                <thead class="search-thread">
                                                <tr>
                                                    <th scope="col">Member Name</th>
                                                    <th scope="col">Book ID</th>
                                                    <th scope="col">Book Name</th>
                                                    <th scope="col">Issue Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                $sql = "SELECT m.name as member_name, m.id as m_id, b_i.b_id as b_id, b.totalbook as totalbook,
                                                       b.id as book_id, b_i.expire_date as expire_date,
                                                       b.name as book_name, 
                                                       b_i.issue_date as issue_date 
                                                        from 
                                                     member as m ,book as b ,book_issue as b_i 
                                                    WHERE m.id = '$m_id' AND b.id = b_i.b_id AND b_i.m_id = '$m_id'
                                                ";

                                                $res = $conn->query($sql);

                                                while ($row = $res->fetch_assoc()){
                                                    ?>
                                                    <tr>
                                                        <form action="" method="POST">
                                                            <input type="number" hidden name="b_id" value="<?php echo $row['b_id']?>">
                                                            <input type="number" hidden name="m_id" value="<?php echo $row['m_id']?>">
                                                            <input type="number" hidden name="totalbook" value="<?php echo $row['totalbook']?>">
                                                        <td><?php echo $row['member_name']?></td>
                                                        <td><?php echo $row['book_id']; ?></td>
                                                        <td><?php echo $row['book_name']?></td>
                                                        <td><?php echo $row['issue_date']?></td>
                                                        <td>
                                                            <input class="category-submit" name="return_book" type="submit" value="Return">
                                                        </td>
                                                        </form>
                                                    </tr>
                                                    <?php
                                                }
                                                }
                                        else{
                                            header("location:./book_return.php?msg=No Book Has Been Issued.");
                                            }
                                        }else{
                                            header("location:./book_return.php?msg=Member does not exist.");
                                        }
                                                ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <?php
                            }
                    if(array_key_exists('return_book',$_POST)) {   /*If member want to return the book*/

                        $b_id = $_POST['b_id'];
                        $m_id = $_POST['m_id'];
                        $totalbook = $_POST['totalbook'] + 1;

                        $sql = "SELECT * FROM book_issue WHERE b_id = '$b_id'"; /*to get the expire date to check any fine*/
                        include "include/connection.php";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $expire_date = $row['expire_date'];
                        $expire_date = strtotime($expire_date);  /*Converted it to date & we got the date as second*/


                        $today = date("Y-m-d");
                        $diff = strtotime($today) - $expire_date;
                        $diff = (($diff / 60) / 60) / 24;

                        if ($diff > 0) {   /*check if there is any fine*/
                            $fine = $diff * 3;

                            $sql = "DELETE FROM `book_issue` WHERE b_id = '$b_id' AND m_id = '$m_id'";
                            $result = $conn->query($sql);

                            if ($conn->query($sql) == true) {
                                $sql = "UPDATE `book` SET `totalbook`='$totalbook' WHERE book.id = '$b_id'"; /*Returned book is updated to book table*/
                                $result = $conn->query($sql);

                                header("location:./book_return.php?msg=Book has been returned and Your late fine is $fine Taka");
                            }
                        } else {
                            $sql = "DELETE FROM `book_issue` WHERE b_id = '$b_id' AND m_id = '$m_id'";
                            $result = $conn->query($sql);

                            if ($conn->query($sql) == true) {
                                $sql = "UPDATE `book` SET `totalbook`='$totalbook' WHERE book.id = '$b_id'";
                                $result = $conn->query($sql);
                                header("location:./book_return.php?msg=Book has been returned.");
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "include/connection.php";
    $conn->close();
}else{
    header("Location: ./index.php");
}
?>