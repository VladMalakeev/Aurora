<div id="float_links">
    <a href="<?php echo 'http://'.'user.'.$_SERVER['SERVER_NAME'].'/'.$page['name'] ?>"
       id="reg_link"
       onclick="ga('send', 'event', 'button', 'signup')">Регистрация</a>
    <a href="<?php echo 'http://'.'user.'.$_SERVER['SERVER_NAME'].'/'.$page['name'].'/?mode=auth' ?>"
       id="auth_link"
       onclick="ga('send', 'event', 'button', 'signin')">Войти</a>
</div>