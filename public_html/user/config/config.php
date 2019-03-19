<?php
class DataBase
{
    private static $instance = null;
    private function __construct(){}

    public static function getInstance(){
        if(self::$instance==null){
            $host = 'localhost';
            $db = 'myhealth_aurora';
            $user = 'myhealth_aurora';
            $pass = 'whaterisalife';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $db = new PDO($dsn, $user, $pass);
            $db->query("SET NAMES utf8");
            self::$instance = $db;
        }
        return self::$instance;
    }
    public static function createTables(){
        $db = self::getInstance();
        $users = "CREATE TABLE IF NOT EXISTS users_aurora(
         id int(11) AUTO_INCREMENT primary key,
         active boolean,
         name varchar (50),
         last_name varchar (50),
         email varchar (50),
         phone varchar (20),
         password varchar (255),
         date int(11),
         active_hex varchar (255),
         salt varchar (8))";

        $courses = "CREATE TABLE IF NOT EXISTS user_courses_aurora(
        id int(11) AUTO_INCREMENT primary key,
        user_id int(11),
        course_id int(11),
        status boolean )";

        $liqpay = "CREATE TABLE IF NOT EXISTS liqpay_aurora(
        id int(11) AUTO_INCREMENT primary key,
        version int(11),
        public_key varchar (255),
        private_key varchar (255),
        action varchar (255))";


        $transactions = "CREATE TABLE IF NOT EXISTS transactions_aurora(
        id_transaction int(11) AUTO_INCREMENT primary key,
        id_user int(11),
        id_course int (11),
        currency varchar (255),
        status varchar (255),
        start_time varchar (255),
        end_time varchar (255))";

        $currencies = "CREATE TABLE IF NOT EXISTS currencies_aurora(
        id int(11) AUTO_INCREMENT primary key,
        id_course int(11),
        usd float,
        eur float,
        rub float,
        uah float,
        byn float,
        kzt float
        )";

        $db->exec($liqpay);
        $db->exec($transactions);
        $db->exec($currencies);
        $db->exec($users);
        $db->exec($courses);
    }
}