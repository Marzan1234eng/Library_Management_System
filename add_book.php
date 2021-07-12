<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-9 dashboard-right-side">
        <div class="row right-common-row" >
            <div class="col-2"></div>
            <div class="col-8">

                <form action="include/add_book-db.php" method="post" enctype="multipart/form-data">
                    <p class="category-headline">Add New Book</p>
                    <?php
                    if(isset($_GET['msg'])){
                        ?>
                        <div class="bg-danger">
                            <?php echo $_GET['msg'];?>
                        </div>
                        <?php
                    }
                    ?>
                    <label class="category-label-text">Select Category :</label>
                    <select name="category">
                        <?php
                        include ("include/connection.php");
                        $sql = "SELECT `name` , cat_auto_id FROM `category`";  /*To Print Book All Category*/
                        $res = $conn->query($sql);
                        while($row = $res->fetch_assoc()){
                            ?>
                            <option value="<?=$row["cat_auto_id"]?>">
                                <?php echo $row['name']?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label class="category-label-text">Book Name :</label>
                    <input class="category-input" type="text" name="name" required placeholder="Enter Book Name">
                    <br>
                    <br>
                    <label class="category-label-text">Book Image :</label>
                    <input type="file" name="image">
                    <br>
                    <br>

                    <label class="category-label-text">Writer Name :</label>
                    <input class="category-input" type="text" name="writerName" required placeholder="Enter Book Name">
                    <br>
                    <br>

                    <label class="category-label-text">Description :</label>
                    <textarea class="category-input" type="text" name="description"  placeholder="Enter Book Description"></textarea>
                    <br>
                    <br>

                    <label class="category-label-text">Number of Book In Store :</label>
                    <textarea class="category-input" type="text" name="totalBook" required placeholder="Enter Total Books"></textarea>
                    <br>
                    <br>

                    <input class="category-submit" type="submit" value="submit">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index.php");
}
?>