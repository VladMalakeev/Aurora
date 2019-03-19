<?php
function getUsers(){
    $db = DataBase::getInstance();
    return $db->query("SELECT * FROM users_aurora")->fetchAll(PDO::FETCH_ASSOC);
}
function getUserCourses($id){
    $db = DataBase::getInstance();
    return $db->query("SELECT * FROM user_courses_aurora WHERE user_id = $id")->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($_POST['get_user_forms'])){
    $formsJson = array();
    $user_id = $_POST['user_id'];
    //получаем все курсы пользователя
    $courses = getUserCourses($user_id);
    //пробегаемся по всем курсам
    $resultJson = array();
    foreach ($courses as $course){
        //вытаскиваем id курса
       $course_id = $course['course_id'];
       //по id курса вытащим его название
       $page = $db->query("SELECT name FROM pages_aurora WHERE id_pages = $course_id")->fetch();
        // сгенерируем название таблиц
       $question_form = 'form'.$page['name'];
       $answer_form = 'user_form'.$page['name'];
       // вытащим все вопросы курса по id
       $questionsArray = $db->query("SELECT * FROM '$question_form'")->fetchAll(PDO::FETCH_ASSOC);
        // получим массив ответов
       $answerArray = $db->query("SELECT * FROM '$answer_form' WHERE user_id = $user_id")->fetch(PDO::FETCH_LAZY);
       $courseArray = array();
       //генерируем json для данного курса
       foreach($questionsArray as $question){
           $subArray = array();
           $subArray['question'] = [$question['question']];
           $subArray['answer'] = $answerArray['question_'.$question['id_form']];
           $courseArray += $subArray;
       }
       $resultJson += $courseArray;
    }
    echo json_encode($resultJson);
}