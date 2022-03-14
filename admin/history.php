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
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Game Name</th>
                                            <th scope="col">Game Type</th>
                                            <th scope="col">Bid On</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $s = "select * from history";
                                            $rr = $conn->query($s);
                                            while($row1 = mysqli_fetch_assoc($rr)){
                                                $id = $row1['user_id'];
                                            $sql = "select * from user where id = '$id'";
                                            $r = $conn->query($sql);
                                            while($row = mysqli_fetch_assoc($r)){
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['number'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row1['game_name'];?></td>
                                            <td><?php echo $row1['game_type'];?></td>
                                            <td><?php echo $row1['bid_on'];?></td>
                                            <td>₹ <?php echo $row1['amount'];?></td>
                                            <td><?php echo $row1['date'];?></td>
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