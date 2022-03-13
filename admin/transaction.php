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
                                <h3>Withdraw Requests</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $s = "select * from transaction where type = 'Withdraw'";
                                            $rr = $conn->query($s);
                                            while($row1 = mysqli_fetch_assoc($rr)){
                                                $id = $row1['user_id'];
                                            $sql = "select * from user where id = '$id'";
                                            $r = $conn->query($sql);
                                            while($row = mysqli_fetch_assoc($r)){
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row1['date'];?></td>
                                            <td>₹ <?php echo $row1['amount'];?></td>
                                            <td><?php if($row1['status'] == '1'){echo "<h3 href='' style='font-size:14px;' class='badge badge-success'>Approved</h3>";}else if($row1['status'] == '-1'){echo "<h3 href='' style='font-size:14px;' class='badge badge-danger'>Rejected</h3>";}else if($row1['status'] == '0'){echo "<h3 href='' style='font-size:14px;' class='badge badge-info'>Pending</h3>";}?></td>
                                            <td>
                                                <?php if($row1['status'] == '0'){?>
                                                <a href="change.php?id=<?php echo $row1['id'];?>&&status=accept" style="color:white;" class="btn btn-success" style="border-radius: 50%;"><i class="fas fa-check"></i></a>
                                                &nbsp;&nbsp;
                                                <a href="change.php?id=<?php echo $row1['id'];?>&&status=reject" style="color:white;" class="btn btn-danger" style="border-radius: 50%;"><i class="fas fa-times"></i></a>
                                                <?php }else if($row1['status'] == '1' || $row1['status'] == '-1'){?>
                                                    <a href="change.php?id=<?php echo $row1['id'];?>&&status=reject" style="color:white;pointer-events: none;" class="btn btn-danger" style="border-radius: 50%;"><i class="fas fa-times"></i></a>
                                                    &nbsp;&nbsp;
                                                    <a href="change.php?id=<?php echo $row1['id'];?>&&status=accept" style="color:white;pointer-events: none;" class="btn btn-success" style="border-radius: 50%;"><i class="fas fa-check"></i></a>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
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