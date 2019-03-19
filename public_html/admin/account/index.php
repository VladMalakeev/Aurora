<?php
require('clients/clients_handler.php');
require('pages/pages_handler.php');
require('pages/settings/settings_handler.php');
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/style/bootstrap.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="/account/style_account.css">
    <link type="text/css" rel="stylesheet" href="/account/pages/style_pages.css">
    <link type="text/css" rel="stylesheet" href="/account/pages/settings/style_settings.css">
    <link type="text/css" rel="stylesheet" href="/account/pages/form/style_form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<div id="wrap">
    <div id="leftBar">
        <ul id="menu">
            <li><a href="/pages">Страници</a></li>
            <li><a href="/clients">Клиенты</a></li>
            <li><a href="/admins">Администраторы</a></li>
            <li><a href="/index.php?exit=true">Выход</a></li>
        </ul>
    </div>

    <div id="rightBar">
        <?php
        $uri = $_SERVER['REQUEST_URI'];
         if(preg_match('~^/pages/settings/~', $uri)){
            $uri = '/pages/settings/';
         }
         if(preg_match('~^/pages/form/~', $uri)){
             $uri = '/pages/form/';
         }

        switch ($uri){
            case '/': include('hello.php'); break;
            case '/admins/': include('account/admins/admins.php'); break;
            case '/clients/': include('account/clients/clients.php'); break;
            case '/pages/': include('account/pages/pages.php'); break;
            case '/pages/settings/': include('account/pages/settings/settings.php'); break;
            case '/pages/form/': include('account/pages/form/form.php'); break;
            default: include('404.html');
        }
        ?>
    </div>
</div>

<script src="/js/script.js"></script>

<script src="/js/popper.js"></script>
</body>

</html>