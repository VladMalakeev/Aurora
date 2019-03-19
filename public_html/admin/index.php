<?php
session_start();
//общие настройки
header('Content-Type: text/html; charset=UTF8');

//отображения ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

//Определяем переменную для переключателя
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

$err = array();

//Устанавливаем ключ защиты
define('KEY', true);

//соединение с бд
require('config/config.php');
require('config/functions.php');
$db = DataBase::getInstance();
DataBase::createTables();

if($user === false){
    include 'auth/auth.php';
    include 'auth/auth_form.php';
}
else if($user === true) {
    //Выход из авторизации
    if(isset($_GET['exit']) == true){
        //Уничтожаем сессию
        session_destroy();

        //Делаем редирект
        header('Location:/');
        exit;
    }
    // файл личного кабинетa
    include('account/index.php');
}