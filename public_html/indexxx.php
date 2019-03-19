<?php
include('php/config.php');
include('php/handler.php');
$page = getPage($_SERVER['REQUEST_URI']);
$array = explode('/', $_SERVER['REQUEST_URI']);
if (!empty($page) && $array[2] == '') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Азбука здоровья | <?php echo $page['main_text'] ?></title>
        <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Alice|Neucha" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
        <link rel="stylesheet" href="/style/bootstrap.css" type="text/css">
        <link href="/style/style.css" type="text/css" rel="stylesheet">
        <link href="/style/text_review_style.css" type="text/css" rel="stylesheet">
        <link href="/style/form_style.css" type="text/css" rel="stylesheet">
        <link href="/style/flex_style.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php
        include('components/google_statistic.html');
        include('components/google_target.html');
        ?>
    </head>
    <!--  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
    <body>
    <?
    include('modals/modal_oferta.html');
    include('modals/modal_politics.html');
    include('modals/modal_otkaz.html');
    ?>

    <div id="wrap">
        <div id="mailResponse"></div>
        <a id="arrow" href="#header"><img src="/img/arrow.png" width="30" height="30"></a>

        <?php
        include('components/header.php');
        include('components/float_links.php');
        include('components/main_block.php');
        include('components/about_slider.php');
        include('components/text_reviews.php');
        include('components/video_reviews.php');
        include('components/curators_block.php');
        include('components/feed_form.php');
        include('components/footer.php');
        ?>

    </div>
    <script src="/js/script.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.js"></script>

    <?php
    include('components/recaptcha.html');
    include('php/form.php');
    ?>
    </body>
    </html>

    <?php
} else echo 'Сраница не сушесвует';
?>