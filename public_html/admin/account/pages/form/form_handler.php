<?php
require('../../../config/config.php');
$db = DataBase::getInstance();
if(isset($_POST['view_questions'])){
    $table = 'form_'.$_POST['form_name'];
    $questionsArray = $db->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($questionsArray);
}

if(isset($_POST['save_form'])){
    $table = 'form_'.$_POST['form_name'];
    $user_table = 'user_form_'.$_POST['form_name'];
    $insert = $_POST['insert'];
    $update = $_POST['update'];
    $execute = '';
    if(!empty($insert))
    foreach ($insert as $question) {
        $value = $question['value'];
        $type = $question['type'];
        $filled = $question['filled'];
        $execute .= "INSERT INTO $table(question, question_type, filled) VALUES('$value', '$type',$filled); ";
    }
    if(!empty($update))
    foreach ($update as $question) {
        $value = $question['value'];
        $id = $question['id'];
        $type = $question['type'];
        $filled = $question['filled'];
        $execute .= "UPDATE $table SET question = '$value', question_type = '$type', filled = $filled WHERE id_form = $id; ";
    }
    if($db->exec($execute)){
        echo "форма отредактирована\n";
    }
    else echo "ошибка редактирования\n";
    updateTable($table,$user_table);
}

if(isset($_POST['delete_question'])){
    $table = 'form_'.$_POST['form_name'];
    $user_table = 'user_form_'.$_POST['form_name'];
    $id = $_POST['id'];
    $delete = "DELETE FROM $table WHERE id_form = $id";
    echo $db->exec($delete)? "успешно удалено\n":"ошибка удаления\n";
    updateTable($table,$user_table);
}

if(isset($_POST['clear_form'])){
    $form = 'form_'.$_POST['form_name'];
    echo $db->exec("DELETE FROM $form")? "форма очищена\n":"ошибка очистки\n";
}

function updateTable($table,$user_table){
    global $db;
    //считывае поля с таблицы образца
    $structureArray = $db->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
   // считываем стркутуру редактируемой таблицы
    $editableArray = $db->query("DESCRIBE $user_table")->fetchAll(PDO::FETCH_ASSOC);
    //удаляем первых 2 поля
    unset($editableArray[0]);
    unset($editableArray[1]);
    $editableArray = array_values($editableArray);
    $addArray = array();
    for($i=0;$i<count($structureArray);$i++){
        //имя радактируемой колонки
        $collName = 'question_'.$structureArray[$i]['id_form'];
        echo "collName= .$collName\n";
        if(!empty($editableArray)) {
            for ($j = 0; $j < count($editableArray); $j++) {
                //если имя колонки образца и редактируемой таблицы совпадает то убераем эту колонку
                //из массива
                echo "compare = " . $editableArray[$j]['Field'] . "\n";
                if ($collName == $editableArray[$j]['Field']) {
                    echo "deleted=" . $editableArray[$j]['Field'] . "\n";
                    unset($editableArray[$j]);
                    $editableArray = array_values($editableArray);
                    continue 2;
                }
            }
        }
        //иначе добавляем имя колонки которую надо добавить в таблицу
        $addArray[] = $collName;
    }
    $deleteCount = count($editableArray);
    echo "del = $deleteCount\n";
    if($deleteCount>0){
        $execute = '';
        foreach ($editableArray as $delete){
            $column = $delete['Field'];
            $execute .= "ALTER TABLE $user_table DROP COLUMN `$column`; ";
        }
        echo $db->exec($execute)? "удалено $deleteCount столбцов\n": "ошибка удаления\n";
    }
    $addCount = count($addArray);
    echo "add = $addCount\n";
    if( $addCount >0){
        $execute = '';
        foreach ($addArray as $add){
            $execute .= "ALTER TABLE $user_table ADD COLUMN(`$add` varchar(255)); " ;
        }
        echo $db->exec($execute)? "добавлено $addCount столбцов\n": "ошибка добавления\n";
    }
}