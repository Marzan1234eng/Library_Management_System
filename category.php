<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
include "include/dashboard-header.php";
?>

<div class="row dashboard-category-row" style="height: 100%; padding: 0">

    <?php include "include/dashboard-column.php"?>

    <div class="col-9 dashboard-right-side" style="padding: 0">
        <div class="row" >
            <div class="col-4"></div>
            <div class="col-4">

                <form action="include/category_con_db.php" method="get">
                    <p class="category-headline">Add New Category</p>
                    <?php
                    if(isset($_GET['msg'])){
                        ?>
                        <div class="bg-danger">
                            <?php echo $_GET['msg'];?>
                        </div>
                        <?php
                    }
                    ?>
                    <label class="category-label-text">Id</label>
                    <br>
                    <br>
                    <input class="category-input" type="text" name="id" required placeholder="Enter Category ID">
                    <br>
                    <br>
                    <label class="category-label-text">Name</label>
                    <br>
                    <br>
                    <input class="category-input" type="text" name="name" required placeholder="Enter Category Name">
                    <br>
                    <br>
                    <input class="category-submit" type="submit" value="Submit">
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index.php");
}
?>