<form class="form" action="" method="post">

    <table>
        <tr>
            <td><label>Имя</label></td>
            <td><input type="text" name="name" placeholder="Ваше имя" value="<?php if(isset($_COOKIE['name'])) echo $_COOKIE['name'] ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label>Фамилия</label></td>
            <td><input type="text" name="last_name" placeholder="Ваша фамилия" value="<?php if(isset($_COOKIE['last_name'])) echo $_COOKIE['last_name'] ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label>email</label></td>
            <td><input type="email" name="email" placeholder=" Ваш email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'] ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label>Мобильный телефон</label></td>
            <td><input type="tel" name="phone" id="phone" value="<?php if(isset($_COOKIE['phone'])) echo $_COOKIE['phone'] ?>"></td>
        </tr>

        <tr>
            <td><label>Пароль</label></td>
            <td><input type="password" name="password" placeholder="Придумайте пароль" maxlength="32"></td>
        </tr>

        <tr>
            <td><label>Повторите пароль</label></td>
            <td><input type="password" name="confirm_password" placeholder="Подтвердите пароль" maxlength="32"></td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 15px;text-align: center">
                <input id="checkRules" type="checkbox" onchange="activeButton(this)">
                <span style="font-size: 16px;" >   я согласен с условиями оферты</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="hidden" name="send_reg_data">
                <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
                <input id="regBtn" disabled="true" type="button" onclick="checkForm(this.form)" value="зарегистрироваться">
            </td>
        </tr>

    </table>
</form>