<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div class="row dashboard-category-row" style="height: 100%; padding: 0">

    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">Add New Category</h2>
        <div class="row right-common-row" >
            <div class="col-md-12">

                <div id="bg-msg" class="bg-msg-system"></div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="category-label-text"><h5>Name</h5></label>
                    </div>
                    <div class="col-md-8">
                        <input id="name" class="form-input form-div-input-size" type="text" required placeholder="Enter Category Name">
                        <br>
                        <br>
                        <button id="submitButton" class="category-submit">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <script type="application/javascript">
        var btn = document.getElementById("submitButton");
        var bgMsg = document.getElementById("bg-msg");

        btn.onclick = function (){
            let name = document.getElementById("name").value;

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    bgMsg.innerHTML = xmlHttp.responseText;
                }
            }

            xmlHttp.open("POST", "include/category_con_db.php"); // true for asynchronous
            xmlHttp.send(JSON.stringify(
                {name: name}));
        }
    </script>
    <?php
}else{
    header("Location: ./index.php");
}
?>