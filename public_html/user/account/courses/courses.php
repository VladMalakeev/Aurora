<?php
if(isset($_GET['view'])){
    $course_name = $_GET['view'];
    $course = getOneCourse($course_name);
    if(!empty($course)) {
        ?>
        <div class="contentBlock">
            <div class="course_description">
                <a href="<?php echo '/courses' ?>">назад</a>
                <h2 align="center"><?php echo $course['main_text'] ?></h2>
                <hr>
                <h4 align="center">Стоимость курса - <?php echo getCurrencies($course['id_page']); ?> грн</h4>
                <div class="description_text"><?php echo $course['main_description'] ?></div>
                <div id="course_img" style="background:url('<?php echo $course['main_photo'] ?>');background-size: cover"></div>
                <?php
                if(!empty(checkCourses($course['id_page']))){
                    echo '<span class="subscribe_view">Вы подписаны</span>';
                }else {
                    ?>
                    <form method="post" action="">
                        <input type="hidden" name="course_id" value="<?php echo $course['id_page'] ?>">
                        <div align="center">
                            <input class="new_subscribe" type="submit" name="subscribe" value="Подписаться">
                        </div>
                    </form>
                    <?php
                }
                    ?>
            </div>

            <div class="landing_page">
              <span>Что бы узнать подробнее перейдите на </span>
                <a href="<?php echo 'http://'.explode('.',$_SERVER['HTTP_HOST'],2)[1].'/'.$course['name'] ?>" target="_blank">страницу с описанием</a>
            <span> данного курса</span>
            </div>
        </div>
        <?php
    }else include('404.html');
}else {
    foreach (getCourseList() as $course){
        ?>
        <div class="contentBlock">
            <h3  align="center"><?php echo $course['main_text'] ?></h3>
            <div>
                <?php
                if(!empty(checkCourses($course['id_page']))){
                    echo '<span class="subscribe">Вы подписаны</span>';
                }
                ?>
            </div>
            <div class="viewCourse">
            <a href="<?php echo '?view='.$course['name']?>" >Просмотреть</a>
            </div>
            </div>
        <?php
    }
}

