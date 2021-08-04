<?php
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-10 dashboard-right-side">
            <h1 class="header-welcome">Welcome To Library Management System</h1>
            <h2 class="header-book-list">Add New Member</h2>
            <div class="row right-common-row">
                <div class="col-md-12">

                    <div id="bg-msg" class="bg-msg-system"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="category-label-text"><h5>Name</h5></label><br>
                            <label class="category-label-text"><h5>Email</h5></label><br>
                            <label class="category-label-text"><h5>Number</h5></label><br>
                            <label class="category-label-text"><h5>Date of Birth</h5></label><br>
                            <label class="category-label-text"><h5>Blood Group</h5></label>
                        </div>
                        <div class="col-md-8">
                            <input id="name" class="form-input form-div-input-size" required type="text" placeholder="Enter your name">
                            <br>
                            <br>
                            <input id="email" class="form-input form-div-input-size" required type="email" placeholder="Enter your email">
                            <br>
                            <br>
                            <input id="number" class="form-input form-div-input-size" required type="number" placeholder="Enter your mobile number">
                            <br>
                            <br>
                            <input id="dob" class="form-input form-div-input-size" required type="date" placeholder="Enter your birth date">
                            <br>
                            <br>
                            <input id="bloodgroup" class="form-input form-div-input-size" required type="text" placeholder="Enter your blood group">
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
            let email = document.getElementById("email").value;
            let number = document.getElementById("number").value;
            let dob = document.getElementById("dob").value;
            let bloodgroup = document.getElementById("bloodgroup").value;

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    bgMsg.innerHTML = xmlHttp.responseText;
                }
            }

            xmlHttp.open("POST", "include/add_member_db.php"); // true for asynchronous
            xmlHttp.send(JSON.stringify(
                {
                    name: name, email: email, number: number, dob: dob, bloodgroup: bloodgroup
                }));
        }
    </script>

    <?php
}else{
    header("Location: ./index2.php");
}
?>