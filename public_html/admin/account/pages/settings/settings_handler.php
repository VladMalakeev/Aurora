<?php

function getSettings($name){
    global  $db;
   return $db->query("SELECT * FROM pages_aurora WHERE name = '$name'")->fetch(PDO::FETCH_LAZY);
}

function getCards($id){
    global  $db;
   return $db->query("SELECT * FROM cards_aurora WHERE page_id = $id ORDER BY id_card DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getTextReviews($id){
    global  $db;
    return $db->query("SELECT * FROM text_reviews_aurora WHERE page_id = $id ORDER BY id_review DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getLinks($id){
    global  $db;
    return $db->query("SELECT * FROM comments_aurora WHERE page_id = $id ORDER BY id_comment DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getCuratorLinks($id){
    global  $db;
    return $db->query("SELECT * FROM curators_aurora WHERE page_id = $id ORDER BY id_curator DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getCost($page_id){
    global  $db;
    return $db->query("SELECT * FROM currencies_aurora WHERE id_course = '$page_id'")->fetch(PDO::FETCH_LAZY);
}

function getHeader($name){
    global  $db;
    return $db->query("SELECT main_text FROM pages_aurora WHERE name = '$name'")->fetch(PDO::FETCH_LAZY);
}

if(isset($_POST['saveCost'])){
    $page_id = $_POST['page_id'];
    $name = $_POST['page_name'];
    $uah = $_POST['uah'];
    $eur = $_POST['eur'];
    $usd = $_POST['usd'];
    $rub = $_POST['rub'];
    $byn = $_POST['byn'];
    $kzt = $_POST['kzt'];
    $db->exec("UPDATE currencies_aurora SET uah = $uah, eur = $eur, usd = $usd, rub = $rub, byn = $byn, kzt = $kzt
    WHERE id_course = $page_id");
    header("Location:/pages/settings/$name/#settings_header");
}

if(isset($_POST['saveHeader'])){
    $name = $_POST['page_name'];
    $text = $_POST['courseHeader'];
    $db->exec("UPDATE pages_aurora SET main_text = '$text' WHERE name = '$name'");
    header("Location:/pages/settings/$name/#settings_header");
}


if(isset($_POST['save_settings'])){
    $name = $_POST['page_name'];
//    $main_text = $_POST['main_text'];
    $main_description = $_POST['main_description'];
    $host =  $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/';
    $path = 'pages/'.$name.'/';
    if(!is_dir($path)) {
        if (!mkdir($path, 0777)) {
            echo 'Не удалось создать директорию пользователя';
        }
    }
$element = 'main_block';
    if($_POST['hidden_'.$element]==''){
        //динамически назовем переменную
        $tmp = 'photo_'.$element;
        //запишем в нее название картинки
        $$tmp = $host.$path.$_FILES['photo_'.$element]['name'];

        //если была загружена картинка
        if( $_FILES['photo_'.$element]['size']>0) {
            //переместим ее в папку на сервере
            $destination_dir = $path . '/' . $_FILES['photo_'.$element]['name'];
            if (!move_uploaded_file($_FILES['photo_'.$element]['tmp_name'], $destination_dir)) {
                echo 'Не удалось переместить фото в директорию';
            }
        }
    }
    else {
        //если в бд была ранее картинка и пользователь не поменял ее, то просто перезапиге название
        $tmp = 'photo_' . $element;
        $$tmp = $_POST['hidden_' . $element];
    }

        $db->exec("UPDATE pages_aurora SET 
                                                    main_description = '$main_description',
                                                    main_photo = '$photo_main_block' WHERE name = '$name'");
    header("Location:/pages/settings/$name/#main_block");
}

if(isset($_POST['addCard'])){
    $id = $_POST['id_page'];
    $name = $_POST['page_name'];
    $db->exec("INSERT INTO cards_aurora(page_id) VALUE($id)");
    header("Location:/pages/settings/$name/#about");
}

if(isset($_POST['addTextReview'])){
    $id = $_POST['id_page'];
    $name = $_POST['page_name'];
    $db->exec("INSERT INTO text_reviews_aurora(page_id) VALUE($id)");
    header("Location:/pages/settings/$name/#text-reviews");
}

if(isset($_POST['saveCard'])){
    $id = $_POST['card_id'];
    $name = $_POST['page_name'];
    $description = $_POST['card_description'];
    $host =  $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/';
    $path = 'pages/'.$name.'/';
    if(!is_dir($path)) {
        if (!mkdir($path, 0777)) {
            echo 'Не удалось создать директорию пользователя';
        }
    }
    $element = $_POST['hidden_card_photo'];
    $photos = $_FILES['card_photo'];
    for($i=0;$i<count($id);$i++){

        if($element[$i]==''){
            //запишем в нее название картинки
            $photo = $host.$path.$photos['name'][$i];
            //если была загружена картинка
            if( $photos['size'][$i]>0) {
                //переместим ее в папку на сервере
                $destination_dir = $path . '/' . $photos['name'][$i];
                if (!move_uploaded_file($photos['tmp_name'][$i], $destination_dir)) {
                    echo 'Не удалось переместить фото в директорию';
                }
            }
        }
        else {
            //если в бд была ранее картинка и пользователь не поменял ее, то просто перезапиге название
            $photo = $element[$i];
        }
        $db->exec("UPDATE cards_aurora SET  description = '$description[$i]',
                                                    photo = '$photo'
                                                    WHERE id_card = $id[$i]");
    }
    header("Location:/pages/settings/$name/#about");
}

if(isset($_POST['saveTextReviews'])){
    $id = $_POST['review_id'];
    $name = $_POST['page_name'];
    $header = $_POST['reviewHeader'];
    $link = $_POST['link'];
    $description = $_POST['reviewText'];
    $host =  $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/';
    $path = 'pages/'.$name.'/review/';
    if(!is_dir($path)) {
        if (!mkdir($path, 0777)) {
            echo 'Не удалось создать директорию пользователя';
        }
    }
    $element = $_POST['textReviewPhotoHidden'];
    $photos = $_FILES['autorsPhoto'];
    for($i=0;$i<count($id);$i++){

        if($element[$i]==''){
            //запишем в нее название картинки
            $photo = $host.$path.$photos['name'][$i];
            //если была загружена картинка
            if( $photos['size'][$i]>0) {
                //переместим ее в папку на сервере
                $destination_dir = $path . '/' . $photos['name'][$i];
                if (!move_uploaded_file($photos['tmp_name'][$i], $destination_dir)) {
                    echo 'Не удалось переместить фото в директорию';
                }
            }else $photo = '';
        }
        else {
            //если в бд была ранее картинка и пользователь не поменял ее, то просто перезапиге название
            $photo = $element[$i];
        }
        $db->exec("UPDATE text_reviews_aurora SET  description = '$description[$i]',
                                                    photo = '$photo',
                                                    header = '$header[$i]',
                                                    link = '$link[$i]'
                                                    WHERE id_review = $id[$i]");
    }
    header("Location:/pages/settings/$name/#text-reviews");
}

if(isset($_POST['delete_card'])){
    include('../../../config/config.php');
    $db = DataBase::getInstance();
    $id_card = $_POST['id_card'];
    $db->exec("DELETE FROM cards_aurora WHERE id_card = '$id_card'");
}

if(isset($_POST['delete_text_review'])){
    include('../../../config/config.php');
    $db = DataBase::getInstance();
    $id_review = $_POST['id_review'];
    $db->exec("DELETE FROM text_reviews_aurora WHERE id_review = '$id_review'");
}


if(isset($_POST['submitLink'])){
    $link = $_POST['youtubeLink'];
    $id = $_POST['id_page'];
    $name = $_POST['page_name'];
    $db->exec("INSERT INTO comments_aurora(link, page_id) VALUES('$link',$id)");
    header("Location:/pages/settings/$name/#reviews");
}

if(isset($_POST['submitCuratorLink'])){
    $link = $_POST['curatorLink'];
    $id = $_POST['id_page'];
    $name = $_POST['page_name'];
    $db->exec("INSERT INTO curators_aurora(link, page_id) VALUES('$link',$id)");
    header("Location:/pages/settings/$name/#curators");
}

if(isset($_POST['deleteComment'])){
    $id = $_POST['id_comment'];
    $name = $_POST['page_name'];
    $db->exec("DELETE FROM comments_aurora WHERE id_comment = $id");
    header("Location:/pages/settings/$name/#reviews");
}

if(isset($_POST['deleteCurators'])){
    $id = $_POST['id_curator'];
    $name = $_POST['page_name'];
    $db->exec("DELETE FROM curators_aurora WHERE id_curator = $id");
    header("Location:/pages/settings/$name/#curators");
}
