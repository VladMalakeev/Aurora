<?php
if (!defined('KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../../../404.html'));
}
$name = explode('/', $_SERVER['REQUEST_URI'])[3];
?>
<script src="/account/pages/form/form_script.js"></script>
<div  class="contentBlock" id="topBlock">
    <a class="back" href="/pages/"><img src="/img/back.png" width="25" height="25">назад</a>
    <h5 align="center">Настройка формы <?php echo $name ?></h5>
</div>

<div class="contentBlock" id="formBlock">
    <form>
        <table id="form">
            <tr>

                <th id="long">Вопрос</th>
                <th>Текст</th>
                <th>Файл</th>
                <th>Обязательное</th>
                <th>Действие</th>
            </tr>
        </table>
        <script>viewQuestions('<?php echo $name ?>')</script>
    </form>

    <div class="btnFloatBlock">
        <button class="button_save" onclick="createField('<?php echo $name ?>')">Добавить поле</button>
        <button class="button_delete" id="btnClear" onclick="clearForm('<?php echo $name ?>')">Очистить все</button>
    </div>
    <button class="button_save" id="btnSave" onclick="saveForm('<?php echo $name ?>')">Сохранить</button>
</div>
