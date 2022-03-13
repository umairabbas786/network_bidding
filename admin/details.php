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
                                <h3> User Details</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $result = '0';
                $id = $_GET['id'];
                $sql = "select * from bank_detail where user_id = '$id'";
                $r = $conn->query($sql);
                $row = mysqli_fetch_assoc($r);
                if(mysqli_num_rows($r) >0){
                    $result = '1';
                }
            ?>
            <?php 
                $result1 = '0';
                $id = $_GET['id'];
                $sql = "select * from account_detail where user_id = '$id'";
                $r = $conn->query($sql);
                $row1 = mysqli_fetch_assoc($r);
                if(mysqli_num_rows($r)>0){
                    $result1 = '1';
                }
            ?>

            <div class="col-md-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="modal-content cs_modal">
                                <div class="modal-body">
                                    <?php if($result == '1'){?>
                                    <h4>Bank Name: </h2> <p><?php echo $row['bank_name'];?></p> <br>
                                    <h4>Account Number: </h4> <p><?php echo $row['account_number'];?></p> <br>
                                    <h4>IFSC Code: </h4> <p><?php echo $row['ifsc_code'];?></p> <br>
                                    <h4>Account Holder Name: </h4> <p><?php echo $row['account_name'];?></p> <br>
                                    <?php }?>
                                    <?php if($result1 == '1'){?>
                                    <h4>PayTm Number: </h4> <p><?php echo $row1['paytm'];?></p> <br>
                                    <h4>Phone Pay Number: </h4> <p><?php echo $row1['phone_pay'];?></p> <br>
                                    <h4>Google Pay Number: </h4> <p><?php echo $row1['google_pay'];?></p>
                                    <?php }if($result == '0' && $result1 == '0'){?>
                                        <h4 class="text-center">No Data Uploaded by User.</h4>
                                    <?php }?>
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