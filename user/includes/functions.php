<?php 
    //USer Function
    function GetUserWithEmail($email,$conn){
        $sql = "select * from user where email = '$email'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }

    //change User Password
    function ChangePassword($id,$old,$new,$cnew,$conn){
        $sql = "select password from user where id = '$id'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        if($old == $row['password']){
            if($new == $cnew){
                $s = "update user set password = '$new' where id = '$id'";
                $rr = $conn->query($s);
                if($rr){
                    return true;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }


    //Bank Details
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
    //Account Details
    function AddAccountDetails($id,$paytm,$phone,$google,$conn){
        $sql = "insert into account_detail(user_id,paytm,phone_pay,google_pay) values('$id','$paytm','$phone','$google')";
        $r = $conn->query($sql);
        if($r){
            return true;
        }else{
            return false;
        }
    }
    function UpdateAccountDetails($id,$paytm,$phone,$google,$conn){
        $sql = "update account_detail set paytm = '$paytm',phone_pay = '$phone',google_pay = '$google' where user_id = '$id'";
        $r = $conn->query($sql);
        if($r){
            return true;
        }else{
            return false;
        }
    }
    function CheckAccountDetails($id,$conn){
        $sql = "select * from account_detail where user_id = '$id'";
        $r = $conn->query($sql);
        if(mysqli_num_rows($r) >=1){
            return true;
        }
        else{
            return false;
        }
    }
    function GetAccountDetails($id,$conn){
        $sql = "select * from account_detail where user_id = '$id'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }
?>