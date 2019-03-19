<?php
//вернуть объект 1 пользователя
function getUserData(){
    global $db;
    $email = $_SESSION['email'];
    $sql = 'SELECT * 
				FROM users_aurora
				WHERE `email` = :email
				AND `active` = 1';
    //Подготавливаем PDO выражение для SQL запроса
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    //Получаем данные SQL запроса
    $rows = $stmt->fetch(PDO::FETCH_LAZY);
   return $rows;
}

//вернуть имя и фамилию
function getShortData(){
    $data = getUserData();
    return $data['name'];
}

//вернуть фио
function getFullData(){
    $data = getUserData();
    return $data['last_name']." ".$data['name'];
}

//подписан ли пользователь на курс
function checkCourses($page_id)
{
    global $db;
    $user_id = getUserData()['id'];
    return $db->query("SELECT * FROM user_courses_aurora WHERE user_id = $user_id AND course_id = $page_id")->fetch(PDO::FETCH_LAZY);
}

//проверить страницу а существование
function checkPage($page){
    global $db;
   return $db->query("SELECT * FROM pages_aurora WHERE name = '$page'")->fetch(PDO::FETCH_LAZY);
}

//список курсов пользователя
function getUserCourses(){
    global $db;
    $user_id = getUserData()['id'];
    return $db->query("SELECT * FROM user_courses_aurora WHERE user_id = $user_id")->fetchAll(PDO::FETCH_ASSOC);
}

//данные курса
function getCourseData($course_id){
    global $db;
   return $db->query("SELECT * FROM pages_aurora WHERE id_page = $course_id")->fetch(PDO::FETCH_LAZY);
}

function getCurrencies($id_page){
    $currency = 'uah';
    global $db;
    $amount = $db->query("SELECT * FROM currencies_aurora WHERE id_course = $id_page")->fetch(PDO::FETCH_LAZY);
    return $amount[$currency];
}