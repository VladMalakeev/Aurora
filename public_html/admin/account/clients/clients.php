<?php
if(!defined('KEY'))
{
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../../404.html'));
}
?>
<script src="account/clients/script_clients.js"></script>
<div id="topBlock">
    <h1 align="center">Список клиентов</h1>
</div>

<div id="user_form">

</div>

<table class="table table-hover">
    <tr>
        <th scope="col">№</th>
        <th scope="col">Пользователь</th>
        <th scope="col">Телефон</th>
        <th scope="col">Email</th>
        <th scope="col">Дата регистрации</th>
        <th scope="col">Статус</th>
        <th scope="col" >Форма</th>
    </tr>

    <?php
    foreach (getUsers() as $user){
        echo   "<tr>
                    <td>".$user['id']."</td>
                    <td>".$user['last_name']." ".$user['name']."</td>
                    <td>".$user['phone']."</td>
                    <td>".$user['email']."</td>
                    <td>".$user['date']."</td>
                    <td>нет</td>
                    <td>
                        <form>
                                <input type='hidden' name='id' value='".$user['id']."'>
                                <input type='button' value='Форма' onclick='showForm(".$user['id'].")'>
                        </form>
                     </td>
            </tr>";
    }
    ?>
</table>