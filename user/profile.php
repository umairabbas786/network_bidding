<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
$success = "";
$error = "";
$row= GetUserWithEmail($_SESSION['user'],$conn);
if(isset($_POST['add_bank'])){
    $id = $row['id'];
    if(AddBankDetails($id,$_POST['bank'],$_POST['account'],$_POST['code'],$_POST['name'],$conn) == true){
        $success = "Bank Details Added ";
        // header("location:profile.php");
    }
    else{
        $error = "Unable to Add Bank Details";
    }
}

if(isset($_POST['update_bank'])){
    $id = $row['id'];
    if(UpdateBankDetails($id,$_POST['bank'],$_POST['account'],$_POST['code'],$_POST['name'],$conn) == true){
        $success = "Bank Details Updated";
    }
    else{
        $error = "Unable to Update Bank Details";
    }
}
?>

<?php 
    $suc = "";
    $err = "";

    if(isset($_POST['add_account'])){
        $id = $row['id'];
        if(AddAccountDetails($id,$_POST['paytm'],$_POST['phone'],$_POST['google'],$conn) == true){
            $suc = "Account Details Added";
        }
        else{
            $err = "Unable to add Account Details";
        }
    }

    if(isset($_POST['update_account'])){
        $id = $row['id'];
    if(UpdateAccountDetails($id,$_POST['paytm'],$_POST['phone'],$_POST['google'],$conn) == true){
        $suc = "Account Details Updated";
    }
    else{
        $err = "Unable to Update Account Details";
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
                                <h3> Profile</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="index.php">Home</a> <i class="fas fa-caret-right"></i> Profile
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white_box mb_30">
                    <div class="row">
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
                                    <h5 class="modal-title text_white">Bank Details</h5>
                                </div>
                                <div class="modal-body">
                                    <?php if(CheckBankDetails($row['id'],$conn) == false){?>
                                    <form method="POST" action="">
                                        <div class="form-group">
                                        <label for=""><b>Account Number</b></label>
                                            <input type="text" name="account" class="form-control"
                                                placeholder="Enter your Account Number" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>Bank Name</b></label>
                                            <input type="text" name="bank" class="form-control" placeholder="Enter Your Bank Name" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>IFSC Code</b></label>
                                            <input type="text" name="code" class="form-control" placeholder="Enter Your IFSC Code" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>Account Holder Name</b></label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Account Holder Name" required>
                                        </div>
                                        <button type="submit" name="add_bank" class="btn btn-block btn-info full_width text-center">Add Bank Details</button>
                                    </form>
                                    <?php }else{?>
                                        <?php $row1 = GetBankDetails($row['id'],$conn);?>
                                        <form method="POST" action="">
                                            <div class="form-group">
                                            <label for=""><b>Account Number</b></label>
                                                <input type="text" name="account" class="form-control"
                                                    placeholder="Enter your Account Number" value="<?php echo $row1['account_number'];?>" required>
                                            </div>
                                            <div class="form-group">
                                            <label for=""><b>Bank Name</b></label>
                                                <input type="text" name="bank" class="form-control" value="<?php echo $row1['bank_name'];?>" placeholder="Enter Your Bank Name" required>
                                            </div>
                                            <div class="form-group">
                                            <label for=""><b>IFSC Code</b></label>
                                                <input type="text" name="code" class="form-control" value="<?php echo $row1['ifsc_code'];?>" placeholder="Enter Your IFSC Code" required>
                                            </div>
                                            <div class="form-group">
                                            <label for=""><b>Account Holder Name</b></label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $row1['account_name'];?>" placeholder="Enter Account Holder Name" required>
                                            </div>
                                            <button type="submit" name="update_bank" class="btn btn-block btn-info full_width text-center">Update Bank Details</button>
                                        </form>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-2">
                            <div class="modal-content cs_modal">
                                <?php if(!empty($suc)){?>
                                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                    <?php echo $suc; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <?php if(!empty($err)){?>
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <?php echo $err; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <div class="modal-header justify-content-center bg-primary">
                                    <h5 class="modal-title text_white">Accounts</h5>
                                </div>
                                <div class="modal-body">
                                <?php if(CheckAccountDetails($row['id'],$conn) == false){?>
                                    <form method="POST" action="">
                                        <div class="form-group">
                                        <label for=""><b>PayTm Number</b></label>
                                            <input type="text" name="paytm" class="form-control" placeholder="Enter PayTm Number" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>Phone Pay Number</b></label>
                                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Pay Number" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>Google Pay (TEZ)</b></label>
                                            <input type="text" name="google" class="form-control" placeholder="Enter Google Pay(Tez) Number" required>
                                        </div>
                                        <button type="submit" name="add_account" class="btn btn-block btn-info full_width text-center">Add Account Details</button>
                                    </form>
                                    <?php }else{?>
                                        <?php $row2 = GetAccountDetails($row['id'],$conn);?>
                                        <form method="POST" action="">
                                        <div class="form-group">
                                        <label for=""><b>PayTm Number</b></label>
                                            <input type="text" value="<?php echo $row2['paytm'];?>" name="paytm" class="form-control" placeholder="Enter PayTm Number" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>Phone Pay Number</b></label>
                                            <input type="text" value="<?php echo $row2['phone_pay'];?>" name="phone" class="form-control" placeholder="Enter Phone Pay Number" required>
                                        </div>
                                        <div class="form-group">
                                        <label for=""><b>Google Pay (TEZ)</b></label>
                                            <input type="text" name="google" value="<?php echo $row2['google_pay'];?>" class="form-control" placeholder="Enter Google Pay(Tez) Number" required>
                                        </div>
                                        <button type="submit" name="update_account" class="btn btn-block btn-info full_width text-center">Update Account Details</button>
                                    </form>
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