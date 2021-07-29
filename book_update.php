<?php
ob_start();
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row" xmlns="http://www.w3.org/1999/html">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">Book Update</h2>
        <div class="row right-common-row" >
            <div class="col-md-12">
                <form action="" method="post">
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
                            <label class="category-label-text"><h5>Select Category</h5></label><br>
                            <label class="category-label-text"><h5>Book Name</h5></label><br>
                            <label class="category-label-text"><h5>Author</h5></label><br>
                            <label class="category-label-text"><h5>In Stock</h5></label><br>
                            <label class="category-label-text"><h5>Description</h5></label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-input form-div-input-size" name="category">
                                <?php
                                include ("include/connection.php");
                                $sql = "SELECT `name` , cat_auto_id FROM `category`";
                                $res = $conn->query($sql);
                                while($row = $res->fetch_assoc()){
                                    ?>
                                    <option value="" disabled selected hidden>Choose Category</option>
                                    <option value="<?=$row["cat_auto_id"]?>">
                                        <?php echo $row['name']?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="text" name="name" required placeholder="Book Name">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="text" name="writer" required placeholder="Author">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="text" name="totalbook" required placeholder="Enter Total book">
                            <br>
                            <br>
                            <textarea rows="8" cols="50" name="description"  placeholder="Write something about the book."></textarea>
                            <br>
                            <br>
                            <input class="category-submit" type="submit" value="Update">
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST['name']) && isset($_POST['writer'])){
                    $name = $_POST['name'];
                    $writer = $_POST['writer'];
                    $totalbook = $_POST['totalbook'];
                    $description = '';

                    $sql = "SELECT * FROM `book` WHERE `name` = '$name' AND `writename` = '$writer'";
                    $res = $conn->query($sql);
                    $row = $res->num_rows;

                    if ($row > 0){

                        if (!empty($_POST['description'])){
                            $description = $_POST['description'];
                        }
                        else{
                            $res = $res->fetch_assoc();
                            $description = $res['description'];
                        }

                        $sql = "UPDATE `book` SET `totalbook`='$totalbook' ,`description` = '$description'
                                WHERE `name` = '{$name}' AND `writename` = '{$writer}'";

                        if($conn->query($sql) === TRUE){
                            header("location:./book_update.php?msg=Book Updated.");
                        } else{
                            header("location:./book_update.php?msg=Book is not found.");
                        }
                    }
                    else{
                        header("location:./book_update.php?msg=Book is not found.");
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index.php");
}
?>