<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-10 dashboard-right-side">
        <h1 class="header-welcome">Welcome To Library Management System</h1>
        <h2 class="header-book-list">Add New Book</h2>
        <div class="row right-common-row" >
            <div class="col-md-12">
                <form id="demo" method="post" action="" enctype="multipart/form-data">
                    <?php
                    if(isset($_GET['msg'])){
                        ?>
                        <div id="demo" class="bg-msg-system">
                            <?php echo $_GET['msg'];?>
                        </div>
                        <?php
                    }
                    ?>
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
                            <select class="form-input form-div-input-size" name="category">
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
                            <input class="form-input form-div-input-size" type="text" name="name" required placeholder="Enter Book Name">
                            <br>
                            <br>
                            <input type="file" name="image">
                            <br
                            ><br>
                            <input class="form-input form-div-input-size" type="text" name="writerName" required placeholder="Enter Book Name">
                            <br>
                            <br>
                            <input class="form-input form-div-input-size" type="text" name="totalBook" required placeholder="Enter Total Books">
                            <br>
                            <br>
                            <textarea rows="8" cols="50" type="text" name="description"  placeholder="Enter Book Description"></textarea>
                            <br>
                            <br>
                            <button class="category-submit request-callback" onclick="window.open('include/add_book_db.php')">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        function loadDoc(){
            var http = new XMLHttpRequest();
            const url = "include/add_book_db.php";
            http.open("POST",url);
            http.send();

            http.onreadystatechange=function (){
                if(this.readyState === 4 && this.status === 200){
                    console.log(http.responseText);
                }
            }
        }

    </script>
    <?php
}else{
    header("Location: ./index.php");
}?>