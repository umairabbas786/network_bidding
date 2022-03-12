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
                                <div class="modal-header justify-content-center bg-primary">
                                    <h5 class="modal-title text_white">Bank Details</h5>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" name="account" class="form-control"
                                                placeholder="Enter your Account Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Your Bank Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Your IFSC Code">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Account Holder Name">
                                        </div>
                                        <a href="#" class="btn btn-block btn-info full_width text-center">Add Bank Details</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-2">
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center bg-primary">
                                    <h5 class="modal-title text_white">Accounts</h5>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter PayTm Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Phone Pay Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Google Pay(Tez) Number">
                                        </div>
                                        <a href="#" class="btn btn-block btn-info full_width text-center">Update</a>
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