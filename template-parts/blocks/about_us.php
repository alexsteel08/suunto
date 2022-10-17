<section class="about-us">
    <div class="container">
        <div class="flex about-us__flex">
            <div class="col about-us__col">
                <div class="about-us__block">
                    <div class="middle-img object-fit">
                        <?php
                        $image = get_sub_field('middle_img');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="small-img object-fit">
                        <?php
                        $image = get_sub_field('small_img');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="big-img object-fit">
                        <?php
                        $image = get_sub_field('big_img');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="about-logo">
                        <?php
                        $image = get_sub_field('logo_img');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col about-us__col">

                <div class="about-us__desc">
                    <?php if( get_sub_field('label') ): ?>
                        <h4><?php the_sub_field('label'); ?></h4>
                    <?php endif; ?>
                    <?php if( get_sub_field('title') ): ?>
                        <h2><?php the_sub_field('title'); ?></h2>
                    <?php endif; ?>
                    <?php if( get_sub_field('text') ): ?>
                          <?php the_sub_field('text'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="flex about-us__flex">
            <div class="col about-us__col">
                <div class="about-us__block">
                    <div class="big-img object-fit">
                        <?php
                        $image = get_sub_field('big_img_bottom');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="small-img object-fit">
                        <?php
                        $image = get_sub_field('small_img_bottom');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="middle-img object-fit">
                        <?php
                        $image = get_sub_field('middle_img_bottom');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col about-us__col">
                <div class="about-us__desc">
                    <?php if( get_sub_field('text_bottom') ): ?>
                        <?php the_sub_field('text_bottom'); ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>