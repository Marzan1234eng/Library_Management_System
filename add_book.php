<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
include "include/connection.php";
?>

<div class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">Add New Book</h2>
        <div class="row right-common-row" >
            <div class="col-md-12">

                <form action="" method="post" enctype="multipart/form-data">
                    <div id="bg-msg" class="bg-msg-system"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="category-label-text"><h5>Select Category</h5></label>
                            <label class="category-label-text"><h5>Book Name</h5></label>
                            <label class="category-label-text"><h5>Book Image</h5></label><br>
                            <label class="category-label-text"><h5>Author</h5></label><br>
                            <label class="category-label-text"><h5>In Store</h5></label><br>
                            <label class="category-label-text"><h5>Description</h5></label>
                        </div>
                        <div class="col-md-8">
                            <select id="category" class="form-input form-div-input-size" name="category">
                                <?php
                                include ("include/connection.php");
                                $sql = "SELECT `name` , cat_auto_id FROM `category`";  /*To Print Book All Category*/
                                $res = $conn->query($sql);
                                while($row = $res->fetch_assoc()){
                                    ?>
                                    <option value="" hidden selected>Choose...</option>
                                    <option value="<?=$row["cat_auto_id"]?>">
                                        <?php echo $row['name']?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <br>
                            <br>
                            <input id="name" class="form-input form-div-input-size" type="text" required placeholder="Enter Book Name">
                            <br>
                            <br>
                            <input id="image" type="file" name="image">
                            <br
                            ><br>
                            <input id="writerName" class="form-input form-div-input-size" type="text" required placeholder="Enter Book Name">
                            <br>
                            <br>
                            <input id="totalBook" class="form-input form-div-input-size" type="text" required placeholder="Enter Total Books">
                            <br>
                            <br>
                            <textarea id="description" rows="8" cols="50" type="text" placeholder="Enter Book Description"></textarea>
                            <br>
                            <br>
                            <button id="submitButton" class="category-submit">Submit</button>
                            <!--<input id="submitButton" class="category-submit" type="submit" value="Submit">-->
                            <br>
                            <br>
                        </div>
                    </div>
                </form>


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
            let image = document.getElementById("image").value;
            let writerName = document.getElementById("writerName").value;
            let totalBook = document.getElementById("totalBook").value;
            let description = document.getElementById("description").value;

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    bgMsg.innerHTML = xmlHttp.responseText;
                }
            }

            xmlHttp.open("POST", "include/add_book_db.php"); // true for asynchronous
            xmlHttp.send(JSON.stringify(
                {
                    category: category , name: name, image: image, writerName: writerName, totalBook: totalBook, description: description
                }));
        }
    </script>
    <?php
}else{
    header("Location: ./index.php");
}?>