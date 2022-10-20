<section class="video product-video">
        <div class="video__heading">
            <h2>Видеоролики</h2>
        </div>


            <?php
            $featured_posts = get_field('videos_items');
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