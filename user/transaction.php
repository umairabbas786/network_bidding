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
                                <h3> Transaction History</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="index.php">Home</a> <i class="fas fa-caret-right"></i> Transaction History
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $row = GetUserWithEmail($_SESSION['user'],$conn);
                                        $id = $row['id'];
                                        $sql = "select * from transaction where user_id = '$id'";
                                        $r = $conn->query($sql);
                                        if(mysqli_num_rows($r) >=1){
                                        while($row1 = mysqli_fetch_assoc($r)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row1['date'];?></td>
                                        <td>₹ <?php echo $row1['amount'];?></td>
                                        <td><?php echo $row1['type'];?></td>
                                        <td><?php if($row1['status'] == '1'){echo "<p style='font-size:14px;' class='badge badge-success'>Approved</p>";}
                                        else if($row1['status'] == '0'){echo "<p style='font-size:14px;' class='badge badge-info'>Pending</p>";}
                                        else if($row1['status'] == '-1'){echo "<p style='font-size:14px;' class='badge badge-danger'>Rejected</p>";}?>
                                        </td>
                                    </tr>
                                    <?php }}else{?>
                                        <td>No Data Found</td>
                                    <?php }?>
                                </tbody>
                            </table>
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