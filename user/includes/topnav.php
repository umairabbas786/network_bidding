<?php 
$row = GetUserWithEmail($_SESSION['user'],$conn);
?>

<div class="container-fluid no-gutters sticky-top">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area d-flex align-items-center"></div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="profile_info">
                                <h3 class="badge badge-warning mr-4 mt-3" style="font-size:15px;">Wallet Balance: ₹ <?php echo $row['balance'];?><h3>
                            </div>
                            <div class="profile_info">
                                <img src="img/profile.png" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <h5 class="mb-n2"><?php echo $row['name'];?></h5>
                                        <small class="text-light"><?php echo $row['email'];?></small>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="profile.php">My Profile </a>
                                        <a href="setting.php">Settings</a>
                                        <a href="logout.php">Log Out </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>