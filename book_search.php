<?php
session_start();
if(isset($_SESSION["username"])){
include "include/header.php";
include "include/dashboard-header.php";
?>

<div style="height: 100%" class="row dashboard-category-row">
    <?php include "include/dashboard-column.php"?>

    <div class="col-9 dashboard-right-side">
        <div class="row" >
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" method="post">
                    <p class="category-headline">Search Book</p>
                    <label class="category-label-text">Select Category :</label>
                    <select name="category">
                        <?php
                        include ("include/connection.php");
                        $sql = "SELECT `name` , cat_auto_id FROM `category`";
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
                    <label class="category-label-text">Enter Book Name:</label>
                    <input type="text" name="name"  placeholder="Enter Book Name">
                    <br>
                    <br>
                    <label class="category-label-text">Enter Writer Name:</label>
                    <input type="text" name="writername"  placeholder="Enter Writer Name">
                    <br>
                    <br>
                    <input class="category-submit" type="submit" value="Submit">
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
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Book ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Writer Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Total No of Books</th>
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
                                    <td><?php echo $i?></td>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><img style="height: 40px;" src="<?php echo "images/$row[image]" ?>" alt="image"></td>
                                    <td><?php echo $row['writename']?></td>
                                    <td><?php echo $row['description']?></td>
                                    <td><?php echo $row['totalbook']?></td>
                                </tr>
                                    <?php
                                    $i = $i + 1;
                                    }
                                }
                                else{
                                    echo "No Book Found.";
                                    }
                                $conn->close();
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
    <?php
}else{
    header("Location: ./index2.php");
}
?>