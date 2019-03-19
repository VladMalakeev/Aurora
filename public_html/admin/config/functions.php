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