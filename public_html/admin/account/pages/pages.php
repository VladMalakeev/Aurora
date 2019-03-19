<?php
if (!defined('KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../../404.html'));
}
?>
    <script src="/account/pages/script.js"></script>

    <div id="newPageBlock" class="blockBackground">
        <form class="pageForm" action="" method="post">
            <h3 align="center">Введите название страницы</h3>
            <div>
             <input class="inputText" type="text" name="pageName" pattern="[a-zA-Z]{1,30}" size="30" maxlength="30" required placeholder="только латинскими буквами, например: health">
            </div>
            <label>Главная страцица</label>
            <input type="checkbox" name="is_main">
            <div class="btnFloatBlock">
                <input class="button_save " type="submit" name="submitPage" value="Сохранить">
                <input class="button_delete btnClose" type="button" onclick="showNewPageWindow('none')" value="закрыть">
            </div>
        </form>
    </div>

    <div id="deleteBlock" class="blockBackground">
        <form class="pageForm" action="" method="post">
            <h3>Вы уверены что хотите удалить страницу?</h3>
            <input type="hidden" name="delete_name">
            <div class="btnFloatBlock" >
                <input class="button_save shortBtn" type="submit" name="delete_page" value="ДА">
                <input class="button_delete shortBtn" type="button" onclick="showDeleteBlock('none','')" value="НЕТ">
            </div>
        </form>
    </div>

    <div id="editBlock" class="blockBackground">
        <form class="pageForm" action="" method="post">
            <h4 align="center">Редактировать</h4>
            <input class="inputText" type="text" name="new_name" maxlength="50" placeholder="новое название" required>
          <div>
            <label>Сделать главной</label>
            <input type="checkbox" name="is_main" id="checkEdit">
          </div>
            <input type="hidden" name="edit_name">
            <div class="btnFloatBlock">
                <input class="button_save" type="submit" value="Сохранить" name="edit_page">
                <input class="button_delete" type="button" onclick="showEditBlock('none','')" value="Отмена">
            </div>
        </form>
    </div>

    <div class="contentBlock">
        <h5 align="center">Редактор страниц</h5>
    </div>

    <div class="pageBlock" id="btnAddBlock">
        <button class="button_save newBtn" onclick="showNewPageWindow('block')">Новая страница</button>
    </div>

    <?php
     foreach (getPages($db) as $page) {
    ?>
    <div class="pageBlock">
        <div id="pageButtons">
            <div>
                <a href="<?php echo 'http://'.explode('.',$_SERVER['HTTP_HOST'],2)[1].'/'.$page['name'] ?>" target="_blank">
               <h3 class="pageLink"><?php echo $page['name'] ?></h3>
           </a>
            <span id="checkMain"><?php echo $page['main']==1? '  (главная)  ' : '' ?></span>
            </div>
            <div>
                <button class="button_save pageBtn" onclick="showEditBlock('block','<?php echo $page['name'] ?>','<?php echo $page['main'] ?>')">Редактировать</button>
                <button class="button_delete pageBtn" onclick="showDeleteBlock('block','<?php echo $page['name'] ?>')">Удалить</button>
            </div>
        </div>
                <div class="options">
                    <div class="optionLeft">
                        <h4>Лендинг</h4>
                        <a href="/pages/settings/<?php echo $page['name'] ?>">Настройки</a>
                    </div>
                    
                    <div class="optionRight">
                        <h4>Форма</h4>
                        <a href="/pages/form/<?php echo $page['name'] ?>">Настройки</a>
                    </div>
                </div>
              </div>
    <?php
        }
    ?>