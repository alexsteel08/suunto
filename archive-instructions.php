<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_header(); ?>


    <main class="main">
        <section class="instructions">
            <div class="container">
                <div class="instructions__heading">
                    <h1><?php _e('Instructions, updates, software','suunto'); ?></h1>
                </div>
                <div class="instructions__tabs tabs">
                    <ul class="tabs-nav">
                        <li><a href="#tab-1"><?php _e('Watches','suunto'); ?></a></li>
                        <li><a href="#tab-2"><?php _e('Compass','suunto'); ?></a></li>
                        <li><a href="#tab-3"><?php _e('Accessories','suunto'); ?></a></li>
                    </ul>
                </div>

                <div class="tabs-stage">
                    <div id="tab-1" class="flex instructions__flex">
                        <div class="instructions__content">
                            <p>Выберите часы и воспользуйтесь доступными обновениями ПО и инструкциями</p>
                        </div>



                        <?php
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $loop = new WP_Query( array(
                                'post_type'=>'instructions',
                                'cat'=>'49',
                                'posts_per_page'=>'2',
                                'paged'          => $paged )
                        );
                        if ( $loop->have_posts() ):
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <?php get_template_part( 'template-parts/posttab' );?>

                            <?php endwhile; ?>

                            <div class="pagination instructions__pagination">
                                <?php pagination_bar( $loop ); ?>
                            </div>
                            <?php wp_reset_postdata();
                        endif; ?>

                    </div>
                    <div id="tab-2" class="flex instructions__flex">
                        <?php
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $loop = new WP_Query( array(
                                'post_type'=>'instructions',
                                'cat'=>'50',
                                'posts_per_page'=>'2',
                                'paged'          => $paged )
                        );
                        if ( $loop->have_posts() ):
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <?php get_template_part( 'template-parts/posttab' );?>

                            <?php endwhile; ?>

                            <div class="pagination instructions__pagination">
                                <?php pagination_bar( $loop ); ?>
                            </div>
                            <?php wp_reset_postdata();
                        endif; ?>
                    </div>
                    <div id="tab-3" class="flex instructions__flex">
                        <?php
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $loop = new WP_Query( array(
                                'post_type'=>'instructions',
                                'cat'=>'51',
                                'posts_per_page'=>'2',
                                'paged'          => $paged )
                        );
                        if ( $loop->have_posts() ):
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <?php get_template_part( 'template-parts/posttab' );?>

                            <?php endwhile; ?>

                            <div class="pagination instructions__pagination">
                                <?php pagination_bar( $loop ); ?>
                            </div>
                            <?php wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>

<?php get_footer(); ?>