<section class="character">
    <div class="container">
        <?php if (get_field('character_title')): ?>
            <div class="character__heading">
                <h2><span><?php the_field('character_title'); ?></span></h2>
            </div>
        <?php endif; ?>

        <div class="flex character__flex">
            <?php if( get_field('characteristics_image') ): ?>
                <div class="col character__col">
                    <div class="image character__image object-fit">
                        <img src="<?php the_field('characteristics_image'); ?>" alt="characteristics image">
                    </div>
                </div>
            <?php endif; ?>

            <div class="col character__col">
                <?php echo do_shortcode('[product_additional_information]');?>
            </div>
        </div>
    </div>
</section>