<script src="/account/js/user_script.js"></script>
<?php $user = getUserData() ?>

<div class="contentBlock">
    <div class="userSettings">
        <h6>Имя</h6>
    <div class="flex_row">
       <div>
           <input class="name_left" id="input_name" type="text" name="name" value="<? echo $user['name'] ?>" size="15">
       </div>

        <div>
            <input  class="name_right" id="input_last_name" type="text" name="last_name" value="<? echo $user['last_name'] ?>" size="15">
        </div>

        <button id="btn_edit_name" onclick="editName()">редактировать</button>
        <button id="btn_save_name" onclick="saveName(<? echo $user['id'] ?>)">сохранить</button>
    </div>
        <hr>

        <h6>Email</h6>
    <div class="flex_row">
        <div>
            <input id="input_email" type="text" name="user_email" value="<? echo $user['email'] ?>" size="35">
        </div>
        <button id="btn_edit_email" onclick="editEmail()">редактировать</button>
        <button id="btn_save_email" onclick="saveEmail(<? echo $user['id'] ?>)">сохранить</button>
    </div>
        <hr>

        <h6>Телефон</h6>
    <div class="flex_row">
        <div>
            <input id="input_phone" type="text" name="user_phone" value="<? echo $user['phone'] ?>" size="35">
        </div>
        <button id="btn_edit_phone" onclick="editPhone()">редактировать</button>
        <button id="btn_save_phone" onclick="savePhone(<? echo $user['id']?>)">сохранить</button>
    </div>

        <hr>

        <h6>Пароль</h6>
    <div class="flex_col">
        <div class="pass_tem">
            <input  id="input_old_password"  type="password" name="user_old_password" placeholder="старый пароль" size="35">
        </div>

        <div class="pass_tem">
         <input id="input_new_password" type="password" name="user_new_password"  placeholder="новый пароль" size="35">
        </div>

        <div class="pass_tem">
            <input id="input_confirm_password" type="password" name="user_confirm_password"  placeholder="повторите пароль"size="35">
        </div>

        <button id="btn_save_password" onclick="savePassword(<? echo $user['id']?>)">сохранить</button>
    </div>
    </div>
</div>
<script>startPage()</script>
