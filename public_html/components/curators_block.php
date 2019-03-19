<h1  class="caption" align="center">Истории кураторов</h1>
<div id="carouselExampleIndicators3" class="carousel slide carousel-fade" data-ride="false">
    <div class="carousel-inner-reviews flex_video_block">
        <?php
        $i = 0;
        foreach (getCurators($page['id_page']) as $curator) {
            ?>
            <div class="carousel-item <?php if ($i == 0) echo ' active' ?>">
                <iframe class="d-block w-100 flex_iframe" src="<?php echo $curator['link'] ?>"></iframe>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <ol class="reviewIndicators" class="carousel-indicators">
        <?php
        $i = 0;
        foreach (getCurators($page['id_page']) as $curator) {
            ?>
            <li style="background:url('<?php echo 'http://mini.s-shot.ru/?'.$curator['link'] ?>');background-size: cover;"
                data-target='#carouselExampleIndicators3' data-slide-to='<?php echo $i ?>'
                class='<?php if ($i == 0) echo 'active' ?>'>
            </li>
            <?php
            $i++;
        }
        ?>
    </ol>
</div>