<?php
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-9 dashboard-right-side">
            <p class="header-welcome">Welcome To Library Management System</p>
            <p class="header-book-list">Add New Member</p>
            <div class="row right-common-row">
                <div class="col-md-12">
                    <form method="post" action="include/add_member_db.php">
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
                            <div class="col-md-2">
                                <label class="category-label-text">Name</label>
                                <br>
                                <br>
                                <label class="category-label-text">Email</label>
                                <br>
                                <br>
                                <label class="category-label-text">Number</label>
                                <br>
                                <br>
                                <label class="category-label-text">Date of Birth</label>
                                <br>
                                <br>
                                <label class="category-label-text">Blood Group</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-input form-div-input-size" required name="name" type="text" placeholder="Enter your name">
                                <br>
                                <br>
                                <input class="form-input form-div-input-size" required name="email" type="email" placeholder="Enter your email">
                                <br>
                                <br>
                                <input class="form-input form-div-input-size" required name="number" type="number" placeholder="Enter your mobile number">
                                <br>
                                <br>
                                <input class="form-input form-div-input-size" required name="dob" type="date" placeholder="Enter your birth date">
                                <br>
                                <br>
                                <input class="form-input form-div-input-size" required name="bloodgroup" type="text" placeholder="Enter your blood group">
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