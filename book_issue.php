<?php
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    include "include/connection.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-9 dashboard-right-side">

            <div class="row right-common-row">
                <div class="col-2"></div>
                <div class="col-8">
                    <form style="padding-top: 80px;" action="include/book_issue_db.php" method="POST">
                        <?php
                        if(isset($_GET['msg'])){
                            ?>
                            <div class="bg-danger">
                                <?php echo $_GET['msg'];?>
                            </div>
                            <?php
                        }
                        ?>
                        <label class="category-label-text">Member Email :</label>
                        <input class="category-input" required name="email" type="text" placeholder="Enter Member Email">
                        <br>
                        <br>
                        <label class="category-label-text">Book ID: </label>
                        <input class="category-input" required name="b_id" type="text" placeholder="Enter Book ID: ">
                        <br>
                        <br>
                        <input class="register-submit" type="submit" value="Submit">
                    </form>

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