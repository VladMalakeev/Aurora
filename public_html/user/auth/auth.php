<?php
//Выводим сообщение об удачной регистрации
if(isset($_GET['status']) and $_GET['status'] == 'ok')
    echo '<h2 class="success">'.MESSAGE_CONFIRM_EMAIL.'</h2>';
//Производим активацию аккаунта
if(isset($_GET['key']))
{
    //Проверяем ключ
    $sql = 'SELECT * 
			FROM users_aurora
			WHERE `active_hex` = :key';
    //Подготавливаем PDO выражение для SQL запроса
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':key', $_GET['key'], PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) == 0)
        $err[] = ERROR_KEY;
    //Проверяем наличие ошибок и выводим пользователю
    if(count($err) > 0)
        echo showErrorMessage($err);
    else if($rows[0]['active'] == 1){
        echo '<h2 class="success">'.MESSAGE_EMAIL_ACTIVATED.'</h2>';
    }
    else
    {
        //Получаем адрес пользователя
        $email = $rows[0]['email'];
        //Активируем аккаунт пользователя
        $sql = 'UPDATE users_aurora
				SET `active` = 1
				WHERE `email` = :email';
        //Подготавливаем PDO выражение для SQL запроса
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        if($stmt->execute()){
            sendMessageMail($email, MAIL_AUTOR, EMAIL_TITLE_SUCCESS, EMAIL_MESSAGE_SUCCESS);
            echo '<h2 class="success">'.MESSAGE_EMAIL_CONFIRMED.'</h2>';
        }
        else{
            $err[] = 'Ошибка активации';
            echo showErrorMessage($err);
        }
    }
}
 /**
  * Обработчик формы авторизации
  * Авторизация пользователя
  */
//Если нажата кнопка то обрабатываем данные
 if(isset($_POST['login_btn']))
 {
     $email=$_POST['email'];
     $password = $_POST['password'];
     /*Создаем запрос на выборку из базы
     данных для проверки подлиности пользователя*/
     $sql = 'SELECT * 
				FROM users_aurora
				WHERE `email` = :email
				AND `active` = 1';
     //Подготавливаем PDO выражение для SQL запроса
     $stmt = $db->prepare($sql);
     $stmt->bindValue(':email', $email, PDO::PARAM_STR);
     $stmt->execute();

     //Получаем данные SQL запроса
     $rows = $stmt->fetch(PDO::FETCH_LAZY);

     //Если логин совподает, проверяем пароль
     if(!empty($rows))
     {
         //Получаем данные из таблицы
         if(md5(md5($password).$rows['salt']) == $rows['password'])
         {
             $_SESSION['email'] = $email;
             $_SESSION['user'] = true;

             $page_name = $page['name'];
             $user_id = $rows['id'];
             $page_id = $db->query("SELECT id_page FROM pages_aurora WHERE name = '$page_name'")->fetch(PDO::FETCH_LAZY)['id_page'];
             $isActive = $db->query("SELECT * FROM user_courses_aurora WHERE user_id = $user_id AND course_id = $page_id")->fetch(PDO::FETCH_LAZY);
             if(empty($isActive)){
                 header('Location:/courses/?view='.$page_name);
             }else {
                 header('Location:/');
             }
             exit;
         }
         else
             $err[] = ERROR_AUTH;
             echo showErrorMessage($err);
     }else{
         $err[] = ERROR_AUTH;
         echo showErrorMessage($err);
     }
 }