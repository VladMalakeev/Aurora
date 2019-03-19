<?php

function getUserFormData($name){
    $db = DataBase::getInstance();
    $id = getUserData()['id'];
    $table = 'user_form_'.$name;
    $sql = "SELECT * FROM $table WHERE `user_id` = $id";
    return $db->query($sql)->fetch(PDO::FETCH_LAZY);
}

function getFormStructure($name){
    $db = DataBase::getInstance();
    $table = 'user_form_'.$name;
    return $db->query("DESCRIBE $table")->fetchAll(PDO::FETCH_ASSOC);
}


function getFormData($name){
    $db = DataBase::getInstance();
    $table = 'form_'.$name;
    return $db->query("SELECT * FROM $table ")->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($_POST['submitForm'])){
    $user_id = getUserData()['id'];
    $page_name = $_POST['page_name'];
    $user_form = ' user_form_'.$page_name.' ';
    //вытащим все строки из бд admin form
    $formData = getFormData($page_name);
    $image = [];
    $text =[];
    //создадим массив с названиями полей значения которых нужно вытащить
    foreach ($formData as $variable){
        if($variable['question_type'] == 'file'){
            $image[] = 'question_'.$variable['id_form'];
        }else if($variable['question_type'] == 'text'){
            $text[] = 'question_'.$variable['id_form'];
        }
    }
    //создадим директорию в которыю будем сохранять фото
    $path = 'account/photo/'.getFullData();
    if(!is_dir($path)) {
        if (!mkdir($path, 0777)) {
            $err[] = 'Не удалось создать директорию пользователя';
        }
    }

    foreach ($image as $element) {
        //если в бд ранее не было картинки
        if($_POST['hidden_'.$element]==''){
            //динамически назовем переменную
            $tmp = $element;
            //запишем в нее название картинки
            $$tmp = $_FILES[$element]['name'];

            //если была загружена картинка
            if( $_FILES[$element]['size']>0) {
                //переместим ее в папку на сервере
                $destination_dir = $path . '/' . $_FILES[$element]['name'];
                if (!move_uploaded_file($_FILES[$element]['tmp_name'], $destination_dir)) {
                    $err[] = 'Не удалось переместить фото в директорию';
                }
            }
        }
        else{
            //если в бд была ранее картинка и пользователь не поменял ее, то просто перезапиге название
            $tmp = $element;
            $$tmp = $_POST['hidden_'.$element];
        }
    }

    foreach ($text as $value){
        $$value = $_POST[$value];
    }
    if(count($err)>0){
        var_dump($err);
    }
    else{
        $checkQuery = "SELECT * FROM $user_form WHERE user_id = $user_id";
        $count = $db->query($checkQuery)->fetch(PDO::FETCH_LAZY);
        $tableString =  '';
        $tableVariable = '';
        $tableUpdate = '';
        for($i=0;$i<count($formData);$i++){
            $tableString .= ',question_'.$formData[$i]['id_form'];
            $var = 'question_'.$formData[$i]['id_form'];
            $tableVariable .= ',\''.$$var.'\'';
            $tableUpdate .= 'question_'.$formData[$i]['id_form'].' = '.'\''.$$var.'\'';
            if($i+1!=count($formData)){
                $tableUpdate.=',';
            }
        }

        if($count == false) {
            $sqlInsert = "INSERT INTO $user_form(`user_id` $tableString) 
            VALUES ($user_id $tableVariable)";
            if ($db->exec($sqlInsert)) {
               // echo '<div class="success">Данные сохранены</div>';
            } //else echo '<div class="errorData">Ошибка записи данных</div>';
        }
        else{
            $sqlUpdate = "UPDATE $user_form SET  $tableUpdate  WHERE user_id = $user_id";
            if ($db->exec($sqlUpdate)) {
               // echo '<div class="successData">Данные успешно отредактированы</div>';
            } //else echo '<div class="errorData">Данные небыли изменены</div>';
        }
       // header('Refresh:0');
    }
}

if(isset($_POST['getPhoto'])){
    $name = $_POST['getPhoto'];
    $result=getUserData();
    echo $result[$name];
}