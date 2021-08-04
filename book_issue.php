<?php
session_start();
if(isset($_SESSION["username"])){
    include "include/header.php";
    include "include/connection.php";
    ?>

    <div style="height: 100%" class="row dashboard-category-row">
        <?php include "include/dashboard-sidebar.php"?>


        <div class="col-10 dashboard-right-side">
            <h1 class="header-welcome">Welcome To Library Management System</h1>
            <h2 class="header-book-list">Book Issue</h2>
            <div class="row right-common-row">
                <div class="col-12">
                    <div id="bg-msg" class="bg-msg-system"></div>

                    <div class="row">
                        <div class="col-md-2">
                            <label class="category-label-text"><h5>Member Email</h5></label>
                            <label class="category-label-text"><h5>Book ID</h5></label>
                        </div>
                        <div class="col-md-8">
                            <input id="email" class="form-input form-div-input-size" required type="text" placeholder="Enter Member Email">
                            <br>
                            <br>
                            <input id="bookId" class="form-input form-div-input-size" required type="text" placeholder="Enter Book ID: ">
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
            let email = document.getElementById("email").value;
            let bookId = document.getElementById("bookId").value;

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    bgMsg.innerHTML = xmlHttp.responseText;
                }
            }

            xmlHttp.open("POST", "include/book_issue_db.php"); // true for asynchronous
            xmlHttp.send(JSON.stringify({email: email , bookId: bookId}));
        }
    </script>
    <?php
}else{
    header("Location: ./index.php");
}
?>