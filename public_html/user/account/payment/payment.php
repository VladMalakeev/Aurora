<script src="/account/payment/payment.js"></script>
<?php
if (isset($_GET['pay'])) {
    $page_name = $_GET['pay'];
    $page = checkPage($page_name);

    if (empty($page)) {
        exit(include('404.html'));
    } else if (empty(checkCourses($page['id_page']))) {
        header('Location:/courses/?view=' . $page['name']);
    }
} else {
    $page = getCourseData(getUserCourses()[0]['course_id']);
}
?>

<ul class="courses_link">
    <li>Вы подписаны на:</li>
    <?php
    foreach (getUserCourses() as $course) {
        $course_data = getCourseData($course['course_id'])
        ?>
        <li><a href="<?php echo '/payment/?pay=' . $course_data['name'] ?>"><?php echo $course_data['main_text'] ?></a>
        </li>
        <?php
    }
    ?>
</ul>

<?php
if (checkCourses($page['id_page'])['status'] == 1) {
    ?>
    <div class="contentBlock" align="center">
    <h1>Оплата курса призведена успешно</h1>
        <img src="/account/img/pay_success.png" width="250" style="margin: 25px">
    </div>
    <?php
}
else{
    ?>
    <div class="contentBlock">
        <form id="payForm" method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8">
          <h3>Стоимость данного курса -
            <input type="text" disabled name="price" id="price" size="10"/>
            <select name="currency" id="currency" onchange="getCurrency(<?php echo $page['id_page'] ?>)">
                <option value="UAH">UAH</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="RUB">RUB</option>
<!--                <option value="BYN">BYN</option>-->
<!--                <option value="KZT">KZT</option>-->
            </select>
          </h3>
            <input type="hidden" name="data" id="data"/>
            <input type="hidden" name="signature" id="signature"/>
            <hr>
            <div id="payInfo">
                <h4>Оплата производится с помощью системы  <img src="/account/img/liqpay.png" width="100"></h4>
                <h6 align="center">Доступны следующие способы оплаты</h6>
                <table class="pay_systems">
                    <tr >
                        <td><img src="/account/img/carts.png" width="100px"></td>
                        <td><img src="/account/img/liqpay_icon.png" width="100px"></td>
                        <td><img src="/account/img/money_item.png" width="70px">
                        <td><img src="/account/img/privat.png" width="60px"></td>
                    </tr>
                    <tr>
                        <td><p>Visa/MasterCard</p></td>
                        <td><p>Liqpay</p></td>
                        <td><p>Наличными</p></td>
                        <td><p>Privat 24</p></td>
                    </tr>
                </table>
                <table class="pay_systems">
                    <tr >
                        <td><img src="/account/img/master_pass.png" width="60px"></td>
                        <td><img src="/account/img/visa_checkout.png" width="110px"></td>
                        <td><img src="/account/img/qr.png" width="60px">
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>MasterPass</p></td>
                        <td><p>Visa <Checkout></Checkout></p></td>
                        <td><p>QR-код</p></td>
                        <td></td>
                    </tr>
                </table>
                <div></div>
            </div>

            <div align="center">
                <input id="payBtn" type="button" onclick="getFormData(<?php echo $page['id_page'] ?>, this.form)" value="Оплатить"/>
            </div>
        </form>
    </div>
    <script>getCurrency(<?php echo $page['id_page'] ?>)</script>
<?php
}


