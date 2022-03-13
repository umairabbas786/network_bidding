<?php include "includes/header.php"?>


<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $_GET['status'];
        if($status == 'accept'){
            $sql = "update transaction set status = '1' where id = '$id'";
            $r = $conn->query($sql);
            if($r){
                header("location:transaction.php");
            }
        }
        if($status == 'reject'){
            $sql = "select * from transaction where id = '$id'";
            $r = $conn->query($sql);
            $row = mysqli_fetch_assoc($r);
            $userid = $row['user_id'];
            $balanceout = $row['amount'];
            $s = "select balance from user where id = '$userid'";
            $rr = $conn->query($s);
            $row1 = mysqli_fetch_assoc($rr);
            $existing = $row1['balance'];
            $balance = $existing + $balanceout;
            $sss = "update user set balance = '$balance' where id = '$userid'";
            $rrr = $conn->query($sss);
            $s2 = "update transaction set status = '-1' where id = '$id'";
            $r2 = $conn->query($s2);
            if($r && $r2){
                header("location:transaction.php");
            }
        }
    }

?>