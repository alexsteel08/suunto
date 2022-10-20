<?php
$featured_posts = get_sub_field('news');
if( $featured_posts ): ?>
<section class="news news-home">
    <div class="container">
        <?php if( get_sub_field('label') ): ?>
            <div class="news__subheading">
                <h3><?php the_sub_field('label'); ?></h3>
            </div>
        <?php endif; ?>
        <?php if( get_sub_field('title') ): ?>
            <div class="news__heading">
                <h2><?php the_sub_field('title'); ?></h2>
            </div>
        <?php endif; ?>

        <div class="slider-container">
            <div class="swiper-button-prev news__prev">
                <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-prev.svg" alt="">
            </div>
            <div class="swiper-button-next news__next">
                <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-next.svg" alt="">
            </div>
            <div class="swiper-container news__swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach( $featured_posts as $featured_post ):
                        $permalink = get_permalink( $featured_post->ID );
                        $title = get_the_title( $featured_post->ID );
                        $custom_field = get_field( 'field_name', $featured_post->ID );
                        $featured_img_url = get_the_post_thumbnail_url($featured_post->ID);
                        $postdate = get_the_date('M d, Y', $featured_post->ID);
                        ?>


                        <div class="swiper-slide">
                            <a href="<?php echo esc_url( $permalink ); ?>" class="news__block">
                                <div class="image news__image object-fit">
                                    <img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $title ); ?>">
                                </div>

                                <div class="news__desc">
                                    <p><?php echo esc_html( $title ); ?></p>
                                    <div class="news__date"><?php echo $postdate; ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>


                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination news__pagination"></div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>