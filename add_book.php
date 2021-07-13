<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-9 dashboard-right-side">
        <p class="header-welcome">Welcome To Library Management System</p>
        <p class="header-book-list">Add New Book</p>
        <div class="row right-common-row" >
            <div class="col-md-12">
                <form action="include/add_book-db.php" method="post" enctype="multipart/form-data">
                    <?php
                    if(isset($_GET['msg'])){
                        ?>
                        <div class="bg-msg-system">
                            <?php echo $_GET['msg'];?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="category-label-text">Select Category</label>
                            <br>
                            <br>
                            <label class="category-label-text">Book Name</label>
                            <br>
                            <br>
                            <label class="category-label-text">Book Image</label>
                            <br>
                            <br>
                            <label class="category-label-text">Author</label>
                            <br>
                            <br>
                            <label class="category-label-text">In Store</label>
                            <br>
                            <br>
                            <label class="category-label-text">Description</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-input form-div-input-size" name="category">
                                <?php
                                include ("include/connection.php");
                                $sql = "SELECT `name` , cat_auto_id FROM `category`";  /*To Print Book All Category*/
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
                            <input class="category-submit" type="submit" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index.php");
}
?>