<?php
if(isset($_POST['submit'])){
    $user = $_POST['userName'];
    $from = $_POST['email'];
    $text = $_POST['message'];
    $subject = "Письмо от пользователя с сайта Азбука здоровья";
    $to = 'myhealth.courses@gmail.com';
    $response = $_POST['token'];
    $secret = "6Lfgw5QUAAAAAO9PeUkh0H5A4MEhLxqcVLDyucaY";

    $subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
    $message = "Имя: $user <br> email: $from <br>$text";
        $account ="mail@alphabet-of-health.com";
    //Формируем заголовки для почтового сервера
    $headers  = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $headers .= "From: ". $account ."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";
    //Отправляем данные на ящик админа сайта
    // if submitted check response

    if( $curl = curl_init() ) {
        curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "secret=$secret&response=$response");
        $out = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($out);
        if ($response != null && $response->success) {
            if (!mail($to, $subject, $message, $headers)) {
                echo "<script> mailResponse('Ошибка отправки письма!','red')</script>";
                header('Location:/#contacts');
            } else
            {
                echo "<script> mailResponse('Ваше письмо успешно отправлено!','green')</script>";
                header('Location:/#contacts');
            }
        }
        else {
            echo "<script> mailResponse('Вы не прошли проверку каптчи','red')</script>";
            header('Location:/#contacts');
        }
    }
    echo "<script> mailResponse('Ошибка при отправке запроса на recaptcha!','red')</script>";
}

