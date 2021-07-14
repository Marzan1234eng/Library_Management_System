<?php
session_start();
if(isset($_SESSION["username"])){
    $page = 'book_issue';
    include "include/header.php";
    include "include/connection.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-9 dashboard-right-side">
            <p class="header-welcome">Welcome To Library Management System</p>
            <p class="header-book-list">Book Issue</p>
            <div class="row right-common-row">
                <div class="col-12">
                    <form action="include/book_issue_db.php" method="POST">
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
                                <label class="category-label-text">Member Email</label>
                                <br>
                                <br>
                                <label class="category-label-text">Book ID</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-input form-div-input-size" required name="email" type="text" placeholder="Enter Member Email">
                                <br>
                                <br>
                                <input class="form-input form-div-input-size" required name="b_id" type="text" placeholder="Enter Book ID: ">
                                <br>
                                <br>
                                <input class="category-submit" type="submit" value="Submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php
}else{
    header("Location: ./index2.php");
}
?>