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
                                <h3>Users</h3>
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
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Balance</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "select * from user";
                                            $r = $conn->query($sql);
                                            while($row = mysqli_fetch_assoc($r)){
                                        ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $row['id'];?></th>
                                            <td><a href="details.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
                                            <td><a href="details.php?id=<?php echo $row['id'];?>"><?php echo $row['email'];?></a></td>
                                            <td><a href="details.php?id=<?php echo $row['id'];?>"><?php echo $row['number'];?></a></td>
                                            <td><a href="details.php?id=<?php echo $row['id'];?>"><?php if($row['status'] == '1'){echo "<h3 href='' style='font-size:14px;' class='badge badge-success'>Verified</h3>";}else{echo "<h3 href='' style='font-size:14px;' class='badge badge-danger'>Not Verified</h3>";}?></a></td>
                                            <td><a href="details.php?id=<?php echo $row['id'];?>">₹ <?php echo $row['balance'];?></a></td>
                                            <td><a href="details.php?id=<?php echo $row['id'];?>"><?php echo $row['date'];?></a></td>
                                        </tr>
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
</div>
</div>
<!--Main Work-->
<?php include "includes/footer.php";?>
<?php include "includes/script.php";?>