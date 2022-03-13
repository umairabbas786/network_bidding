<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php
    require_once 'razorpay-php/Razorpay.php';

    use Razorpay\Api\Api;
    if(isset($_POST['deposit'])){
    $keyId = 'rzp_test_BBjPCY2sL45akM';
    $secretKey = 'RxkTmTQuj1aGCO28tfe6L4Fo';
    $api = new Api($keyId,$secretKey);

    $row = GetUserWithEmail($_SESSION['user'],$conn);
    $amount = $_POST['amount'];
    $CUSTOMER_NAME = $row['name'];
    $CUSTOMER_EMAIL = $row['email'];
    $CUSTOMER_MOBILE = $row['number'];
    $PAY_AMT = $_POST['amount'] .'00';
    
    $order = $api->order->create(array(
        'receipt' => rand(1000, 9999) . 'ORD',
        'amount' => $PAY_AMT,
        'payment_capture' => 1,
        'currency' => 'INR',
    ));
}
else{
    header("location:deposit.php");
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
                                <h3> Add Funds</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="index.php">Home</a> <i class="fas fa-caret-right"></i> Add Funds
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
                                    <form action="success.php" class="btn btn-block btn-warning" method="POST">
                                        <script
                                            src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="<?php echo $keyId?>"
                                            data-amount="<?php echo $order->amount;?>"
                                            data-currency="INR"
                                            data-order-id="<?php echo $order->id; ?>"
                                            data-buttontext="Pay with Razorpay"
                                            data-name="Number Bidding"
                                            data-description="Account Deposit"
                                            data-image="<?php echo 'https://fiver.umairabbas.me/user/img/logo.png';?>"
                                            data-prefill.name="<?php echo $CUSTOMER_NAME;?>"
                                            data-prefill.email="<?php echo $CUSTOMER_EMAIL;?>"
                                            data-prefill.contact="<?php echo $CUSTOMER_MOBILE;?>"
                                            data-theme.color="$f0a43c"
                                        ></script>
                                        <input type="hidden" value="<?php echo $CUSTOMER_EMAIL;?>" name="email">
                                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
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