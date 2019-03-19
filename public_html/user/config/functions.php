<?php
function sendMessageMail($to, $from, $title, $message)
{

    //Формируем заголовок письма
    $subject = $title;
    $subject = '=?utf-8?b?'. base64_encode($subject) .'?=';

    //Формируем заголовки для почтового сервера
    $headers  = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $headers .= "From: ". $from ."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";

    //Отправляем данные на ящик админа сайта
    if(!mail($to, $subject, $message, $headers))
        return 'Ошибка отправки письма!';
    else
        return true;
}

function showErrorMessage($errors){
    $data = "<ul class='errors'>";
    foreach ($errors as  $error){
        $data .= '<li>'.$error.'</li>';
    }
   $data .= "</ul>";
    return  $data;
}

function getPage($uri){
    $db = DataBase::getInstance();
    $page = null;
    if($uri=='/'){
        $page = $db->query("SELECT * FROM pages_aurora WHERE main = 1")->fetch(PDO::FETCH_LAZY);
    }
    else {
      $array =  explode('/',$uri);
      if(count($array)<4) {
          $link = $array[1];
          $page = $db->query("SELECT * FROM pages_aurora WHERE name = '$link'")->fetch(PDO::FETCH_LAZY);
      }
    }
    return $page;
}

function getCurrentCourse($course_name){
    global $db;
    return $db->query("SELECT * FROM pages_aurora WHERE name = '$course_name'")->fetch(PDO::FETCH_LAZY);
}

function getCost($id_page){
    global $db;
    return $db->query("SELECT * FROM currencies_aurora WHERE id_course = $id_page")->fetch(PDO::FETCH_LAZY);
}