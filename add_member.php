<?php
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-10 dashboard-right-side">
            <h1 class="header-welcome">Welcome To Library Management System</h1>
            <h2 class="header-book-list">Add New Member</h2>
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
                                <label class="category-label-text"><h5>Name</h5></label><br>
                                <label class="category-label-text"><h5>Email</h5></label><br>
                                <label class="category-label-text"><h5>Number</h5></label><br>
                                <label class="category-label-text"><h5>Date of Birth</h5></label><br>
                                <label class="category-label-text"><h5>Blood Group</h5></label>
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