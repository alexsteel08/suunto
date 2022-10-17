<section class="specification">
    <div class="container">
        <?php if (get_field('specification_name')): ?>
            <div class="specification__heading">
                <h2><span><?php the_field('specification_name'); ?></span></h2>
            </div>
        <?php endif; ?>
        <?php if (have_rows('specification_container')): ?>
            <?php while (have_rows('specification_container')): the_row(); ?>
                <?php if (get_sub_field('sc_title')): ?>
                    <h3><?php the_sub_field('sc_title'); ?></h3>
                <?php endif; ?>
                <div class="acc-container">
                    <?php if (have_rows('specification_content')): ?>
                        <?php while (have_rows('specification_content')): the_row(); ?>
                            <div class="acc-item">
                                <button class="acc-button">
                                    <?php the_sub_field('scon_title'); ?>
                                    <div class="acc-icon"><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/acc-plus.svg" alt=""></div>
                                </button>
                                <div class="acc-content">
                                    <?php if (have_rows('specification_values')): ?>
                                        <?php while (have_rows('specification_values')): the_row(); ?>
                                            <div class="acc-block">
                                                <span><?php the_sub_field('name'); ?></span>
                                                <p><?php the_sub_field('value'); ?></p>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

