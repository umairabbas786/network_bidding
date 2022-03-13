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
                                <h3>
                                    <?php 
                                    if($_GET['id'] == 'one'){
                                        echo "KHANAPARA - Teer FR";
                                    }
                                    else if($_GET['id'] == 'two'){
                                        echo "KHANAPARA - Teer SR";
                                    }
                                    else if($_GET['id'] == 'three'){
                                        echo "SHILLONG - Teer FR";
                                    }
                                    else if($_GET['id'] == 'four'){
                                        echo "SHILLONG - Teer SR";
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard_breadcam text-right">
                                <p><a href="index.php">Home</a> <i class="fas fa-caret-right"></i> Game Play
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="quick_activity_wrap">
                                    <a href="guti_play.php?id=<?php echo $_GET['id'];?>">
                                    <div class="single_quick_activity bg-secondary">
                                        <div class="count_content">
                                            <h1>Guti Play</h1>
                                        </div>
                                    </div>
                                    </a>
                                    <a href="housing_play.php?id=<?php echo $_GET['id'];?>">
                                    <div class="single_quick_activity bg-secondary">
                                        <div class="count_content">
                                            <h1>Housing</h1>
                                        </div>
                                    </div>
                                    </a>
                                    <a href="ending_play.php?id=<?php echo $_GET['id'];?>">
                                    <div class="single_quick_activity bg-secondary">
                                        <div class="count_content">
                                            <h1>Ending</h1>
                                        </div>
                                    </div>
                                    </a>
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