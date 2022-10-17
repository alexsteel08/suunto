<?php if (have_rows('slider')): ?>
    <section class="top">
        <div class="swiper-container top-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php while (have_rows('slider')): the_row();
                    $image = get_sub_field('baner_bi');
                    $productimage = get_sub_field('baner_pi');
                    $link = get_sub_field('baner_button'); ?>
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="top-block">
                            <div class="bg-block">
                                <img src="<?php echo $image; ?>" alt="">
                            </div>
                            <div class="container">
                                <div class="flex top-block__flex">
                                    <div class="col top-block__col">
                                        <div class="top-block__heading">
                                            <?php if (get_sub_field('h1')): ?>
                                                <h1>
                                                    <?php the_sub_field('h1'); ?>
                                                </h1>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($link) :
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>

                                            <a class="btn btn-v2" href="<?php echo esc_url($link_url); ?>"
                                               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>

                                        <?php endif; ?>

                                    </div>
                                    <?php if ($productimage) :

                                        ?>

                                        <div class="col top-block__col">
                                            <div class="image top-block__image object-fit">
                                                <img src="<?php echo $productimage; ?>"
                                                     alt="">
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-button-prev top__prev">
                <img class="svg-image"
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-prev.svg" alt="">
            </div>
            <div class="swiper-button-next top__next">
                <img class="svg-image"
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-next.svg" alt="">
            </div>

        </div>
    </section>
<?php endif; ?>
