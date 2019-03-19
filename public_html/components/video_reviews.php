<div id="carouselExampleIndicators2" class="carousel slide carousel-fade" data-ride="false">
    <div class="carousel-inner-reviews flex_video_block">
        <?php
        $i = 0;
        foreach (getReviews($page['id_page']) as $review) {
            ?>
            <div class="carousel-item <?php if ($i == 0) echo ' active' ?>">
                <iframe class="d-block w-100 flex_iframe" src="<?php echo $review['link'] ?>"></iframe>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <ol class="reviewIndicators" class="carousel-indicators">
        <?php
        $i = 0;
        foreach (getReviews($page['id_page']) as $review) {
            ?>
            <li style="background:url('<?php echo 'http://mini.s-shot.ru/?'.$review['link'] ?>');background-size: cover;"
                data-target='#carouselExampleIndicators2' data-slide-to='<?php echo $i ?>'
                class='<?php if ($i == 0) echo 'active' ?>'>
            </li>
            <?php
            $i++;
        }
        ?>
    </ol>
</div>