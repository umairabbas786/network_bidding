<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    if(isset($_POST['setting'])){
        $calling = $_POST['number'];
        $whatsapp = $_POST['whatsapp'];
        $one_open = $_POST['one_open'];
        $one_close = $_POST['one_close'];
        $two_open = $_POST['two_open'];
        $two_close = $_POST['two_close'];
        $three_open = $_POST['three_open'];
        $three_close = $_POST['three_close'];
        $four_open = $_POST['four_open'];
        $four_close = $_POST['four_close'];
        $sql = "update setting set number = '$calling',whatsapp = '$whatsapp',one_open = '$one_open',one_close = '$one_close',
        two_open = '$two_open',two_close = '$two_close',three_open = '$three_open',three_clode = '$three_close',
        four_open = '$four_open',four_close = '$four_close' where id = '1'";
        $r = $conn->query($sql);
        if($r){
            $success = "Settings Updated";
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
                                <h3> Setting</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="index.php">Home</a> <i class="fas fa-caret-right"></i> Setting
                                </p>
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
                                    <form method="POST" action="">
                                        <?php 
                                            $sql = "select * from setting where id = '1'";
                                            $r = $conn->query($sql);
                                            $row = mysqli_fetch_assoc($r);
                                        ?>
                                        <div class="form-group">
                                            <label for=""><b>Calling Number</b></label>
                                            <input type="number" value="<?php echo $row['number'];?>" required class="form-control" name="number">
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Whatsapp Number</b></label>
                                            <input type="number" value="<?php echo $row['whatsapp'];?>" class="form-control" name="whatsapp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>KHANAPARA - Teer FR (Open Time)</b></label>
                                            <input type="time" value="<?php echo $row['one_open'];?>" class="form-control" name="one_open" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>KHANAPARA - Teer FR (Close Time)</b></label>
                                            <input type="time" value="<?php echo $row['one_close'];?>" class="form-control" name="one_close" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>KHANAPARA - Teer SR (Open Time)</b></label>
                                            <input type="time" value="<?php echo $row['two_open'];?>" class="form-control" name="two_open" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>KHANAPARA - Teer SR (Close Time)</b></label>
                                            <input type="time" value="<?php echo $row['two_close'];?>" class="form-control" name="two_close" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>SHILLONG - Teer FR (Open Time)</b></label>
                                            <input type="time" value="<?php echo $row['three_open'];?>" class="form-control" name="three_open" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>SHILLONG - Teer FR (Close Time)</b></label>
                                            <input type="time" value="<?php echo $row['three_clode'];?>" class="form-control" name="three_close" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>SHILLONG - Teer SR (Open Time)</b></label>
                                            <input type="time" value="<?php echo $row['four_open'];?>" class="form-control" name="four_open" required>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>SHILLONG - Teer SR (Close Time)</b></label>
                                            <input type="time" value="<?php echo $row['four_close'];?>" class="form-control" name="four_close" required>
                                        </div>
                                        <button type="submit" name="setting" class="btn btn-info btn-block full_width text-center">Update</button>
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