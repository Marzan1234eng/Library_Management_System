<?php
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    include "include/dashboard-header.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-column.php"?>


        <div class="col-9 dashboard-right-side">

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <form method="post" action="include/add_member_db.php">
                        <p class="category-headline"> Add Member</p>
                        <?php
                        if(isset($_GET['msg'])){
                            ?>
                            <div class="bg-danger">
                                <?php echo $_GET['msg'];?>
                            </div>
                            <?php
                        }
                        ?>
                        <label class="category-label-text">Name</label>
                        <input class="category-input" required name="name" type="text" placeholder="Enter your name">
                        <br>
                        <br>
                        <label class="category-label-text">Email</label>
                        <input class="category-input" required name="email" type="email" placeholder="Enter your email">
                        <br>
                        <br>
                        <label class="category-label-text">Number</label>
                        <input class="category-input" required name="number" type="number" placeholder="Enter your mobile number">
                        <br>
                        <br>
                        <label class="category-label-text">Date of Birth</label>
                        <input class="category-input" required name="dob" type="date" placeholder="Enter your birth date">
                        <br>
                        <br>
                        <label class="category-label-text">Blood Group</label>
                        <input class="category-input" required name="bloodgroup" type="text" placeholder="Enter your blood group">
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