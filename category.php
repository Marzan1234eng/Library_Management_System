<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div class="row dashboard-category-row" style="height: 100%; padding: 0">

    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-9 dashboard-right-side" style="padding: 0">
        <p class="header-welcome">Welcome To Library Management System</p>
        <p class="header-book-list">Add New Category</p>
        <div class="row right-common-row" >
            <div class="col-md-12">
                <form action="include/category_con_db.php" method="get">
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
                            <label class="category-label-text">Name</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-input form-div-input-size" type="text" name="name" required placeholder="Enter Category Name">
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
    header("Location: ./index.php");
}
?>