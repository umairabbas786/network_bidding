<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php $row = Settings($conn);?>

<div class="main_content_iner ">
    <div class="container-fluid p-0 ">
        <div class="row ">
            <div class="col-md-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dashboard_header_title">
                                <h3>Home Page</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-dark text-center" style="font-size:20px;" role="alert">
                    Our Number has been updated. You can contact us now on <a href="tel:+<?php echo $row['number'];?>">+<?php echo $row['number'];?></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-dark text-center" style="font-size:20px;" role="alert">
                    Play ₹1 = ₹ 76/-<br>
                    Play ₹10 = ₹ 760/- <br>
                    Play ₹100 = ₹ 7600/-
                </div>
            </div>
            <div class="col-md-6">
                <center><a href="https://wa.me/<?php echo $row['whatsapp']?>" target="_blank" class="text-center"><img src="img/whatsapp.png" alt="Whatsapp Button" width="300"
                        height="110" ></a></center>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        Open-BIDS- <?php echo convert12($row['one_open']);?> | Close-BIDS- <?php echo convert12($row['one_close']);?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">KHANAPARA - Teer FR (1st ROUND)</h5>
                        <?php 
                        date_default_timezone_set('Asia/Kolkata');    
                        $datee = date('h:i:sa');
                        $timeIn12HourFormat = $datee;
 
                        $dateTime = new DateTime($timeIn12HourFormat);
                        $date = $dateTime->format('H:i:s');
                        if($date >= $row['one_open'] && $date <= $row['one_close']){
                            $a = '1';
                        ?>
                        <p class="card-text">Bid is Open </p>
                        <?php }else{$a = '0';?>
                            <p class="card-text">Bid is Closed</p>
                        <?php }?>
                        <a href="game.php?id=one" <?php if($a == '0'){echo "style='pointer-events: none'";}?> class="btn btn-warning float-right mt-2">Play Game</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        Open-BIDS- <?php echo convert12($row['two_open']);?> | Close-BIDS- <?php echo convert12($row['two_close']);?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">KHANAPARA - Teer SR (2nd ROUND)</h5>
                        <?php 
                        date_default_timezone_set('Asia/Kolkata');    
                        $datee = date('h:i:sa');
                        $timeIn12HourFormat = $datee;
 
                        $dateTime = new DateTime($timeIn12HourFormat);
                        $date = $dateTime->format('H:i:s');
                        if($date >= $row['two_open'] && $date <= $row['two_close']){
                            $a = '1';
                        ?>
                        <p class="card-text">Bid is Open </p>
                        <?php }else{$a = '0';?>
                            <p class="card-text">Bid is Closed</p>
                        <?php }?>
                        <a href="game.php?id=two" <?php if($a == '0'){echo "style='pointer-events: none'";}?> class="btn btn-warning float-right mt-2">Play Game</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        Open-BIDS- <?php echo convert12($row['three_open']);?> | Close-BIDS- <?php echo convert12($row['three_clode']);?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">SHILLONG - Teer FR (1st ROUND)</h5>
                        <?php 
                        date_default_timezone_set('Asia/Kolkata');    
                        $datee = date('h:i:sa');
                        $timeIn12HourFormat = $datee;
 
                        $dateTime = new DateTime($timeIn12HourFormat);
                        $date = $dateTime->format('H:i:s');
                        if($date >= $row['three_open'] && $date <= $row['three_clode']){
                            $a = '1';
                        ?>
                        <p class="card-text">Bid is Open </p>
                        <?php }else{ $a = '0';?>
                            <p class="card-text">Bid is Closed</p>
                        <?php }?>
                        <a href="game.php?id=three" <?php if($a == '0'){echo "style='pointer-events: none'";}?> class="btn btn-warning float-right mt-2">Play Game</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        Open-BIDS- <?php echo convert12($row['four_open']);?> | Close-BIDS- <?php echo convert12($row['four_close']);?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">SHILLONG - Teer SR (2nd ROUND)</h5>
                        <?php 
                        date_default_timezone_set('Asia/Kolkata');    
                        $datee = date('h:i:sa');
                        $timeIn12HourFormat = $datee;
 
                        $dateTime = new DateTime($timeIn12HourFormat);
                        $date = $dateTime->format('H:i:s');
                        if($date >= $row['four_open'] && $date <= $row['four_close']){
                            $a = '1';
                        ?>
                        <p class="card-text">Bid is Open </p>
                        <?php }else{$a = '0'?>
                            <p class="card-text">Bid is Closed</p>
                        <?php }?>
                        <a href="game.php?id=four" <?php if($a == '0'){echo "style='pointer-events: none'";}?> class="btn btn-warning float-right mt-2">Play Game</a>
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