<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>

<?php 
    $row= GetUserWithEmail($_SESSION['user'],$conn);
    $success = "";
    $error = "";
    if(isset($_POST['change_pass'])){
        $id = $row['id'];
        if(ChangePassword($id,$_POST['old'],$_POST['new'],$_POST['cnew'],$conn) == true){
            $success = "Password Changed";
        }
        else{
            $error = "Enter Correct Details";
        }
    }

?>


<!--Main Work-->
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
                            <div class="modal-header justify-content-center bg-primary">
                                    <h5 class="modal-title text_white">Change Password</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <input type="password" name="old" class="form-control" placeholder="Enter Current Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new" minlength="6" class="form-control" placeholder="Enter New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="cnew" minlength="6" class="form-control" placeholder="Enter Confirm Password" required>
                                        </div>
                                        <button type="submit" name="change_pass" class="btn btn-info btn-block full_width text-center">Change Password</button>
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