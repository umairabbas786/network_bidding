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
        $amount = $_POST['amount'];
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
                                <form action="" method="POST">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="form-group">
                                            <label for=""><b>House</b></label>
                                            <select name="house" class="form-control" required id="">
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
                                            <input type="number" name="amount" required class="form-control" placeholder="Enter Amount">
                                        </div>
                                        <div class="form-group">
                                            <button type="" name="add" class="btn btn-block btn-info">Add</button>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">House</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>₹ </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <button type="submit" name="bidd" class="btn btn-warning btn-block">Submit</button>
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
<!--Main Work-->
<?php include "includes/footer.php";?>
<?php include "includes/script.php";?>