<footer class="footer">
    <div class="container">
        <div class="flex footer__flex">
            <div class="col footer__col">
                <div class="logo-block">
                    <?php if( get_field('footer_logo','option') ): ?>
                        <div class="logo">
                            <a href="">
                                <img src="<?php the_field('footer_logo','option'); ?>" alt="logo">
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('footer_text','option') ): ?>
                       <p><?php the_field('footer_text','option'); ?></p>
                    <?php endif; ?>
                    <?php if( have_rows('social_link','option') ): ?>
                        <ul class="social">
                            <?php while( have_rows('social_link','option') ): the_row();  $image = get_sub_field('logo'); ?>
                                <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><img class="svg-image" src="<?php echo $image; ?>" alt="socila icon"></a></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col footer__col">
                <?php if( get_field('col2title','option') ): ?>
                    <h3><?php the_field('col2title','option'); ?></h3>
                <?php endif; ?>
                <?php if( have_rows('col2links','option') ): ?>
                    <ul class="menu">
                        <?php while( have_rows('col2links','option') ): the_row();?>
                            <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col footer__col">
                <?php if( get_field('col3title','option') ): ?>
                    <h3><?php the_field('col3title','option'); ?></h3>
                <?php endif; ?>
                <?php if( have_rows('col3links','option') ): ?>
                    <ul class="menu">
                        <?php while( have_rows('col3links','option') ): the_row();?>
                            <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col footer__col">
                <div class="contact-block">
                    <?php if( get_field('col4title','option') ): ?>
                        <h3><?php the_field('col4title','option'); ?></h3>
                    <?php endif; ?>
                    <?php if( have_rows('footer_phones', 'option') ): ?>
                        <ul class="phone-list">
                            <?php while( have_rows('footer_phones', 'option') ): the_row();  $footer_phones = get_sub_field('phone'); ?>
                                <li><a href="tel:<?php if ($footer_phones) { echo preg_replace('/[^0-9]/', '', $footer_phones); } ?>"><?php echo $footer_phones; ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if( get_field('button_contact_form_text','option') ): ?>
                        <a class="btn btn-v3" href=""><?php the_field('button_contact_form_text','option'); ?></a>
                    <?php endif; ?>
                    <?php if( get_field('footer_address','option') ): ?>
                        <div class="address"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/address-marker.svg" alt=""> <?php the_field('footer_address','option'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <?php if( have_rows('additisional_links','option') ): ?>
                <ul class="menu">
                    <?php while( have_rows('col3links','option') ): the_row(); $link = get_sub_field('foote_bottom_link');?>
                        <?php

                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <div class="develop">
                <span>Розроблено в</span>
                <a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/webkitchen.png" alt=""></a>
            </div>
        </div>
    </div>
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
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
