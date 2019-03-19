<?php
require('account/handler.php');
require('account/form/form_handler.php');
require('account/courses/courses_handler.php');
$request = explode('?', $_SERVER['REQUEST_URI']);
$uri = $request[0];
switch ($uri) {
    case '/':
        $header = 'Мои данные';
        break;
    case '/form/':
        $header = 'Форма';
        break;
    case '/payment/':
        $header = 'Оплата курсов';
        break;
    case '/courses/':
        $header = 'Список курсов';
        break;
    default:
        $header = '';
}
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет | <? echo $header ?></title>
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="/account/index_style.css">
    <link type="text/css" rel="stylesheet" href="/account/form/form_style.css">
    <link type="text/css" rel="stylesheet" href="/account/courses/courses_style.css">
    <link type="text/css" rel="stylesheet" href="/account/user/user_style.css">
    <link type="text/css" rel="stylesheet" href="/account/payment/payment_style.css">
    <link type="text/css" rel="stylesheet" href="/css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
<div id="wrap">

    <div id="headerBlock">

        <div class="btn-group humburger">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/img/humburger.png" width="30" height="30">
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/form/">Форма</a>
                <a class="dropdown-item" href="/payment/">Оплата курсов</a>
                <a class="dropdown-item" href="/courses/">Список курсов</a>
                <a class="dropdown-item" href="/">Мои данные</a>
            </div>
        </div>

        <h2 align="center">  <? echo $header ?></h2>
        <a id="exit" href="/?exit=true">
            <span>Выход</span>
            <img src="/account/img/exit.png" width="35" href="35">
        </a>
    </div>

    <div id="mainContent">
        <div id="leftBar">

            <ul id="menu">
                <li><a href="/form/"><img src="/account/img/form.png" width="25" height="25"> Форма</a></li>
                <li><a href="/payment/"><img src="/account/img/money.png" width="25" height="25"> Оплата курсов</a></li>
                <li><a href="/courses/"><img src="/account/img/courses.png" width="25" height="25"> Список курсов</a></li>
                <li><a href="/"><img src="/account/img/account.png" width="25" height="25"> Мои данные</a></li>
                <li>
                    <?php
                       $courseArray = getUserCourses();
                       if(count($courseArray)<2){
                           $course_data = getCourseData($courseArray[0]['course_id'])
                           ?>
                           <a href="<?php echo 'http://'.explode('.',$_SERVER['HTTP_HOST'],2)[1].'/'.$course_data['name'] ?>" target="_blank">
                               <img src="/account/img/about.png" width="25" height="25">
                               О курсе</a>

                           <?
                       } else{
                    ?>

                    <div class="btn-group" style="width: 100%;">
                        <a class="dropdown-toggle" style="padding: 5px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/account/img/about.png" width="25" height="25">
                            О кусе
                        </a>
                        <div class="dropdown-menu">
                            <?
                            foreach (getUserCourses() as $course){
                            $course_data = getCourseData($course['course_id'])
                            ?>
                            <a  class="dropdown-item" href="<?php echo 'http://'.explode('.',$_SERVER['HTTP_HOST'],2)[1].'/'.$course_data['name'] ?>" target="_blank"><? echo $course_data['main_text'] ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?
                       }
                       ?>
                </li>
            </ul>
        </div>

        <div id="rightBar">
            <span id="globalMassage"></span>
            <?php
            switch ($uri) {
                case '/':
                    include('user/user.php');
                    break;
                case '/form/':
                    include('form/form.php');
                    break;
                case '/payment/':
                    include('payment/payment.php');
                    break;
                case '/courses/':
                    include('courses/courses.php');
                    break;
                default:
                    $array = explode('/',$uri);
                    if(!empty(checkPage($array[1]))){
                        include('user/user.php');
                    }else include('404.html');
            }
            ?>
        </div>
    </div>
</div>
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