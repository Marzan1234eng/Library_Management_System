<?php
session_start();

/* Checking the session*/
if(isset($_SESSION["username"])){
include "include/header.php";
include "include/dashboard-header.php";
?>
    <div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-column.php"?>

    <div class="col-9 dashboard-right-side">

    </div>
</div>
<?php
}else{
    header("Location: ./index.php");
}
?>




