<script src="/account/js/form_script.js"></script>
<?php
if(isset($_GET['view'])){
    $page_name = $_GET['view'];
    $page = checkPage($page_name);
    if(empty($page)){
        exit(include('404.html'));
    }
    else if(empty(checkCourses($page['id_page']))){
        header('Location:/courses/?view='.$page_name);
    }
}else{
    $page = getCourseData(getUserCourses()[0]['course_id']);
}
?>
<ul class="courses_link">
    <li>Вы подписаны на:</li>
    <?php
    foreach (getUserCourses() as $course){
        $course_data = getCourseData($course['course_id'])
        ?>
        <li><a href="<?php echo '/form/?view='.$course_data['name'] ?>"><?php echo $course_data['main_text'] ?></a></li>
        <?php
    }
    ?>
</ul>

<div id="userForm" >
    <form id="form" class="contentBlock" action="" method="post" enctype="multipart/form-data">
        <h3 id="fullData"><?php echo getFullData() ?></h3>
        <div id="tableBlock">
            <table>
                <?php
                $user_form = getUserFormData($page['name']);
                $db_form = getFormData($page['name']);
                $structure = getFormStructure($page['name']);
                for($i = 0;$i<count($db_form);$i++) {
                    ?>
                    <tr>
                        <td>
                            <p class="question"><?php echo $db_form[$i]['question'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <?php if($db_form[$i]['question_type'] == 'text'){ ?>
                                <textarea
                                       class="textLine"
                                       name="<?php echo $structure[$i+2]['Field'] ?>"
                                       onblur="changeInput(this)"
                                       maxlength="150"
                                       rows="5"
                                        <?php if($db_form[$i]['filled']==1)echo 'required' ?>
                                ><?php echo $user_form[$structure[$i+2]['Field']] ?></textarea>
                            <?php }
                            else if($db_form[$i]['question_type'] == 'file'){
                                ?>
                                <div class="photo" id="<?php echo 'photoBlock_'.$structure[$i+2]['Field'] ?>"></div>
                            <input type="hidden"
                                   name="<?php echo 'hidden_'.$structure[$i+2]['Field'] ?>"
                                   value="<?php echo $user_form[$structure[$i+2]['Field']] ?>"
                                   id="<?php echo 'hidden_photo_'.$structure[$i+2]['Field'] ?>"
                            >
                            <input name="<?php echo $structure[$i+2]['Field'] ?>"
                                   id="<?php echo 'photo_'.$structure[$i+2]['Field'] ?>"
                                   class="fileBtn"
                                   type="file"
                                   onchange="showFile(this,'<?php echo $structure[$i+2]['Field'] ?>')"
                                   <?php if($db_form[$i]['filled']==1)echo 'required' ?>
                            >
                            <input type="button" id="<?php echo 'delete_'.$structure[$i+2]['Field'] ?>" onclick="clearPhoto('<?php echo $structure[$i+2]['Field'] ?>')" value="удалить">
                                <script>loadPhoto('<?php echo $structure[$i+2]['Field'] ?>', '<?php echo '/account/photo/' . getFullData() . '/'?>', '<?php echo $user_form[$structure[$i+2]['Field']] ?>')</script>
                            <?php
                            }
                            ?>
                            <hr>
                        </td>

                    </tr>

                    <?php
                }
                ?>
            </table>
            <input type="hidden" name="page_name" value="<?php echo $page['name'] ?>">
            <div class="fixed_button">
                <input id="save" type="button" onclick="validateForm()" value="Сохранить">
            </div>
            </div>

    </form>

</div>

