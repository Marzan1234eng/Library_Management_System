<?php
session_start();

/* Checking the session*/
if(isset($_SESSION["username"])){
include "include/header.php";
?>
    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>

        <div class="col-9 dashboard-right-side">
            <p class="header-welcome">Welcome To Library Management System</p>
        </div>
    </div>
<?php
}else{
    header("Location: ./index2.php");
}
?>




