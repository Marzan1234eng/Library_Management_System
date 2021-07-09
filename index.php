<?php
include "include/header.php";
?>
<div class="container">
    <div class="row ">
        <div class="col-md-4 login">
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
                <form method="post" action="include/log.php">
                    <label class="login-text">User Name:</label>
                    <br>
                    <br>
                    <input class="input-style" type="text" required name="username" placeholder="Enter Your Username">
                    <br>
                    <br>
                    <label class="login-text">Password:</label>
                    <br>
                    <br>
                    <input class="input-style" required type="password" name="password" placeholder="Enter Your Password">
                    <br>
                    <br>
                    <br>
                    <input class="login-btn" type="submit" value="Login">
                    <a href="register.php" class="login-btn" >Register</a>
                </form>
        </div>
    </div>
</div>

<?php
include "include/footer.php";
?>