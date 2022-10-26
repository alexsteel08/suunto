<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_header(); ?>


    <main class="main">


        <section class="stock">
            <div class="container">
                <div class="stock__heading">
                    <h1><?php post_type_archive_title();?></h1>
                </div>

                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $loop = new WP_Query( array(
                        'post_type'=>'actions',
                        'paged'          => $paged )
                );
                if ( $loop->have_posts() ):
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <a href="<?php the_permalink(); ?>" class="stock__block">
                            <div class="image stock__image object-fit">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="stock__desc">
                                <h3><?php the_title(); ?></h3>
                                <div class="stock__date">МАЙ 25, 2021</div>
                                <?php if( get_field('excerpt') ): ?>
                                    <p>
                                      <?php the_field('excerpt'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </a>

                    <?php endwhile; ?>

                    <div class="pagination instructions__pagination">
                        <?php pagination_bar( $loop ); ?>
                    </div>
                    <?php wp_reset_postdata();
                endif; ?>


            </div>
        </section>


    </main>


<?php get_footer(); ?>