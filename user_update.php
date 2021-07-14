<?php
session_start();
/* Checking the session*/
if(isset($_SESSION["username"])){
    $page = 'user_update';
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-9 dashboard-right-side">
        <p class="header-welcome">Welcome To Library Management System</p>
        <p class="header-book-list">User Profile Update</p>
        <div class="row right-common-row" >
            <div class="col-md-12">
                <form action="include/user_db_conn.php" method="post">
                    <?php
                    if(isset($_GET['msg'])){
                        ?>
                        <div class="bg-danger">
                            <?php echo $_GET['msg'];?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="category-label-text">First Name</label>
                            <br>
                            <br>
                            <label class="category-label-text">Last Name</label>
                            <br>
                            <br>
                            <label class="category-label-text">Email</label>
                            <br>
                            <br>
                            <label class="category-label-text">User Name</label>
                            <br>
                            <br>
                            <label class="category-label-text">Old Password</label>
                            <br>
                            <br>
                            <label class="category-label-text">New Password</label>
                            <br>
                            <br>
                            <label class="category-label-text">Confirm New Password</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-input form-div-input-size" type="text" name="fname"  placeholder="Enter Your First Name">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="text" name="lname"  placeholder="Enter Your Last Name">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="email" name="email"  placeholder="Enter Your Email">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="text" name="username" required  placeholder="Enter Username For Checking">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="password" name="old_password" required placeholder="Enter Your Password">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="password" name="password" required placeholder="Enter Your Password">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="password" name="confirm_password" required placeholder="Confirm Password">
                            <br>
                            <br>
                            <input class="category-submit" type="submit" name="update" value="Update">
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