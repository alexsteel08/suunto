<section class="shipping">
    <div class="container">
        <?php if( get_sub_field('title') ): ?>
            <div class="shipping__heading">
                <h1><?php the_sub_field('title'); ?></h1>
            </div>
        <?php endif; ?>
        <?php if( get_sub_field('text') ): ?>
            <div class="shipping__content">
                <?php the_sub_field('text'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>