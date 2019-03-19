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
        $admins = "CREATE TABLE IF NOT EXISTS admins_aurora(
         id_admin int(11) AUTO_INCREMENT primary key,
         name varchar (255),
         last_name varchar (255),
         email varchar (255),
         password varchar (255),
         role varchar (255),
         salt varchar (255))";

        $db->exec($admins);

        $pages = "CREATE TABLE IF NOT EXISTS pages_aurora(
         id_page int(11) AUTO_INCREMENT primary key,
         name varchar (255),
         main_photo varchar (255),
         main_text text,
         main_description text,
         cost float,
         main boolean)";

        $db->exec($pages);

        $carts = "CREATE TABLE IF NOT EXISTS cards_aurora(
         id_card int(11) AUTO_INCREMENT primary key,
         description text,
         photo varchar (255),
         page_id int(11))";

        $db->exec($carts);

        $comments = "CREATE TABLE IF NOT EXISTS comments_aurora(
        id_comment int(11) AUTO_INCREMENT primary key,
        link varchar (255),
        page_id int(11))";

        $db->exec($comments);
        $curators = "CREATE TABLE IF NOT EXISTS curators_aurora(
        id_curator int(11) AUTO_INCREMENT primary key,
        link varchar (255),
        page_id int(11))";
        $db->exec($curators);

        $text_review = "CREATE TABLE IF NOT EXISTS text_reviews_aurora(
        id_review int(11) AUTO_INCREMENT primary key,
        header varchar (255),
        description text,
        photo varchar (255),
        link varchar (255),
        page_id int(11))";
        $db->exec($text_review);
    }
}