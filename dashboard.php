<?php
session_start();
/* Checking the session*/
if(isset($_SESSION["username"])){
    $page = 'dashboard';
include "include/header.php";
?>
    <div class="row dashboard-category-row-color">
        <?php include "include/dashboard-sidebar.php"?>

        <div class="col-9 dashboard-right-side">
            <p class="header-welcome">Dashboard</p>
            <p id="date"></p>
            <script>
                document.getElementById("date").innerHTML = Date();
            </script>

            <div class="row dash-one-col">
                <div class="col-md-3 dash-three-box">1</div>
                <div class="col-md-3 dash-three-box">2</div>
                <div class="col-md-3 dash-three-box">3</div>
            </div>
        </div>
    </div>
<?php
}else{
    header("Location: ./index2.php");
}
?>




