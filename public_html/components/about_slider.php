<h1 id="school" class="caption" align="center">О нашей школе</h1>
<div id="contentSchool">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol id="contentIndicator" class='carousel-indicators'>
            <?php
            $i = 0;
            foreach (getSlides($page['id_page']) as $slide) {
                ?>
                <li style="background:url('<?php echo $slide['photo'] ?>');background-size: cover;"
                    data-target='#carouselExampleIndicators' data-slide-to='<?php echo $i ?>'
                    class='<?php if ($i == 0) echo 'active' ?>'>
                </li>
                <?php
                $i++;
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach (getSlides($page['id_page']) as $slide) {
                ?>
                <div class="carousel-item <?php if ($i == 0) echo ' active' ?>">
                    <img class="d-block w-100 about_image" src="<?php echo $slide['photo'] ?>" >
                    <div class="carousel-caption">
                        <div><?php echo $slide['description'] ?></div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>
</div>