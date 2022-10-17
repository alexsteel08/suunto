<section class="home-content">
    <div class="container">
        <?php if( get_sub_field('title') ): ?>
            <div class="home-content__heading">
                <h2><?php the_sub_field('title'); ?></h2>
            </div>
        <?php endif; ?>
        <?php if( get_sub_field('text') ): ?>
           <div class="home-content__desc">
              <?php the_sub_field('text'); ?>
           </div>
        <?php endif; ?>
    </div>
</section>