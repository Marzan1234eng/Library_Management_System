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
                <p class="category-headline">Book List</p>
                <label class="category-label-text">Select Category :</label>
                <form action="" method="post">
                    <select name="category">
                        <option value="">

                        </option>
                        <?php
                        include ("include/connection.php");
                        $sql = "SELECT `name` , cat_auto_id FROM `category`"; /*To Print Category ID & Book Name*/
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
                    <input class="category-submit" type="submit" value="submit">
                </form>

                <?php
                if (isset($_POST['category'])){
                    $category = $_POST['category'];
                $sql = "SELECT sum(`totalbook`) as `total` FROM `book` WHERE `category` = '$category'";  /*To Print the total book in a category*/
                $res = $conn->query($sql);
                $res = $res->fetch_assoc();
                if($res['total'] != 0){
                ?>
                <label>Total no of book is <?php echo $res['total'] ?>  </label>
                    <?php
                }
                ?>
                <div class="table-responsive">
                    <div class="table my-custom-scrollbar">
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Writer Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Total No of Books</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "include/connection.php";
                            $sql = "SELECT * FROM `book` WHERE `category` = '$category'"; /*To print all the book in a category*/
                            $res = $conn->query($sql);

                            if ($res->num_rows > 0){
                                $i = 1;
                                while ($row = $res->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $row['category']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><img style="height: 40px;" src="<?php echo "images/$row[image]" ?>" alt="image"></td>
                                        <td><?php echo $row['writename']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td><?php echo $row['totalbook']?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            else{
                                echo "No Book Found.";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                        <?php
                }
                $conn->close();
                ?>
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