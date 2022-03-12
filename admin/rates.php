<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    if(isset($_POST['rates'])){
        $success = "";
        $error = "";
        $one = $_POST['one'];
        $two = $_POST['two'];
        $three = $_POST['three'];
        $four = $_POST['four'];

        $s1 = "update rates set price = '$one' where id = '1'";
        $r1 = $conn->query($s1);
        $s2 = "update rates set price = '$two' where id = '2'";
        $r2 = $conn->query($s2);
        $s3 = "update rates set price = '$three' where id = '3'";
        $r3 = $conn->query($s3);
        $s4 = "update rates set price = '$four' where id = '4'";
        $r4 = $conn->query($s4);

        if($r1 && $r2 && $r3 && $r4){
            $success = "Rates Updated";
        }else{
            $error = "Not Updated";
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
                                <h3> Manage Game Rates</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="modal-content cs_modal">
                                <div class="modal-body">
                                <?php if(!empty($success)){?>
                                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                    <?php echo $success; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <?php if(!empty($error)){?>
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <?php echo $error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                    <form method="POST" action="">
                                        <?php 
                                            $sql = "select price from rates where id = '1'";
                                            $r = $conn->query($sql);
                                            $row = mysqli_fetch_assoc($r);
                                            $price = $row['price'];
                                        ?>
                                        <div class="form-group">
                                            <label for=""><b>KHANAPARA TEER FR</b></label>
                                            <input type="number" name="one" class="form-control" value="<?php echo $price;?>" placeholder="Enter Amount">
                                        </div>
                                        <?php 
                                            $sql = "select price from rates where id = '2'";
                                            $r = $conn->query($sql);
                                            $row = mysqli_fetch_assoc($r);
                                            $price = $row['price'];
                                        ?>
                                        <div class="form-group">
                                            <label for=""><b>KHANAPARA TEER SR</b></label>
                                            <input type="number" name="two" class="form-control" value="<?php echo $price;?>" placeholder="Enter Amount">
                                        </div>
                                        <?php 
                                            $sql = "select price from rates where id = '3'";
                                            $r = $conn->query($sql);
                                            $row = mysqli_fetch_assoc($r);
                                            $price = $row['price'];
                                        ?>
                                        <div class="form-group">
                                            <label for=""><b>SHILLONG TEER FR</b></label>
                                            <input type="number" name="three" class="form-control" value="<?php echo $price;?>" placeholder="Enter Amount">
                                        </div>
                                        <?php 
                                            $sql = "select price from rates where id = '4'";
                                            $r = $conn->query($sql);
                                            $row = mysqli_fetch_assoc($r);
                                            $price = $row['price'];
                                        ?>
                                        <div class="form-group">
                                            <label for=""><b>SHILLONG TEER SR</b></label>
                                            <input type="number" name="four" class="form-control" value="<?php echo $price;?>" placeholder="Enter Amount">
                                        </div>
                                        <button type="submit" name="rates" class="btn btn-info btn-block full_width text-center">Update Rates</button>
                                    </form>
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