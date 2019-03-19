<?php
$course_data = getCurrentCourse($page['name']);
$current_cost = getCost($course_data['id_page']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход в аккаунт</title>
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/intlTelInput.css">
    <link type="text/css" rel="stylesheet" href="/css/demo.css">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/script.js"></script>
</head>
<body>
<?
include('components/modal_oferta.html');
include('components/modal_politics.html');
?>
<div id="wrap">
        <div id="main_info">
            <div id="adout_course">
                <h3 id="logo">Азбука здоровья</h3>
                <h1><?php echo $course_data['main_text']?></h1>
                <h2>Стоимость данного курса - <span id="cost"><?php echo $current_cost['uah'] ?></span> грн.</h2>
            </div>
            <div id="login">
                <div id="buttons">
                    <a href="?mode=reg"><div class="btn" id="leftBtn">Регистрация</div></a>
                    <a href="?mode=auth"><div class="btn" id="rightBtn">Вход</div></a>
                </div>
                <div id="login_block">
                <?php
                echo $content;
                ?>
                </div>
            </div>
        </div>
        <div id="describe_info">
        <p>
            Для того что бы записаться на курс <span style="color: #e5aa13; font-style: italic">"<?php echo $course_data['main_text']?>"</span>,
            Вам необходимо пройти <a href="?mode=reg">регистрацию</a> на данном сайте, либо <a href="?mode=auth">авторизироваться</a> если у Вас
            уже есть аккаунт. После чего Вам будет предоставлен личный кабинет пользователя,
            где вы сможете произвести оплату курса, указать всю
            необходимую информацию о себе, а так же записаться на другие наши курсы.
        </p>
            <div>
                <button class="blue_button"  data-toggle="modal" data-target="#modal_oferta">Правила оферты</button>
                <button class="blue_button" data-toggle="modal" data-target="#modal_politics">Политика конфиденциальности</button>
            </div>
        </div>

        <div id="payInfoFooter">
            <img src="../img/carts.png" width="100px">
            <img src="../img/privat.png" width="40px">
            <img src="../img/liqpay.png" width="100px">
        </div>
</div>
<script src="/js/intlTelInput.js"></script>
<script>
    $("#phone").intlTelInput({
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            jQuery.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        preferredCountries: ['ua', 'ru'],
        utilsScript: "/js/utils.js"
    });
</script>

<script src="/js/popper.js"></script>
<script src="/js/bootstrap.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134638921-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-134638921-1');
</script>

</body>
</html>