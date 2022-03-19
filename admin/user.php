<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    if(isset($_POST['add'])){
        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $sql = "select balance from user where id = '$id'";
        $r = $conn->query($sql);
        $row = mysqli_fetch_assoc($r);
        $old = $row['balance'];
        $new = $old + $amount;
        $s = "update user set balance = '$new' where id = '$id'";
        if($conn->query($s)){
            $success = "Balance Added";
        }
        else{
            $danger = "Unable to add balance";
        }
    }

?>

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
                <?php if(!empty($success)){?>
                                <div class="alert text-center alert-success alert-dismissible fade show mb-2" role="alert">
                                    <?php echo $success; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <?php if(!empty($error)){?>
                                <div class="alert text-center alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <?php echo $error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <a href="export.php" class="btn btn-primary float-right">Save As CSV</a>
                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Balance</th>
                                            <th scope="col">Add Funds</th>
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
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                    <input type="number" class="form-control" name="amount" id="" placeholder="Enter Amount" required>
                                                    <button type="submit" name="add" class="mt-2 btn btn-block btn-success">Add Funds</button>
                                                </form>
                                            </td>
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