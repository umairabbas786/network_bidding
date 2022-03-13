<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    $success = "";
    $error = "";
    $row = GetUserWithEmail($_SESSION['user'],$conn);
    if(isset($_POST['withdraw'])){
        $amount = $_POST['amount'];
        if($amount <= $row['balance']){
            if(CheckBankDetails($row['id'],$conn) == true || CheckAccountDetails($row['id'],$conn) == true){
                if(Withdraw($row['id'],$amount,$conn) == true){
                    $success = "Withdraw request will be approved by admin in 24 hours";
                }
                else{
                    $error = "Unable to Withdraw Funds";
                }
            }
            else{
                $error = "Add Bank Account/ Other Accounts to get Withdraw";
            }
        }
        else{
            $error = "You Dont have enough balance";
        }
        if($amount< 0){
            $error = "Amount Should be Greater than '0'";
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
                                <h3> Withdraw Funds</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="index.php">Home</a> <i class="fas fa-caret-right"></i> Withdraw Funds
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
                                <div class="modal-body">
                                    <h2 class="text-center"><i class="fas fa-wallet"></i> ₹ <?php echo $row['balance'];?></h2>
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <input type="number" name="amount" required class="form-control" placeholder="Enter Amount">
                                        </div>
                                        <button type="submit" name="withdraw" class="btn btn-info btn-block full_width text-center">Add Request</button>
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