<?php
session_start();
require('../../config/config.php');
$db = DataBase::getInstance();

if(isset($_POST['editName'])){
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $id = $_POST['id'];
    if($db->exec("UPDATE users_aurora SET name ='$name', last_name='$last_name' WHERE id = $id")){
        echo 1;
    }
    else echo 0;
}

if(isset($_POST['editEmail'])){
    $email = $_POST['email'];
    $id = $_POST['id'];
    if($db->exec("UPDATE users_aurora SET email = '$email' WHERE id = $id")){
        echo 1;
        $_SESSION['email'] = $email;
    }else echo 0;
}

if(isset($_POST['editPhone'])){
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    if($db->exec("UPDATE users_aurora SET phone ='$phone' WHERE id = $id")){
        echo 1;
    }
    else 0;
}


if(isset($_POST['editPassword'])){
    $oldPass = $_POST['old_pass'];
    $newPass = $_POST['new_pass'];
    $id = $_POST['id'];
    $userData =  $db->query("SELECT * FROM users_aurora WHERE id = $id")->fetch(PDO::FETCH_LAZY);
    $oldHash = md5(md5($oldPass).$userData['salt']);
    $newHash = md5(md5($newPass).$userData['salt']);
    if($userData['password'] == $oldHash){
        if($db->exec("UPDATE users_aurora SET password ='$newHash' WHERE id = $id")){
            echo 1;
        }
        else echo 0;
    } else echo 2;

}