<?php
/**
 * Обработчик формы регистрации
 */

/*Если нажата кнопка на регистрацию,
начинаем проверку*/
if(isset($_POST['send_reg_data']))
{
    $name =  $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $page_name = $_POST['page_name'];
    $salt = substr(md5(uniqid()), -8);
    $password = md5(md5($_POST['password']).$salt);
    $cookieTime = 3600;
    $date = time();
    $active_hex = md5($salt);

    setcookie('name', $name, time()+$cookieTime);
    setcookie('last_name',$last_name, time()+$cookieTime);
    setcookie('email',$email, time()+$cookieTime);
    setcookie('phone', $_POST['phone'], time()+$cookieTime);

    /*Проверяем существует ли у нас такой пользователь в БД*/
    $sql = 'SELECT `email` 
					FROM users_aurora
					WHERE `email` = :email';
    //Подготавливаем PDO выражение для SQL запроса
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) > 0)
        $err[] = ERROR_EMAIL;

    //Проверяем наличие ошибок и выводим пользователю
    if(count($err) > 0)
        echo showErrorMessage($err);
    else
    {
        /*Если все хорошо, пишем данные в базу*/
        $db->exec("ALTER TABLE users_aurora AUTO_INCREMENT=1");
        $sql = "INSERT INTO users_aurora(active,name, last_name, email, phone, password, date, active_hex,salt)
						VALUES(0, '$name','$last_name', '$email','$phone', '$password','$date','$active_hex','$salt')";
        //Подготавливаем PDO выражение для SQL запроса
        if(!$db->exec($sql)){
            $err[] = ERROR_ADD;
            echo showErrorMessage($err);
        }else {
            //связываем пользователя с курсом
           $page_query = $db->query("SELECT id_page FROM pages_aurora WHERE name = '$page_name'");
           $page_id = $page_query->fetch(PDO::FETCH_LAZY)['id_page'];
           $user_query = $db->query("SELECT id FROM users_aurora WHERE email = '$email'");
           $user_id = $user_query->fetch(PDO::FETCH_LAZY)['id'];

          $db->exec("INSERT INTO user_courses_aurora(user_id,course_id, status) VALUES ($user_id,$page_id,0)");


            //Отправляем письмо для активации
            $uri = explode('?',$_SERVER['REQUEST_URI']);
            $url = HOST .$url[0].'?mode=auth&key='. md5($salt);
            $message = EMAIL_MESSAGE_REG .' <a href="' . $url . '">' . $url . '</a>';
            sendMessageMail($email, MAIL_AUTOR, EMAIL_TITLE_REG, $message);
            //Сбрасываем параметры
            header('Location: ?mode=auth&status=ok');
            exit;
        }
    }
}

