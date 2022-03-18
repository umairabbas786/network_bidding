<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    $row = GetUserWithEmail($_SESSION['user'],$conn);
    if(isset($_POST['bid'])){
        if($_GET['id'] == 'one'){
            $name = 'KHANAPARA - Teer FR';
        }
        else if($_GET['id'] == 'two'){
            $name = 'KHANAPARA - Teer SR';
        }
        else if($_GET['id'] == 'three'){
            $name = 'SHILLONG - Teer FR';
        }
        else if($_GET['id'] == 'four'){
            $name = 'SHILLONG - Teer SR';
        }
        $type = 'Guti Play';
        $id = $row['id'];
        $ptr = [];
        $ptr = $_POST['number'];
        $nums = [];
        $x = 0;
        $sum = 0;
        foreach ($ptr as $value => $key){
            if($key != ''){
                $sum += $key;
                $nums[$x] = $value;
                $x++;
            }
        }
        if($sum == 0){
            $error = "Bid On any of the following number";
        }
        $nums = implode(", ",$nums);
        if(CheckBalance($id,$sum,$conn) == true){
            if(DeductBalance($id,$sum,$conn) == true){
                if(PlayHistory($id,$name,$type,$nums,$sum,$conn) == true){
                    $success = "bid Placed Successfully";
                }
            }
        }else{
            $error = "You have Insufficient Balance";
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
                                <h3>
                                    <?php 
                                    if($_GET['id'] == 'one'){
                                        echo "KHANAPARA - Teer FR (GUTI PLAY)";
                                    }
                                    else if($_GET['id'] == 'two'){
                                        echo "KHANAPARA - Teer SR (GUTI PLAY)";
                                    }
                                    else if($_GET['id'] == 'three'){
                                        echo "SHILLONG - Teer FR (GUTI PLAY)";
                                    }
                                    else if($_GET['id'] == 'four'){
                                        echo "SHILLONG - Teer SR (GUTI PLAY)";
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
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-dark text-center" style="font-size:20px;" role="alert">
                                    Select a Number on which You want to bid.
                                </div>
                                <?php if(!empty($success)){?>
                                <div class="alert alert-success alert-dismissible fade show mb-2 text-center" role="alert">
                                    <?php echo $success; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <?php if(!empty($error)){?>
                                <div class="alert alert-danger alert-dismissible fade show mb-2 text-center" role="alert">
                                    <?php echo $error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <div class="container text-center">
                                <form action="" method="POST">
                                    <div class="col-md-12">
                                    <div class="row">
                                        
                                    <?php 
                                        $i = '00';
                                        while($i != '100'){
                                            if($i == '1'){$i = '01';}
                                            if($i == '2'){$i = '02';}
                                            if($i == '3'){$i = '03';}
                                            if($i == '4'){$i = '04';}
                                            if($i == '5'){$i = '05';}
                                            if($i == '6'){$i = '06';}
                                            if($i == '7'){$i = '07';}
                                            if($i == '8'){$i = '08';}
                                            if($i == '9'){$i = '09';}
                                    ?>
                                    <div class="col-md-2 col-4">
                                    <label class="btn btn-success">
                                    <?php echo $i;?> <input type="number" class="form-control" placeholder="Enter Amount" name="number[<?php echo $i;?>]">
                                    </label>
                                        </div>
                                    <?php $i++;}?>
                                    <br>
                                    </div>
                                    </div>
                                    <div class="col-md-6 offset-md-3">
                                        <div class="form-group">
                                            <button type="submit" onclick="return ('are you sure you want to pay?');" name="bid" class="btn btn-warning btn-block">Submit</button>
                                        </div>
                                    </div>
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