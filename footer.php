<footer class="footer">
    <div class="container">
        <div class="flex footer__flex">
            <div class="col footer__col">
                <div class="logo-block">
                    <div class="logo">
                        <a href="">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer-logo.svg" alt="">
                        </a>
                    </div>
                    <p>Мы - официальные диллеры спортивных часов и аксессуаров в Украине.</p>
                    <ul class="social">
                        <li><a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/f-facebook.svg" alt=""></a></li>
                        <li><a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/f-twitter.svg" alt=""></a></li>
                        <li><a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/f-instagram.svg" alt=""></a></li>
                        <li><a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/f-youtube.svg" alt=""></a></li>
                        <li><a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/f-pinterest.svg" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="col footer__col">
                <h3>Меню</h3>
                <ul class="menu">
                    <li><a href="">Главная</a></li>
                    <li><a href="">Продукция</a></li>
                    <li><a href="">Доставка и оплата</a></li>
                    <li><a href="">Поддержка</a></li>
                </ul>
            </div>
            <div class="col footer__col">
                <h3>Продукция</h3>
                <ul class="menu">
                    <li><a href="">Спортивные часы</a></li>
                    <li><a href="">Аксессуар</a></li>
                    <li><a href="">Компасы</a></li>
                    <li><a href="">Акции и распродажа</a></li>
                </ul>
            </div>
            <div class="col footer__col">
                <div class="contact-block">
                    <h3>Контакти</h3>
                    <ul class="phone-list">
                        <li><a href="tel:+38(095) 536-76-40">+38(095) 536-76-40</a></li>
                        <li><a href="tel:+38(044) 425-11-65">+38(044) 425-11-65</a></li>
                    </ul>
                    <a class="btn btn-v3" href="">Оставить заявку</a>
                    <div class="address"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/address-marker.svg" alt=""> г. Киев, ул. Константиновская 21</div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <ul class="menu">
                <li><a href="">Политика конфиденциальности</a></li>
                <li><a href="">Правила использования сайтом</a></li>
            </ul>
            <div class="develop">
                <span>Розроблено в</span>
                <a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/webkitchen.png" alt=""></a>
            </div>
        </div>
    </div>
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!---->
<!--<script>-->
<!--    $(function () {-->
<!--        $("#slider-range").slider({-->
<!--            range: true,-->
<!--            min: 5000,-->
<!--            max: 18560,-->
<!--            step: 50,-->
<!--            values: [5000, 18560],-->
<!--            slide: function (event, ui) {-->
<!--                $(".min-range").val(ui.values[0]);-->
<!--                $(".max-range").val(ui.values[1]);-->
<!--            }-->
<!--        });-->
<!--        $(".min-range").val($("#slider-range").slider("values", 0));-->
<!--        $(".max-range").val($("#slider-range").slider("values", 1));-->
<!--    });-->
<!--</script>-->
<?php wp_footer(); ?>
</div>
</body>
</html>
