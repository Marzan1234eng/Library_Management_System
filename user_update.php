<?php
session_start();
/* Checking the session*/
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">User Profile Update</h2>
        <div class="row right-common-row" >
            <div class="col-md-12">

                <div id="bg-msg" class="bg-msg-system"></div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="category-label-text"><h5>First Name</h5></label><br>
                        <label class="category-label-text"><h5>Last Name</h5></label><br>
                        <label class="category-label-text"><h5>Email</h5></label><br>
                        <label class="category-label-text"><h5>User Name</h5></label><br>
                        <label class="category-label-text"><h5>Old Password</h5></label><br>
                        <label class="category-label-text"><h5>New Password</h5></label><br>
                        <label class="category-label-text"><h5>Confirm New Password</h5></label>
                    </div>
                    <div class="col-md-8">
                        <input id="fname" class="form-input form-div-input-size" type="text"  placeholder="Enter Your First Name">
                        <br>
                        <br>
                        <input id="lname" class="form-input form-div-input-size" type="text" placeholder="Enter Your Last Name">
                        <br>
                        <br>
                        <input id="email" class="form-input form-div-input-size" type="email"  placeholder="Enter Your Email">
                        <br>
                        <br>
                        <input id="username" class="form-input form-div-input-size" type="text" required  placeholder="Enter Username For Checking">
                        <br>
                        <br>
                        <input id="old_password" class="form-input form-div-input-size" type="password" required placeholder="Enter Your Password">
                        <br>
                        <br>
                        <input id="password" class="form-input form-div-input-size" type="password" required placeholder="Enter Your Password">
                        <br>
                        <br>
                        <input id="confirm_password" class="form-input form-div-input-size" type="password" required placeholder="Confirm Password">
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
            let fname = document.getElementById("fname").value;
            let lname = document.getElementById("lname").value;
            let email = document.getElementById("email").value;
            let username = document.getElementById("username").value;
            let old_password = document.getElementById("old_password").value;
            let password = document.getElementById("password").value;
            let confirm_password = document.getElementById("confirm_password").value;

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    bgMsg.innerHTML = xmlHttp.responseText;
                }
            }

            xmlHttp.open("POST", "include/user_db_conn.php"); // true for asynchronous
            xmlHttp.send(JSON.stringify(
                {
                    fname: fname , lname: lname, email:email, username: username, old_password: old_password, password: password, confirm_password: confirm_password
                }));
        }
    </script>
    <?php
}else{
    header("Location: ./index.php");
}
?>