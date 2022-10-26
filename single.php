<?php


get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <main class="main">
        <section class="news-single">
            <div class="container">

                <div class="news-single__inner">
                    <div class="image news-single__image object-fit">
                        <img src="<?php echo the_post_thumbnail_url();?>" alt="">
                    </div>
                </div>

                <div class="news-single__heading">
                    <h1><?php the_title();?></h1>
                </div>

                <div class="news-single__content">
                    <div class="news-single__date"><?php the_date();?></div>
                    <?php the_content();?>
                </div>

            </div>
        </section>

        <section class="news other-news">
            <div class="container">
                <div class="news__heading">
                    <h2><?php _e('You may be interested','woodsoft');?></h2>
                </div>
                <div class="flex news__flex">
                    <?php
                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );
                    if( $related ) foreach( $related as $post ) {
                        setup_postdata($post); ?>

                            <?php get_template_part('template-parts/postitem');?>

                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    </main>


<?php endwhile; ?>



<?php

get_footer();