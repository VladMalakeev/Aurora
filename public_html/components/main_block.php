<div name="mainBlock" id="mainBlock">
    <div id="mainText">
        <h1><?php echo $page['main_description'] ?></h1>
    </div>
    <div id="blockBtn">
        <a href="<?php echo 'http://'.'user.'.$_SERVER['SERVER_NAME'].'/'.$page['name'] ?>"
           id="subscribeBtn"
           onclick="ga('send', 'event', 'button', 'booking')">Забронировать место</a>
    </div>
    <div id="main_image" style="background: url('<?php echo $page['main_photo']; ?>');background-size: 120%"></div>
</div>