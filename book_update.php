<?php
ob_start();
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row" xmlns="http://www.w3.org/1999/html">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">Book Update</h2>
        <div class="row right-common-row" >
            <div class="col-md-12">

                <div id="bg-msg" class="bg-msg-system"></div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="category-label-text"><h5>Select Category</h5></label><br>
                        <label class="category-label-text"><h5>Book Name</h5></label><br>
                        <label class="category-label-text"><h5>Author</h5></label><br>
                        <label class="category-label-text"><h5>In Stock</h5></label><br>
                        <label class="category-label-text"><h5>Description</h5></label>
                    </div>
                    <div class="col-md-8">
                        <select id="category" class="form-input form-div-input-size">
                            <?php
                            include ("include/connection.php");
                            $sql = "SELECT `name` , cat_auto_id FROM `category`";
                            $res = $conn->query($sql);
                            while($row = $res->fetch_assoc()){
                                ?>
                                <option value="" disabled selected hidden>Choose Category</option>
                                <option value="<?=$row["cat_auto_id"]?>">
                                    <?php echo $row['name']?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        <input id="name" class="form-input form-div-input-size" type="text" name="name" required placeholder="Book Name">
                        <br>
                        <br>
                        <input id="writer" class="form-input form-div-input-size" type="text" name="writer" required placeholder="Author">
                        <br>
                        <br>
                        <input id="totalbook" class="form-input form-div-input-size" type="text" name="totalbook" required placeholder="Enter Total book">
                        <br>
                        <br>
                        <textarea id="description" rows="8" cols="50" name="description"  placeholder="Write something about the book."></textarea>
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
            let category = document.getElementById("category").value;
            let name = document.getElementById("name").value;
            let writer = document.getElementById("writer").value;
            let totalbook = document.getElementById("totalbook").value;
            let description = document.getElementById("description").value;

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    bgMsg.innerHTML = xmlHttp.responseText;
                }
            }

            xmlHttp.open("POST", "include/book_update_db.php"); // true for asynchronous
            xmlHttp.send(JSON.stringify(
                {
                    category: category , name: name, writer: writer, totalbook: totalbook, description: description
                }));
        }
    </script>
    <?php
}else{
    header("Location: ./index.php");
}
?>