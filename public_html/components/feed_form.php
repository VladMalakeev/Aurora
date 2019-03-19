<div id="contacts" class="color_1">
    <h2 class="caption">Обратная связь</h2>
    <div id="contactsBlock">
        <h3 style="font-size: 20px" align="center">Напишите нам, что бы узнать программу школы или задать вопрос</h3>
        <div class="form_wrap">
            <img src="/img/email.png" height="200" width="200">
            <form action="" method="post" class="container">
                <input type="text" name="userName" class="textbox" placeholder="Введите ваше имя" required
                       maxlength="50">
                <input type="email" name="email" class="textbox" placeholder="Ваши контакты: viber, telegram, email" required
                       maxlength="50">
                <textarea rows="5" name="message" class="message" placeholder="Задайте нам свой вопрос" cols="50"
                          required maxlength="1000"></textarea>
                <input type="hidden" name="token" id="form_token">
                <input type="submit"
                       name="submit"
                       class="button"
                       value="Отправить"
                       onclick="ga('send', 'event', 'form', 'submit')">
            </form>
        </div>
    </div>
</div>