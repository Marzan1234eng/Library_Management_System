<?php
$page = basename($_SERVER['REQUEST_URI']);
include "connection.php";
?>

<div class="nav-bar">
    <div class="row logo-row">
        <div class="col-2">
            <img class="logo-image" src="images/Logo.png">
        </div>
        <?php
           /* $sql = */
        ?>
        <div class="offset-8 col-2 icon-col action">
            <div class="img-profile profile" onclick="menuToggle()">
                <img class="icon-image" src="images/user-icon2.png" alt="user-image">
            </div>
            <div class="menu">
                <?php
                $userName = $_SESSION["username"];
                $sql = "SELECT `username` FROM `register` WHERE `username` = '{$userName}'";
                $res = $conn->query($sql);
                if ($res->num_rows == 1){
                    $row = $res->fetch_assoc();
                    ?>
                    <h3 class="profile-name"><?php echo $row["username"] ?></h3>
                <?php
                }
                $conn->close();
                ?>

                <ul class="dropdown-ul">
                    <li class="dropdown-li">
                        <i class="far fa-user-circle"></i>
                        <a href="">My Profile</a>
                    </li>
                    <li class="dropdown-li">
                        <i class="fas fa-user-edit"></i>
                        <a href="user_update.php">Edit Profile</a>
                    </li>
                    <li class="dropdown-li">
                        <i class="fas fa-power-off"></i>
                        <a class="" href="include/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div  class="col-2 dashboard-col">

    <ul class="dashboard-ul">
        <li class="<?php if ($page == 'dashboard.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-history category-icon"></i>
            <a class="dash-content" href="dashboard.php">Dashboard</a>
        </li>
        <li class="<?php if ($page == 'book_search.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-search category-icon"></i>
            <a class="dash-content" href="book_search.php">Book Search</a>
        </li>
        <li class="<?php if ($page == 'book_issue.php') {echo 'active';} ?> dashboard-li">
            <i class="far fa-hand-point-right category-icon"></i>
            <a class="dash-content" href="book_issue.php">Book Issue</a>
        </li>
        <li class="<?php if ($page == 'book_return.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-exchange-alt category-icon"></i>
            <a class="dash-content" href="book_return.php">Book Return</a>
        </li>
        <li class="<?php if ($page == 'book_update.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-pen-alt category-icon"></i>
            <a class="dash-content" href="book_update.php">Book Update</a>
        </li>
        <li class="<?php if ($page == 'add_category.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-plus category-icon"></i>
            <a class="dash-content" href="add_category.php">Add Category</a>
        </li>
        <li class="<?php if ($page == 'add_book.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-book category-icon"></i>
            <a class="dash-content" href="add_book.php">Add Book</a>
        </li>
        <li class="<?php if ($page == 'add_member.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-universal-access category-icon"></i>
            <a class="dash-content" href="add_member.php">Add Member</a>
        </li>
        <li class="<?php if ($page == 'user_update.php') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-users category-icon"></i>
            <a class="dash-content" href="user_update.php">User Update</a>
        </li>
        <!--<li class="dashboard-li">
            <i class="fas fa-power-off category-icon"></i>
            <a class="dash-content" href="include/logout.php">Logout</a>
        </li>-->
    </ul>
    <br>
    <br>
    <br>
    <br>
</div>

<script>
    function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active');
    }
</script>