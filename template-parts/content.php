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




    <?php endwhile; ?>
<?php endif; ?>