<?php
session_start([
    'cookie_lifetime' => 3600,
]);
//общие настройки
header('Content-Type: text/html; charset=UTF8');

//отображения ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

//Включаем буферизацию содержимого
ob_start();

//Определяем переменную для переключателя
$mode = isset($_GET['mode'])  ? $_GET['mode'] : false;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

$err = array();

//Устанавливаем ключ защиты
define('KEY', true);

//соединение с бд
require('config/config.php');
include('config/constants.php');
require('config/functions.php');
$db = DataBase::getInstance();
DataBase::createTables();

if($user === false){
    $uri =  explode('?', $_SERVER['REQUEST_URI'] );
    $page = getPage($uri[0]);
    if (!empty($page) ) {
        switch($mode)
        {
            //Подключаем обработчик с формой регистрации
            case 'reg':
                include 'reg/reg.php';
                include 'reg/reg_form.php';
                break;

            //Подключаем обработчик с формой авторизации
            case 'auth':
                include 'auth/auth.php';
                include 'auth/auth_form.html';
                break;
            default:
                include 'reg/reg.php';
                include 'reg/reg_form.php';
        }

        //Получаем данные с буфера
        $content = ob_get_contents();
        ob_end_clean();

    //Подключаем наш шаблон
            include 'view.php';
    } else include('404.html');
}
    else if($user === true) {
        //html файл личного кабинетa
        include('account/index.php');

        //Выход из авторизации
        if(isset($_GET['exit']) == true){
            //Уничтожаем сессию
            session_destroy();

            //Делаем редирект
            header('Location:/'.$page['name']);

            exit;
        }
    }
