<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-9 dashboard-right-side">
        <div class="row right-common-row" >
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" method="post">
                    <p class="category-headline">Book Update</p>
                    <label class="category-label-text">Select Category :</label>
                    <select name="category">
                        <?php
                        include ("include/connection.php");
                        $sql = "SELECT `name` , cat_auto_id FROM `category`";
                        $res = $conn->query($sql);
                        while($row = $res->fetch_assoc()){
                            ?>
                            <option value="<?=$row["cat_auto_id"]?>">
                                <?php echo $row['name']?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label class="category-label-text">Enter Book Name:</label>
                    <input type="text" name="name" required placeholder="Enter Book Name">
                    <br>
                    <br>
                    <label class="category-label-text">Enter Writer Name:</label>
                    <input type="text" name="writer" required placeholder="Enter Writer Name">
                    <br>
                    <br>
                    <label class="category-label-text">Total No of Books:</label>
                    <input type="text" name="totalbook" required placeholder="Enter Total book">
                    <br>
                    <br>
                    <input class="category-submit" type="submit" value="Update">
                </form>

                <?php
                if(isset($_POST['name']) && isset($_POST['writer'])){
                    $name = $_POST['name'];
                    $writer = $_POST['writer'];
                    $totalbook = $_POST['totalbook'];

                    $sql = "SELECT * FROM `book` WHERE `name` = '$name' AND `writename` = '$writer'";
                    $res = $conn->query($sql);
                    $row = $res->num_rows;

                    if ($row > 0){

                        $sql = "UPDATE `book` SET `totalbook`='$totalbook'
                                WHERE `name` = '{$name}' AND `writename` = '{$writer}'";

                        if($conn->query($sql) === TRUE){ ?>
                            <p class="category-headline">Book Updated</p>
                        <?php
                        } else{
                        ?>
                        <p class="category-headline">Book is not found</p>
                        <?php
                     }
                    } else{ ?>
                        <p class="bg-danger">Book is not found</p>
                        <?php
                    }
                }
                $conn->close();
                        ?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index2.php");
}
?>