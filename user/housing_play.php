<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    $row = GetUserWithEmail($_SESSION['user'],$conn);
    if(isset($_POST['bidd'])){
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
        $type = 'Housing Play';
        $id = $row['id']; 
        $amount = $_POST['total'];
        $number = $_POST['number'];
        if(CheckBalance($id,$amount,$conn) == true){
            if(DeductBalance($id,$amount,$conn) == true){
                if(PlayHistory($id,$name,$type,$number,$amount,$conn) == true){
                    $success = "bid Placed Successfully";
                }
            }
        }else{
            $error = "You have Unsufficient Balance";
        }
    }

?>

<?php 
    $magic = $_GET['id'];
    $arr = [];
    $amount = 0;
    if(isset($_POST['add'])){
        $house = $_POST['house'];
        $amount = $_POST['amount'];
        $output = substr($house, 0, 1);
        $i= '00';
        $x = 0;
        while($i <= '99'){
            if($i == '1'){$i = '01';}
            if($i == '2'){$i = '02';}
            if($i == '3'){$i = '03';}
            if($i == '4'){$i = '04';}
            if($i == '5'){$i = '05';}
            if($i == '6'){$i = '06';}
            if($i == '7'){$i = '07';}
            if($i == '8'){$i = '08';}
            if($i == '9'){$i = '09';}
            if(substr($i, 0, 1) == $output){
                $arr[$x] = $i;
                $x++;
            }
            $i++;
        }
        $ptr = $string = implode(', ', $arr);
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
                                        echo "KHANAPARA - Teer FR (HOSUING PLAY)";
                                    }
                                    else if($_GET['id'] == 'two'){
                                        echo "KHANAPARA - Teer SR (HOSUING PLAY)";
                                    }
                                    else if($_GET['id'] == 'three'){
                                        echo "SHILLONG - Teer FR (HOSUING PLAY)";
                                    }
                                    else if($_GET['id'] == 'four'){
                                        echo "SHILLONG - Teer SR (HOSUING PLAY)";
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
                                <?php if(!empty($success)){?>
                                <div class="alert alert-success alert-dismissible fade show mb-2 text-center"
                                    role="alert">
                                    <?php echo $success; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <?php if(!empty($error)){?>
                                <div class="alert alert-danger alert-dismissible fade show mb-2 text-center"
                                    role="alert">
                                    <?php echo $error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php }?>
                                <div class="col-md-6 offset-md-3">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for=""><b>House</b></label>
                                            <select name="house" class="form-control" required id="">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Bidding Amount</b></label>
                                            <input type="number" name="amount" required class="form-control"
                                                placeholder="Enter Amount">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="add" class="btn btn-block btn-info">Add</button>
                                        </div>
                                    </form>
                                    <?php if(empty($arr)){?>
                                    <?php }else{?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">House</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $length = count($arr);
                                                for ($i = 0; $i < $length; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $arr[$i];?></td>
                                                <td>₹ <?php echo $amount;?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <form action="" method="POST">
                                        <input type="hidden" name="total" value="<?php echo $amount*10;?>">
                                        <input type="hidden" name="number" value="<?php echo $ptr;?>">
                                        <div class="form-group">
                                            <button type="submit" name="bidd"
                                                class="btn btn-warning btn-block">(BIDS = 10)(Amount = <?php echo $amount*10;?>)</button>
                                        </div>
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