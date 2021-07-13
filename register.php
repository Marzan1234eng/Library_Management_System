<?php
include "include/header.php";
?>

    <p class="bg-circle-block"></p>
    <p class="bg-circle-border"></p>

    <div class="container index-container">
        <div class="row register-row">
            <div class="col-md-6 side-image">
                <img src="images/login-side-image.png" alt="">
            </div>
            <div class="col-md-6 login-form">
                <h2 class="register-header">User Registration</h2>
                <div class="register-margin">
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
                    <form method="post" action="./include/reg-db.php">
                        <div class="input-container">
                            <i class="fas fa-chevron-circle-right register-icon"></i>
                            <input class="login-form-text" required name="firstname" type="text" placeholder="Enter your first name">
                        </div>
                        <div class="input-container">
                            <i class="fas fa-chevron-circle-right register-icon"></i>
                            <input class="login-form-text" required name="lastname" type="text" placeholder="Enter your last name">
                        </div>
                        <div class="input-container">
                            <i class="fas fa-chevron-circle-right register-icon"></i>
                            <input class="login-form-text" required name="email" type="email" placeholder="Enter your email">
                        </div>
                        <div class="input-container">
                            <i class="fas fa-chevron-circle-right register-icon"></i>
                            <input class="login-form-text" required name="username" type="text" placeholder="Enter your username">
                        </div>
                        <div class="input-container">
                            <i class="fas fa-chevron-circle-right register-icon"></i>
                            <input class="login-form-text" required name="password" type="password" placeholder="Enter password">
                        </div>
                        <div class="input-container">
                            <i class="fas fa-chevron-circle-right register-icon"></i>
                            <input class="login-form-text" required name="confirmPassword" type="password" placeholder="Confirm Password">
                        </div>
                        <input class="form-button" type="submit" value="Submit">
                        <button onclick="document.location.href = 'index.php'" class="form-button signup">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
include "include/footer.php";
?>

