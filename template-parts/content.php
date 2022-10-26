<?php if( have_rows('content') ): ?>
    <?php while( have_rows('content') ): the_row(); ?>

        <?php if( get_row_layout() == 'baner' ): ?>
            <?php get_template_part( 'template-parts/blocks/baner' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'about_us' ): ?>
            <?php get_template_part( 'template-parts/blocks/about_us' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'text' ): ?>
            <?php get_template_part( 'template-parts/blocks/text' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'products' ): ?>
            <?php get_template_part( 'template-parts/blocks/products' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'news' ): ?>
            <?php get_template_part( 'template-parts/blocks/news' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'recently_viewed_products' ): ?>
            <?php get_template_part( 'template-parts/blocks/recently_viewed_product' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'title_text' ): ?>
            <?php get_template_part( 'template-parts/blocks/title_text' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'contacts' ): ?>
            <?php get_template_part( 'template-parts/blocks/contacts' );?>
        <?php endif; ?>

        <?php if( get_row_layout() == 'maps' ): ?>
            <?php get_template_part( 'template-parts/blocks/maps' );?>
        <?php endif; ?>



    <?php endwhile; ?>
<?php endif; ?>