<?php
require('../config/config.php');
$db = DataBase::getInstance();

if(isset($_POST['data']) && isset($_POST['signature'])){
    $data = $_POST['data'];
    $signature = $_POST['signature'];

    $liqpay = $db->query("SELECT * FROM liqpay_aurora")->fetch(PDO::FETCH_LAZY);

    $private_key = $liqpay['private_key'];
    $serverSignature = base64_encode(sha1($private_key.$data.$private_key,1));

    if($serverSignature == $signature){
        $seviceData = json_decode(base64_decode($data));
        $status = $seviceData->status;
        $end_time = time();
        $id_transaction = ($seviceData->order_id);
        if($status == 'success' || $status == 'sandbox' || $status == 'wait_accept') {
            $db->exec("UPDATE transactions_aurora SET status = 'success', end_time = '$end_time' WHERE id_transaction = '$id_transaction'");
            $transaction = $db->query("SELECT * FROM transactions_aurora WHERE id_transaction = $id_transaction")->fetch(PDO::FETCH_LAZY);

            $id_course = $transaction['id_course'];
            $id_user = $transaction['id_user'];

            $db->exec("UPDATE user_courses_aurora SET status = 1 WHERE user_id = $id_user AND course_id = $id_course");

        }else if($status == 'error' || $status == 'failure'){
            $db->exec("UPDATE transactions_aurora SET status = 'error', end_time = '$end_time' WHERE id_transaction = '$id_transaction' ");
        }
    }else{
        echo 'error signature';
    }
}else echo 'empty request';
