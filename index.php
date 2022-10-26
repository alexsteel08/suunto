<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header(); ?>

    <main class="main">
        <section class="news">
            <div class="container">
                <div class="news__heading">
                    <h2>Новости компании</h2>
                </div>
                <div class="flex news__flex">
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $loop = new WP_Query( array(
                            'post_type' => 'post',

                            'paged'          => $paged )
                    );
                    if ( $loop->have_posts() ): ?>


                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <?php get_template_part( 'template-parts/postitem' );?>

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); endif; ?>
                </div>
                <div class="pagination">
                    <?php pagination_bar( $loop ); ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>