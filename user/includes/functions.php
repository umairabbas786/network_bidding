<?php 
    function GetUserWithEmail($email,$conn){
        $sql = "select * from user where email = '$email'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }
    function AddBankDetails($id,$bankname,$account,$code,$name,$conn){
        $sql = "insert into bank_detail(user_id,bank_name,account_number,ifsc_code,account_name) values('$id','$bankname','$account','$code','$name')";
        $r = $conn->query($sql);
        if($r){
            return true;
        }else{
            return false;
        }
    }
    function UpdateBankDetails($id,$bankname,$account,$code,$name,$conn){
        $sql = "update bank_detail set bank_name = '$bankname',account_number = '$account',ifsc_code = '$code',account_name = '$name' where user_id = '$id'";
        $r = $conn->query($sql);
        if($r){
            return true;
        }else{
            return false;
        }
    }
    function CheckBankDetails($id,$conn){
        $sql = "select * from bank_detail where user_id = '$id'";
        $r = $conn->query($sql);
        if(mysqli_num_rows($r) >=1){
            return true;
        }
        else{
            return false;
        }
    }
    function GetBankDetails($id,$conn){
        $sql = "select * from bank_detail where user_id = '$id'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }
?>