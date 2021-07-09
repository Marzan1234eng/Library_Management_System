<?php
include "include/header.php";
?>
<div class="container">
    <div class="row register-row">
        <div class="col-md-4 register">
            <?php
            if(isset($_GET['msg'])){
                ?>
                <div class="bg-danger">
                    <?php echo $_GET['msg'];?>
                </div>
                <?php
            }else{

            }
            ?>
            <form method="post" action="./include/reg-db.php">

                <h1 class="register-head-text"> Welcome To Register</h1>
                <label class="register-label-text">First Name</label>
                <br>
                <br>
                <input class="register-input-style" required name="firstname" type="text" placeholder="Enter your first name">
                <br>
                <br>
                <label class="register-label-text">Last Name</label>
                <br>
                <br>
                <input class="register-input-style" required name="lastname" type="text" placeholder="Enter your last name">
                <br>
                <br>
                <label class="register-label-text">Email</label>
                <br>
                <br>
                <input class="register-input-style" required name="email" type="email" placeholder="Enter your email">
                <br>
                <br>
                <label class="register-label-text">Username</label>
                <br>
                <br>
                <input class="register-input-style" required name="username" type="text" placeholder="Enter your username">
                <br>
                <br>
                <label class="register-label-text">Password</label>
                <br>
                <br>
                <input class="register-input-style" required name="password" type="password" placeholder="Enter password">
                <br>
                <br>
                <label class="register-label-text">Confirm Password</label>
                <br>
                <br>
                <input class="register-input-style" required name="confirmPassword" type="password" placeholder="Confirm Password">
                <br>
                <br>
                <br>
                <input class="register-submit" type="submit" value="Submit">
                <a href="index.php" class="register-submit" type="submit">Login</a>
            </form>
        </div>
    </div>
</div>


<?php
include "include/footer.php";
?>