<?php
session_start();
/* Checking the session*/
if(isset($_SESSION["username"])){
include "include/header.php";
?>
    <div class="row dashboard-category-row-color">
        <?php include "include/dashboard-sidebar.php"?>

        <div class="col-10 dashboard-right-side">
            <h1 class="header-welcome">Dashboard</h1>
            <p class="date_p" id="date"></p>
            <script>
                document.getElementById("date").innerHTML = Date();
            </script>

            <div class="row dash-one-col">
                <div class="col-md-3 three-box">
                    <p class="dash-position-p week-text">Weekly Activity</p>
                    <p class="box-text member-color">75%</p>
                </div>
                <div class="col-md-3 three-box">
                    <p class="dash-position-p week-text">Member</p>
                    <p class="box-text member-color">365</p>
                </div>
                <div class="col-md-3 three-box-three">
                    <p class="dash-position-p week-text">Time</p>
                    <p class="box-text member-color">10:00 AM</p>
                </div>

                <div class="row dash-two-col">
                    <div class="col-md-7 box-two-book">
                        <p class="dash-position-p week-text">Book List</p>
                        <div class="table-responsive dash-tab-margin" >
                            <div class="table my-custom-scrollbar-dash" >
                                <table class="table table-striped">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">In Stock</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "include/connection.php";
                                    $sql = "SELECT * FROM `book`"; /*To print all the book in a category*/
                                    $res = $conn->query($sql);

                                    if ($res->num_rows > 0){
                                        $i = 1;
                                        while ($row = $res->fetch_assoc()){
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $i?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['writename']?></td>
                                                <td><?php echo $row['totalbook']?></td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 box-two-category">
                        <p class="dash-position-p week-text">Category</p>
                        <div class="table-responsive dash-tab-margin" >
                            <div class="table my-custom-scrollbar-dash" >
                                <table class="table table-striped">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "include/connection.php";
                                    $sql = "SELECT * FROM `category`"; /*To print all the book in a category*/
                                    $res = $conn->query($sql);

                                    if ($res->num_rows > 0){
                                        $i = 1;
                                        while ($row = $res->fetch_assoc()){
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $i?></td>
                                                <td><?php echo $row['name']?></td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row dash-col-three">
                    <div class="col-md-6 box-two-book" style="height: 200px!important;">
                        <p class="dash-position-p week-text">Book Issue Policy</p>
                        <p class="dash-position-p">In publishing and graphic design,  Lorem ipsum is a
                            text commonly used to demonstrate the visual form of a
                            typeface without relying on meaningful content.</p>
                    </div>
                    <div class="col-md-4 box-two-category" style="height: 200px!important; width: 40%!important;">
                        <p class="dash-position-p week-text">Damage Criteria</p>
                        <p class="dash-position-p">In publishing and graphic design, Lorem ipsum is a
                            placeholder text commonly used to demonstrate
                            visual form of a document or a t</p>
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



