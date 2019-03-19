<?php

if(isset($_POST['submitPage'])){
    $name = strtolower($_POST['pageName']);
    $formName = 'form_'.$name;
    $userForm = 'user_form_'.$name;
    $isMain = 0;
    if(isset($_POST['is_main'])){
        $db->exec("UPDATE pages_aurora SET main = 0 WHERE main = 1");
        $isMain = 1;
    }
    $result = $db->query("SELECT * FROM pages_aurora WHERE name = '$name'")->fetch(PDO::FETCH_LAZY);
    if(empty($result)) {
        $db->exec("ALTER TABLE pages_aurora AUTO_INCREMENT = 1");
        $db->exec("INSERT INTO pages_aurora(name,main) VALUES('$name',$isMain)");
        $db->exec("CREATE TABLE IF NOT EXISTS $formName(
                    id_form int(11) AUTO_INCREMENT primary key,
                     question varchar(255),
                     question_type varchar(255),
                     filled boolean)");
        $db->exec("CREATE TABLE IF NOT EXISTS $userForm(
          id_user_form int(11) AUTO_INCREMENT primary key,
          user_id int(11))");
        header('Location:/pages');
    } else echo "<div><h3>Такая страница уже существует!</h3></div>";
}

if(isset($_POST['delete_page'])){
    $name = $_POST['delete_name'];
    $formName = 'form_'.$name;
    $userForm = 'user_form'.$name;
    $db->exec("DELETE FROM pages_aurora WHERE name = '$name'");
    $db->exec("DROP TABLE $formName");
    $db->exec("DROP TABLE $userForm");
    header('Location:/pages');
}

if(isset($_POST['edit_page'])){
    $name = $_POST['edit_name'];
    $newName = $_POST['new_name'];
    $isMain = 0;
    if(isset($_POST['is_main'])){
      $db->exec("UPDATE pages_aurora SET main = 0 WHERE main = 1");
      $isMain = 1;
    }
    $db->exec("UPDATE pages_aurora SET name = '$newName', main = $isMain WHERE name = '$name'");
 }

function getPages($db){
   return $db->query("SELECT * FROM pages_aurora ORDER BY id_page DESC")->fetchAll(PDO::FETCH_ASSOC);
}