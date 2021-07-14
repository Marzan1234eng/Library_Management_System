<?php
include "include/header.php";
?>

    <p class="bg-circle-block"></p>
    <p class="bg-circle-border"></p>
<div class="container index-container">

    <div class="row login-row">
        <div class="col-md-6 side-image">
            <img src="images/login-side-image.png" alt="">
        </div>
        <div class="col-md-6 login-form">
            <div class="side-margin">
                <h2 class="login-welcome">Welcome!</h2>
                <?php
                if(isset($_GET['msg'])){
                    ?>
                    <div class="bg-msg">
                        <?php echo $_GET['msg'];?>
                    </div>
                    <?php
                }else{

                }
                ?>
                <form method="post" action="include/log.php">
                    <div class="input-container">
                        <i class="fas fa-user icon"></i>
                        <input class="login-form-text" type="text" required name="username" placeholder="Enter your username">
                    </div>
                    <div class="input-container">
                        <i class="fas fa-key icon"></i>
                        <input class="login-form-text" required type="password" name="password" placeholder="Enter your password">
                    </div>
                    <input class="form-button" type="submit" value="Login">
                    <button onclick="document.location.href = 'register.php'" class="form-button signup">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "include/footer.php";
?>