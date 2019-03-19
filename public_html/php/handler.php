<?php

function getPage($uri){
    $db = DataBase::getInstance();
    $page = null;
    if($uri == '/'){
        $page = $db->query("SELECT * FROM pages_aurora WHERE main = 1")->fetch(PDO::FETCH_LAZY);
    }
    else {
        $array = explode('/', $uri);
        $name = $array[1];
        $page = $db->query("SELECT * FROM pages_aurora WHERE name = '$name'")->fetch(PDO::FETCH_LAZY);
    }
    return $page;
}

function getSlides($id){
    $db = DataBase::getInstance();
    return $db->query("SELECT * FROM cards_aurora WHERE page_id = $id ORDER BY id_card DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getReviews($id){
    $db = DataBase::getInstance();
    return $db->query("SELECT * FROM comments_aurora WHERE page_id = $id ORDER BY id_comment DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getCurators($id){
    $db = DataBase::getInstance();
    return $db->query("SELECT * FROM curators_aurora WHERE page_id = $id ORDER BY id_curator DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function getTextReviews($id){
    $db = DataBase::getInstance();
    return $db->query("SELECT * FROM text_reviews_aurora WHERE page_id = $id ORDER BY id_review DESC")->fetchAll(PDO::FETCH_ASSOC);
}

