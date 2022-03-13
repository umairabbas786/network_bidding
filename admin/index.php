<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->
<div class="main_content_iner ">
    <div class="container-fluid p-0 ">
        <div class="row ">
        <div class="col-md-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dashboard_header_title">
                                <h3> Dashboard</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-12">
                        <div class="single_element">
                            <div class="quick_activity">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="quick_activity_wrap">
                                            <?php 
                                                $sql = "select count(id) from user";
                                                $r = $conn->query($sql);
                                                $row=mysqli_fetch_assoc($r);
                                                $count = $row['count(id)'];
                                            ?>
                                            <div class="single_quick_activity">
                                                <div class="count_content mt-3">
                                                    <p>Total Users</p>
                                                    <h3><span class="counter"><?php echo $count;?></span> </h3>
                                                </div>
                                                <a href="#" class="notification_btn"></a>
                                            </div>
                                            <?php 
                                                $sql = "select count(id) from transaction where type = 'Withdraw'";
                                                $r = $conn->query($sql);
                                                $row=mysqli_fetch_assoc($r);
                                                $count = $row['count(id)'];
                                            ?>
                                            <div class="single_quick_activity">
                                                <div class="count_content mt-3">
                                                    <p>Withdraw Requests</p>
                                                    <h3><span class="counter"><?php echo $count;?></span> </h3>
                                                </div>
                                                <a href="#" class="notification_btn yellow_btn"></a>
                                            </div>
                                            <?php 
                                                $sql = "select sum(balance) from user";
                                                $r = $conn->query($sql);
                                                $row=mysqli_fetch_assoc($r);
                                                $count = $row['sum(balance)'];
                                            ?>
                                            <div class="single_quick_activity">
                                                <div class="count_content mt-3">
                                                    <p>Total Funds</p>
                                                    <h3>₹ <span class="counter"><?php echo $count;?></span> </h3>
                                                </div>
                                                <a href="#" class="notification_btn green_btn"></a>
                                                
                                            </div>

                                            <!-- <div class="single_quick_activity">
                                                <div class="count_content mt-3">
                                                    <p>Lead Conversion Rate</p>
                                                    <h3><span class="counter">50</span> %</h3>
                                                </div>
                                                <a href="#" class="notification_btn violate_btn"></a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<!--Main Work-->
<?php include "includes/footer.php";?>
<?php include "includes/script.php";?>