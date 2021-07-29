<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div class="row dashboard-category-row" style="height: 100%; padding: 0">

    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">Add New Category</h2>
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
                            <label class="category-label-text"><h5>Name</h5></label>
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