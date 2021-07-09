<?php
session_start();
/* Checking the session*/
if(isset($_SESSION["username"])){
include "include/header.php";
include "include/dashboard-header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-column.php"?>

    <div class="col-9 dashboard-right-side">
        <div class="row" >
            <div class="col-2"></div>
            <div class="col-8">
                <form action="include/user_db_conn.php" method="post">
                    <p class="category-headline">User Update</p>
                    <?php
                    if(isset($_GET['msg'])){
                        ?>
                        <div class="bg-danger">
                            <?php echo $_GET['msg'];?>
                        </div>
                        <?php
                    }
                    ?>
                    <label class="category-label-text">First Name :</label>
                    <input type="text" name="fname"  placeholder="Enter Your First Name">
                    <br>
                    <br>
                    <label class="category-label-text">Last Name :</label>
                    <input type="text" name="lname"  placeholder="Enter Your Last Name">
                    <br>
                    <br>
                    <label class="category-label-text">Email :</label>
                    <input type="email" name="email"  placeholder="Enter Your Email">
                    <br>
                    <br>
                    <label class="category-label-text">User Name :</label>
                    <input type="text" name="username" required  placeholder="Enter Username For Checking">
                    <br>
                    <br>
                    <label class="category-label-text">Old Password :</label>
                    <input type="password" name="old_password" required placeholder="Enter Your Password">

                    <br>
                    <br>
                    <label class="category-label-text">New Password :</label>
                    <input type="password" name="password" required placeholder="Enter Your Password">

                    <br>
                    <br>
                    <label class="category-label-text">Confirm New Password :</label>
                    <input type="password" name="confirm_password" required placeholder="Confirm Password">
                    <br>
                    <br>
                    <input class="category-submit" type="submit" name="update" value="Update">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index.php");
}
?>