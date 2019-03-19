<?php
session_start();
header('Content-Type: text/html; charset=UTF8');
include('../../config/config.php');
$db = DataBase::getInstance();
function getUserInfo(){
    global $db;
    $email = $_SESSION['email'];

    $sql = "SELECT * 
				FROM users_aurora
				WHERE email = '$email'
				AND active = 1";

    return $db->query($sql)->fetch(PDO::FETCH_LAZY);
}

if(isset($_POST['getCurrency'])){
    $currency = strtolower($_POST['currency']);
    $id_page = $_POST['id_page'];
    $amount = $db->query("SELECT * FROM currencies_aurora WHERE id_course = $id_page")->fetch(PDO::FETCH_LAZY);
    echo $amount[$currency];
}

if(isset($_POST['getData'])){
    //id страницы
    $id_page = $_POST['id_page'];
    //определим валюту
    $currency = $_POST['currency'];
    $price = $_POST['price'];

    //данные курса
    $page = $db->query("SELECT * FROM pages_aurora WHERE id_page = $id_page")->fetch(PDO::FETCH_LAZY);
    //вытащим данные сервиса
    $liqpay = $db->query("SELECT * FROM liqpay_aurora")->fetch(PDO::FETCH_LAZY);

    $user = getUserInfo();
    $id_user = $user['id'];
    $start_time = time();
    $transaction = $db->exec("INSERT INTO transactions_aurora(id_user,id_course,currency,status,start_time)
                      VALUES($id_user,$id_page,'$currency','pending','$start_time')");
    $order_id = $db->lastInsertId();

    $dataArray = array(
        "public_key" => $liqpay['public_key'],
        "version" => $liqpay['version'],
        "action" => $liqpay['action'],
        "amount" => $price,
        "currency" => $currency,
        "description" =>$page['main_text'],
        "order_id" => $order_id+50,
        "result_url" =>"http://user.alphabet-of-health.com/payment/?pay=".$page['name'],
        "server_url" =>"http://user.alphabet-of-health.com/api/liqpay.php",
        "sender_first_name"=>$user['name'],
        "sender_last_name"=> $user['last_name'],
        /*"sandbox"=>'1'*/);
    $data = base64_encode(json_encode($dataArray,JSON_UNESCAPED_UNICODE));
    $private_key = $liqpay['private_key'];
    $signature = base64_encode(sha1($private_key.$data.$private_key,1));
    $result = array("data" => $data,
                    "signature" => $signature);
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}

