<?php if (have_rows('features_items')): ?>
    <section class="features">
        <?php if (get_field('features_title')): ?>
            <div class="features__heading">
                <h2><span><?php the_field('features_title'); ?></span></h2>
            </div>
        <?php endif; ?>
        <div class="flex features__flex">
            <?php while (have_rows('features_items')): the_row();
                $image = get_sub_field('logo'); ?>

                <div class="col features__col">
                    <div class="image features__image">
                        <img src="<?php echo $image; ?>" alt="<?php the_sub_field('title'); ?>">
                    </div>
                    <div class="features__desc">
                        <h3><?php the_sub_field('title'); ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
