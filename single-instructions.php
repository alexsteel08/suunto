<?php


get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <main class="main">

        <section class="update">
            <div class="container">
                <div class="update__heading">
                    <h1><?php the_title();?></h1>
                </div>
                <?php if( get_field('description') ): ?>
                    <div class="update__content">
                        <h4><?php the_field('description'); ?></h4>
                   </div>
                <?php endif; ?>

<!--                <div class="search">-->
<!--                    <input type="search" placeholder="Пошук">-->
<!--                    <button><img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/images/icon/search-icon.svg" alt=""></button>-->
<!--                </div>-->
                <?php if( have_rows('instructions_steps') ): ?>
                    <div class="flex update__flex">
                        <?php while( have_rows('instructions_steps') ): the_row();  $image = get_sub_field('image'); ?>
                            <div class="col update__col">
                                <div class="update__block">
                                    <h3><?php the_sub_field('title'); ?></h3>
                                    <p><?php the_sub_field('text'); ?></p>
                                        <?php if( have_rows('buttons') ): ?>

                                                <?php while( have_rows('buttons') ): the_row();  $file = get_sub_field('file'); ?>


                                                <?php

                                                if( $file ):
                                                    $url = $file['url']; ?>
                                                    <a class="btn btn-v2" href="<?php echo esc_attr($url); ?>" title="<?php echo esc_attr($title); ?>" target="_blank">
                                                        <?php the_sub_field('button_text'); ?>
                                                    </a>

                                                <?php endif; ?>
                                                    <p><?php the_sub_field('bottom_description'); ?></p>

                                                <?php endwhile; ?>

                                        <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>

        <?php if( have_rows('user_instructions') ): ?>
                <section class="management">
                    <div class="container">
                        <?php if( get_field('user_instructions_title') ): ?>
                            <div class="management__heading">
                                <h2><?php the_field('user_instructions_title'); ?></h2>
                            </div>
                        <?php endif; ?>

                        <div class="flex management__flex">
                            <?php while( have_rows('user_instructions') ): the_row();  $file = get_sub_field('file'); ?>
                                <?php
                                if( $file ):
                                    $url = $file['url'];
                                    $title = $file['title'];?>
                                    <div class="col management__col">
                                            <a class="management__block" href="<?php echo esc_attr($url); ?>" title="<?php echo esc_attr($title); ?>" target="_blank">
                                                <div class="management__icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/document-icon.svg" alt=""></div>
                                                <div class="management__desc">
                                                    <h3><?php echo esc_attr($title); ?></h3>
                                                </div>
                                            </a>
                                    </div>

                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </section>
        <?php endif; ?>

        <?php if( have_rows('version_changelog') ): ?>
            <section id="information" class="information">
                <div class="container">

                    <?php if( get_field('version_changelog_title') ): ?>
                        <div class="information__heading">
                            <h2><?php the_field('version_changelog_title'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="list">
                    <?php while( have_rows('version_changelog') ): the_row(); ?>
                            <div class="information__block">
                                <div class="flex information__flex">
                                    <div class="col information__col">
                                        <h3><?php the_sub_field('version'); ?></h3>
                                        <div class="information__date"><?php the_sub_field('date'); ?></div>
                                    </div>
                                    <div class="col information__col">
                                        <div class="information__desc">
                                            <p><?php the_sub_field('text'); ?></p>
                                            <h4><?php the_sub_field('title_list'); ?></h4>

                                            <?php if( have_rows('list_items') ): ?>
                                                <ul>
                                                    <?php while( have_rows('list_items') ): the_row();?>
                                                        <li><?php the_sub_field('item'); ?></li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php endwhile; ?>
                    </div>
                </div>
                    <div class="pagination information__pagination">
                    </div>
            </section>
        <?php endif; ?>

        <section class="video">
            <div class="container">
                <?php if( get_field('video_title') ): ?>
                    <div class="video__heading">
                        <h2><?php the_field('video_title'); ?></h2>
                    </div>
                <?php endif; ?>

                <?php
                $featured_posts = get_field('video_list');
                if( $featured_posts ): ?>
                    <div class="flex video__flex">
                        <?php foreach( $featured_posts as $featured_post ):
                            $permalink = get_permalink( $featured_post->ID );
                            $title = get_the_title( $featured_post->ID );
                            $custom_field = get_field( 'link_to_video', $featured_post->ID );

                            $url = get_field('link_to_video', $featured_post->ID);
                            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);

                            ?>

                            <div class="col video__col">
                                <a href="<?php echo esc_html( $custom_field ); ?>" data-youtube-id="<?php echo $my_array_of_vars['v']; ?>"  class="video__block video-thumb js-trigger-video-modal">
                                    <div class="image video__image object-fit">
                                        <img src="https://img.youtube.com/vi/<?php echo $my_array_of_vars['v']; ?>/maxresdefault.jpg" alt="">
                                        <div class="play-btn">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/play-button.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="video__desc">
                                        <h3><?php echo esc_html( $title ); ?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>



        <?php $featured_posts = get_field('supports_post_list'); if( $featured_posts ): ?>
                <section class="popular">
                    <div class="container">
                        <?php if( get_field('supports_post_title') ): ?>
                            <div class="popular__heading">
                                <h2><?php the_field('supports_post_title'); ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="flex popular__flex">
                        <?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
                            <div class="col popular__col">
                                <a href="<?php the_permalink(); ?>" class="popular__block">
                                    <div class="image popular__image object-fit">
                                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                                    </div>
                                    <div class="popular__desc">
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>


        <?php if( have_rows('global_social_link','option') ): ?>
        <section class="social-networks">
            <div class="container">

                    <div class="social-networks__heading">
                        <h2><?php echo __('We are on social networks', 'suunto'); ?></h2>
                    </div>


                <div class="social-networks__social-net">
                    <ul>
                        <?php while( have_rows('global_social_link','option') ): the_row();  $image = get_sub_field('logo'); ?>
                        <li><a href="<?php the_sub_field('link'); ?>"><img class="svg-image" src="<?php echo $image; ?>" alt=""></a></li>
                         <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>
    <!-- video modal -->
    <section class="video-modal">

        <!-- Modal Content Wrapper -->
        <div id="video-modal-content" class="video-modal-content">

            <!-- iframe -->
            <iframe
                    id="youtube"
                    width="100%"
                    height="100%"
                    frameborder="0"
                    allow="autoplay"
                    allowfullscreen
                    src=
            ></iframe>

            <a href="#" class="close-video-modal" >
                <!-- X close video icon -->
                <svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0"
                        y="0"
                        viewBox="0 0 32 32"
                        style="enable-background:new 0 0 32 32;"
                        xml:space="preserve"
                        width="24"
                        height="24" >

            <g id="icon-x-close">
                <path fill="#ffffff" d="M30.3448276,31.4576271 C29.9059965,31.4572473 29.4852797,31.2855701 29.1751724,30.980339 L0.485517241,2.77694915 C-0.122171278,2.13584324 -0.104240278,1.13679247 0.52607603,0.517159487 C1.15639234,-0.102473494 2.17266813,-0.120100579 2.82482759,0.477288136 L31.5144828,28.680678 C31.9872448,29.1460053 32.1285698,29.8453523 31.8726333,30.4529866 C31.6166968,31.0606209 31.0138299,31.4570487 30.3448276,31.4576271 Z" id="Shape"></path>
                <path fill="#ffffff" d="M1.65517241,31.4576271 C0.986170142,31.4570487 0.383303157,31.0606209 0.127366673,30.4529866 C-0.12856981,29.8453523 0.0127551942,29.1460053 0.485517241,28.680678 L29.1751724,0.477288136 C29.8273319,-0.120100579 30.8436077,-0.102473494 31.473924,0.517159487 C32.1042403,1.13679247 32.1221713,2.13584324 31.5144828,2.77694915 L2.82482759,30.980339 C2.51472031,31.2855701 2.09400353,31.4572473 1.65517241,31.4576271 Z" id="Shape"></path>
            </g>

          </svg>
            </a>

        </div><!-- end modal content wrapper -->


        <!-- clickable overlay element -->
        <div class="overlay"></div>


    </section>
    <!-- end video modal -->
<?php endwhile; ?>

<?php //get_template_part( 'template-parts/subscribe' );?>

<?php

get_footer();