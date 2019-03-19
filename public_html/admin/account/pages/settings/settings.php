<?php
if (!defined('KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../../../404.html'));
}

$page = getSettings(explode('/', $_SERVER['REQUEST_URI'])[3]);
if (!empty($page)) {
    ?>
    <script src="/account/pages/settings/settings_script.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <div id="settings_header" class="contentBlock">
        <a class="back" href="/pages/"><img src="/img/back.png" width="25" height="25">назад</a>
        <h5 align="center">Настройка страницы <?php echo $page['name'] ?></h5>
    </div>

    <div id="courseCost" class="contentBlock" style="text-align: center;">
        <form action="" method="post">
            <h5>Стоимость курса</h5>
            <? $cost = getCost($page['id_page']) ?>
            <input class="field_sample" size="5" type="text" name="uah" value="<?php echo $cost['uah'] ?>"
                   placeholder="UAH" pattern="[0-9]{1,10}">
            <input class="field_sample" size="5" type="text" name="usd" value="<?php echo $cost['usd'] ?>"
                   placeholder="USD" pattern="[0-9]{1,10}">
            <input class="field_sample" size="5" type="text" name="eur" value="<?php echo $cost['eur'] ?>"
                   placeholder="EUR" pattern="[0-9]{1,10}">
            <input class="field_sample" size="5" type="text" name="rub" value="<?php echo $cost['rub'] ?>"
                   placeholder="RUB" pattern="[0-9]{1,10}">
            <input class="field_sample" size="5" type="text" name="byn" value="<?php echo $cost['byn'] ?>"
                   placeholder="BYN" pattern="[0-9]{1,10}">
            <input class="field_sample" size="5" type="text" name="kzt" value="<?php echo $cost['kzt'] ?>"
                   placeholder="KZT" pattern="[0-9]{1,10}">

            <input type="hidden" name="page_id" value="<?php echo $page['id_page'] ?>">
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <input class="button_add" type="submit" name="saveCost" value="Сохранить">
        </form>
    </div>

    <div id="courseHeader" class="contentBlock" style="text-align: center;">
        <form action="" method="post">
            <h5>Название курса</h5>
            <input class="field_youtube"
                   size="70"
                   type="text"
                   name="courseHeader"
                   value="<?php echo getHeader($page['name'])['main_text'] ?>"
                   placeholder="Курс - очишение организма"
            >
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <input class="button_add" type="submit" name="saveHeader" value="Сохранить">
        </form>
    </div>

    <form class="contentBlock" action="" method="post" enctype="multipart/form-data" name="main">
        <h5 align="center">Основной блок</h5>
        <div id="main_block">
            <div id="main_description">
                    <textarea name="main_description" id="editor1" rows="20"
                              cols="60"><?php echo $page['main_description'] ?></textarea>
                <script>
                    CKEDITOR.replace('editor1');
                    document.getElementById('cke_1_contents').style.height = '100%';
                </script>
            </div>
        </div>
        <div id="main_photo">
            <input type="hidden" id="hidden_main_block" name="hidden_main_block"
                   value="<?php echo $page['main_photo'] ?>">
            <input class="button_file" type="file" name="photo_main_block"
                   onchange="showPhoto(this,'main_block','hidden_main_block')">
        </div>
        <script>loadPhoto('main_block', '<?php echo $page["main_photo"] ?>')</script>
        <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
        <input class="button_save" type="submit" name="save_settings" value="Сохранить">
    </form>

    <div id="about" name="info" class="contentBlock">
        <h5 align="center">Информация о курсах</h5>
        <form method="post" action="">
            <input type="hidden" name="id_page" value="<?php echo $page['id_page'] ?>">
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <input align="center" class="button_save" type="submit" name="addCard" value="+Добавить новый блок">
        </form>

        <form method="post" action="" enctype="multipart/form-data">
            <?php
            foreach (getCards($page['id_page']) as $card) {
                ?>
                <div class="cardWrap">
                    <div class="card" id="<?php echo 'card' . $card['id_card'] ?>">
                        <div class="cardDescription">
                            <textarea id="<?php echo 'description' . $card['id_card'] ?>" name="card_description[]"
                                      cols="10" rows="5"><?php echo $card['description'] ?></textarea>
                        </div>
                        <script>
                            CKEDITOR.replace('<?php echo 'description' . $card['id_card'] ?>');
                        </script>
                    </div>

                    <div class="cardPhoto">
                        <input type="hidden" id="<?php echo 'hidden' . $card['id_card'] ?>" name="hidden_card_photo[]"
                               value="<?php echo $card['photo'] ?>">
                        <input class="button_file" type="file" name="card_photo[]"
                               onchange="showPhoto(this,'<?php echo 'card' . $card['id_card'] ?>','<?php echo 'hidden' . $card['id_card'] ?>')">
                    </div>
                    <script>loadPhoto('<?php echo 'card' . $card['id_card'] ?>', '<?php echo $card["photo"] ?>')</script>
                    <input type="hidden" name="card_id[]" value="<?php echo $card['id_card'] ?>">
                    <input class="button_delete" type="button" name="delete_card"
                           onclick="deleteCard(<?php echo $card['id_card'] ?>)" value="Удалить блок">
                </div>
                <?php
            }
            ?>
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <?php if (count(getCards($page['id_page'])) > 0) { ?>
                <input class="button_save" type="submit" name="saveCard" value="сохранить">
                <?php
            }
            ?>
        </form>
    </div>

    <div class="contentBlock">
        <h5 id="text-reviews" align="center">Текстовые отзывы</h5>
        <form method="post" action="">
            <input type="hidden" name="id_page" value="<?php echo $page['id_page'] ?>">
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <input align="center" class="button_save" type="submit" name="addTextReview" value="+Добавить новый отзыв">
        </form>

        <form method="post" action="" enctype="multipart/form-data">
        <?php
            foreach (getTextReviews($page['id_page']) as $review) {
            ?>
                <div class="single_review">
                    <div class="review_photo">
                        <img id="img_<? echo $review['id_review'] ?>" src="<? echo $review['photo']=='' ? '/img/empty.png' : $review['photo'] ?>">
                        <input type="file" name="autorsPhoto[]" onchange="showPhotoTextReview(this,<? echo $review['id_review']?>)">
                        <input id="hidden_<? echo $review['id_review'] ?>" type="hidden" name="textReviewPhotoHidden[]" value="<? echo $review['photo'] ?>">
                    </div>
                    <div class="review_text">
                        <input type="text" name="reviewHeader[]" value="<? echo $review['header'] ?>" placeholder="Имя автора, возраст">
                        <textarea name="reviewText[]" cols="15" rows="5" placeholder="Текст комментария"><? echo $review['description'] ?></textarea>
                        <input type="text" name="link[]" placeholder="Ссылка на автора" value="<? echo $review['link']?>">
                        <input type="hidden" name="review_id[]" value="<?php echo $review['id_review'] ?>">
                        <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
                    </div>
                </div>
                <div align="center">
                    <input class="button_delete" type="button" name="delete_text_review"
                           onclick="deleteTextReview(<?php echo $review['id_review'] ?>)" value="Удалить отзыв">
                </div>
                <?php
        }
        ?>
            <input type="submit" name="saveTextReviews" value="Сохранить">
        </form>
    </div>

    <div class="contentBlock">
        <h5 id="reviews" align="center">Видео отзывы</h5>
        <form id="form_video" action="" method="post">
            <input class="field_youtube" type="text" name="youtubeLink" placeholder="Вставьте ссылку на видео"
                   size="50">
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <input type="hidden" name="id_page" value="<?php echo $page['id_page'] ?>">
            <input class="button_add" type="submit" name="submitLink" value="Добавить">
        </form>

        <ul id="video" class="row">
            <?php
            $i = 0;
            foreach (getLinks($page['id_page']) as $link) {
                ?>
                <li class="col-sm">
                    <iframe src="<?php echo $link['link'] ?>" width="360" height="215"></iframe>
                    <form action="" method="post">
                        <input type="hidden" name="id_comment" value="<?php echo $link['id_comment'] ?>">
                        <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
                        <input class="button_delete" type="submit" value="Удалить видео" name="deleteComment">
                    </form>
                </li>
                <?php
                $i++;
            }
            if ($i % 2 != 0) {
                echo ' <li class="col-sm"></li>';
            }
            ?>
        </ul>
    </div>


    <div class="contentBlock"">
    <h5 id="curators" align="center">Истории кураторов</h5>
    <form id="form_video" action="" method="post">
        <input class="field_youtube" type="text" name="curatorLink" placeholder="Вставьте ссылку на видео" size="50">
        <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
        <input type="hidden" name="id_page" value="<?php echo $page['id_page'] ?>">
        <input class="button_add" type="submit" name="submitCuratorLink" value="Добавить">
    </form>

    <ul id="video" class="row">
        <?php
        $i = 0;
        foreach (getCuratorLinks($page['id_page']) as $link) {
            ?>
            <li class="col-sm">
                <iframe src="<?php echo $link['link'] ?>" width="360" height="215"></iframe>
                <form action="" method="post">
                    <input type="hidden" name="id_curator" value="<?php echo $link['id_curator'] ?>">
                    <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
                    <input class="button_delete" type="submit" value="Удалить видео" name="deleteCurators">
                </form>
            </li>
            <?php
            $i++;
        }
        if ($i % 2 != 0) {
            echo ' <li class="col-sm"></li>';
        }
        ?>
    </ul>
    </div>

    <?php
} else include('404.html');
?>


