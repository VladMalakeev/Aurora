<div id="reviews">
    <h1  class="caption" align="center">Отзывы наших учеников</h1>
    <div id="text_reviews_block">
        <!--  single  -->
        <?php
        foreach(getTextReviews($page['id_page']) as $textReview) {
            ?>
            <div class="single_review">
                <div class="review_photo">
                    <img src="<? echo $textReview['photo']=='' ? '/img/empty.png':$textReview['photo']  ?>">
                </div>
                <div class="review_text">
                    <h2 class="review_people_name"><? echo $textReview['header'] ?></h2>
                    <p class="review_people_text"><? echo $textReview['description'] ?></p>
                    <? if($textReview['link'] != ''){ ?>
                        <p align="right">
                            <a href="<? echo $textReview['link'] ?>" target="_blank">Страница автора</a>
                        </p>
                    <? } ?>
                </div>
            </div>
            <?php
        }
        ?>
        <!--  single  -->
    </div>
</div>