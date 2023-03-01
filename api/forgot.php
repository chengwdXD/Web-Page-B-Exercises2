<?php
include_once "./base.php";

$user=$User->find(['email'=>$_POST['email']]);
if(empty($user)){
    echo "查無資料";
}else{
echo "你的密碼是".$user['pw'];
}
?>