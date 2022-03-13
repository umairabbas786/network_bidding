<?php 
    //USer Function
    function GetUserWithEmail($email,$conn){
        $sql = "select * from user where email = '$email'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }
    function GetUserWithId($id,$conn){
        $sql = "select * from user where id = '$id'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }

    //time convert
    function convert12($str){
	$h1 = $str[0] - '0';
	$h2 = $str[1] - '0';
	$hh = $h1 * 10 + $h2;
	$Meridien;
	if ($hh < 12)
	{
		$Meridien = "AM";
	}
	else
		$Meridien = "PM";

	$hh %= 12;
	if ($hh == 0)
	{
		echo "12";
		for ($i = 2; $i < 8; ++$i)
		{
			echo $str[$i];
		}
	}
	else
	{
		echo $hh;
		for ($i = 2; $i < 8; ++$i)
		{
			echo $str[$i];
		}
	}
	echo " " , $Meridien;
}

    //site settings
    function Settings($conn){
        $sql = "select * from setting where id = '1'";
        $r = $conn->query($sql);
        $row=mysqli_fetch_assoc($r);
        return $row;
    }

    //history generate
    function PlayHistory($id,$name,$type,$num,$amount,$conn){
        $sql = "insert into history(user_id,game_name,game_type,bid_on,amount,date) values('$id','$name','$type','$num','$amount',now())";
        $r = $conn->query($sql);
        if($r){
            return true;
        }
        else{
            return false;
        }
    }

    //user wallet functions
    function CheckBalance($id,$amount,$conn){
        $sql = "select balance from user where id = '$id'";
        $r = $conn->query($sql);
        $row = mysqli_fetch_assoc($r);
        if($amount <= $row['balance']){
            return true;
        }
        else{
            return false;
        }
    }
    function DeductBalance($id,$amount,$conn){
        $sql = "select balance from user where id = '$id'";
        $r = $conn->query($sql);
        $row = mysqli_fetch_assoc($r);
        $new = $row['balance'] - $amount;
        $s = "update user set balance = '$new' where id = '$id'";
        $rr = $conn->query($s);
        if($rr){
            return true;
        }
        else{
            return false;
        }
    }

    //user deposit 
    function Deposit($id,$amount,$conn){
        $row = GetUserWithId($id,$conn);
        $sql = "insert into transaction(user_id,date,amount,type,status) values('$id',now(),'$amount','Deposit','1')";
        $r = $conn->query($sql);
        $amount += $row['balance'];
        $s = "update user set balance = '$amount' where id = '$id'";
        $rr = $conn->query($s);
        if($r && $rr){
            return true;
        }
        else{
            return false;
        }
    }
    //user withdraw
    function Withdraw($id,$amount,$conn){
        $row = GetUserWithId($id,$conn);
        $sql = "insert into transaction(user_id,date,amount,type,status) values('$id',now(),'$amount','Withdraw','0')";
        $r = $conn->query($sql);
        $amount = $row['balance'] - $amount;
        $s = "update user set balance = '$amount' where id = '$id'";
        $rr = $conn->query($s);
        if($r && $rr){
            return true;
        }
        else{
            return false;
        }
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
        if(mysqli_num_rows($r) > 0){
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