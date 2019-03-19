<?php
function getOneCourse($course_name){
  global $db;
   return $db->query("SELECT * FROM pages_aurora WHERE name = '$course_name'")->fetch(PDO::FETCH_LAZY);
}

function getCourseList(){
    global $db;
    return $db->query("SELECT * FROM pages_aurora ")->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($_POST['subscribe'])){
    $course_id = $_POST['course_id'];
    $user_id = getUserData()['id'];
    $db->exec("INSERT INTO user_courses_aurora(user_id, course_id,status) VALUES($user_id,$course_id,0)");
    header('Refresh:0');
}