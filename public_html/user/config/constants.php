<?php
define('HOST',$_SERVER['HTTP_HOST']);
define('MAIL_AUTOR','mail@alphabet-of-health.com');

define('MESSAGE_CONFIRM_EMAIL','Вы успешно зарегистрировались! Перейдите на вашу почту и активируйте свой аккаунт!');
define('MESSAGE_EMAIL_CONFIRMED','Ваш аккаунт успешно активирован!');
define('MESSAGE_EMAIL_ACTIVATED','Ваша учетная запись уже активирована!');
define('EMAIL_TITLE_REG','Регистрация на '.HOST);
define('EMAIL_MESSAGE_REG','Для активации Вашего акаунта пройдите по ссылке');
define('EMAIL_TITLE_SUCCESS','Ваш аккаунт на '.HOST.' успешно активирован');
define('EMAIL_MESSAGE_SUCCESS','Благодарим вас за регистрацию на сайте '.HOST.' ваша учетная запись была успешно активирована.');
define('ERROR_EMAIL','Пользователь с таким email уже зарегистрирован');
define('ERROR_KEY','Ключ активации не верен!');
define('ERROR_ADD','Ошибка при добавлении пользователя');
define('ERROR_AUTH','Неверный логин или пароль!');