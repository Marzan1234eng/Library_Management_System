<?php
include "include/header.php";
?>

<div class="index-container">

    <img class="bg-image-1" src="images/Ellipse 2.png" alt="ellipse-background-image">
    <div class="row login-row">
        <div class="col-md-6 col-sm-12 side-image">
            <img class="img-fluid" src="images/login-side-image.png" alt="">
        </div>
        <div class="col-md-6 col-sm-12 login-form">
            <div class="side-margin">
                <h2 class="login-welcome mt-1 mb-5">Welcome!</h2>
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
                    <div class="input-container mb-2">
                        <i class="fas fa-user icon"></i>
                        <input class="login-form-text" type="text" required name="username" placeholder="Enter your username">
                    </div>
                    <div class="input-container mb-2">
                        <i class="fas fa-key icon"></i>
                        <input class="login-form-text " required type="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="d-flex justify-content-around">
                        <input class="form-button mb-3" type="submit" value="Login">
                        <button type="button" onclick="document.location.href = 'register.php'" class="form-button signup mb-5">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <img class="bg-image-2" src="images/Ellipse 1.png" alt="ellipse-background-image">
</div>

<?php
include "include/footer.php";
?>