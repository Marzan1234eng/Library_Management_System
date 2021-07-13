<?php
ob_start();
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-sidebar.php"?>

    <div class="col-9 dashboard-right-side">
        <p class="header-welcome">Welcome To Library Management System</p>
        <p class="header-book-list">Book List</p>
        <div class="row right-common-row" >
            <div class="col-md-12">
                <form class="search-form" action="" method="post">
                    <select class="form-input" name="category">
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
                    <input class="form-input" type="text" name="name"  placeholder="Book Name">
                    <input class="form-input" type="text" name="writername"  placeholder="Author">
                    <input class="category-submit" type="submit" value="Search">
                </form>

                <?php
                $name = "";
                $wname = "";
                if (isset($_POST['name']) || isset($_POST['writername'])) {
                    $name = $_POST['name'];
                    $wname = $_POST['writername'];
                }

                    ?>
                    <div class="table-responsive">
                        <div class="table my-custom-scrollbar">
                            <table class="table table-striped">
                                <thead class="search-thread">
                                <tr>
                                    <th class="center" scope="col">Serial No</th>
                                    <th class="center" scope="col">Book ID</th>
                                    <th class="center" scope="col">Name</th>
                                    <th class="center" scope="col">Image</th>
                                    <th class="center" scope="col">Author</th>
                                    <th class="center" scope="col">In Stock</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql = "SELECT * FROM `book` 
                                            WHERE 
                            `name` LIKE '%".$name."%' AND `writename` LIKE '%".$wname."%'";

                                $res = $conn->query($sql);

                                if ($res->num_rows > 0){
                                    $i = 1;
                                while ($row = $res->fetch_assoc()){

                                ?>
                                <tr>
                                    <td class="center" ><?php echo $i?></td>
                                    <td class="center" ><?php echo $row['id']?></td>
                                    <td class="center" ><?php echo $row['name']?></td>
                                    <td class="center" ><img style="height: 40px;" src="<?php echo "images/$row[image]" ?>" alt="image"></td>
                                    <td class="center" ><?php echo $row['writename']?></td>
                                    <td class="center" ><?php echo $row['totalbook']?></td>
                                </tr>
                                    <?php
                                    $i = $i + 1;
                                    }
                                }
                                else{
                                    header("Location: ./book_search.php?msg=No Book Found.");
                                    }
                                $conn->close();
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index.php");
}
?>