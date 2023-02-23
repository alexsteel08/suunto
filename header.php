<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
<body <?php body_class(); ?> data-aos-easing="ease" data-aos-duration="800" data-aos-delay="0">

<?php wp_body_open(); ?>


<header class="header">
    <div class="container">
        <div class="flex">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <?php if( get_field('logo','option') ): ?>
                        <img itemprop="logo" src="<?php the_field('logo','option'); ?>" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="header__flex">
                <nav class="header__menu">
                    <div class="menu-container">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'primary-menu',
                            'menu' => '',
                            'container' => 'nav',
                            'container_class' => 'nav-menu',
                            'container_id' => '',
                            'menu_class' => 'menu__list',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'add_li_class' => 'menu__link',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => '',
                        ]);

                        ?>

                        <?php if( have_rows('header_phones', 'option') ): ?>
                            <div class="d-block d-xl-none">
                                <div class="header__phone-list">
                                    <?php while( have_rows('header_phones', 'option') ): the_row();  $header_phone = get_sub_field('phone_number'); ?>
                                        <a href="tel:<?php if ($header_phone) { echo preg_replace('/[^0-9]/', '', $header_phone); } ?>">
                                            <?php echo $header_phone; ?>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( have_rows('social_links', 'option') ): ?>
                            <div class="d-block d-xl-none">
                                <div class="header__social">
                                    <?php while( have_rows('social_links', 'option') ): the_row();  $logo = get_sub_field('logo'); ?>
                                        <a href="<?php the_sub_field('link'); ?>"><img class="svg-image" src="<?php echo $logo; ?>" alt=""></a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
                <?php if( have_rows('header_phones', 'option') ): ?>
                    <div class="d-none d-xl-block">
                        <div class="header__phone-list">
                            <?php while( have_rows('header_phones', 'option') ): the_row();  $header_phone = get_sub_field('phone_number'); ?>
                                <a href="tel:<?php if ($header_phone) { echo preg_replace('/[^0-9]/', '', $header_phone); } ?>">
                                    <?php echo $header_phone; ?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('social_links', 'option') ): ?>
                    <div class="d-none d-xl-block">
                        <div class="header__social">
                            <?php while( have_rows('social_links', 'option') ): the_row();  $logo = get_sub_field('logo'); ?>
                                <a href="<?php the_sub_field('link'); ?>"><img class="svg-image" src="<?php echo $logo; ?>" alt=""></a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>


                <div class="header__search">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/search-icon-h.svg" alt="">
                </div>
                <?php dynamic_sidebar( 'compare' ); ?>

                <?php if ( is_user_logged_in() ) { ?>
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="header__login" title="<?php _e('My Account','suunto'); ?>" data-da="header__menu,2,992">
                        <span><?php _e('My Account','suunto'); ?></span>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/account-circle.svg" alt="">
                    </a>
                <?php }
                else { ?>
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="header__login" title="<?php _e('Login / Register','suunto'); ?>" data-da="header__menu,2,992">
                        <span><?php _e('Login','suunto'); ?></span>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/account-circle.svg" alt="">
                    </a>
                <?php } ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header__cart">
                    <span class="name"><?php _e('Card','suunto'); ?></span>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/cart.svg" alt="">
                    <span class="quantity"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
                <?php echo do_shortcode('[wpml_language_selector_widget]');?>
<!--                <div class="header__lang">-->
<!--                    <span>RU</span>-->
<!--                    <img src="--><?php //echo esc_url(get_template_directory_uri()); ?><!--/assets/images/icon/lang-arrow.svg" alt="">-->
<!--                    <ul>-->
<!--                        <li><a href="">EN</a></li>-->
<!--                        <li><a href="">DE</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <div class="btn-menu">
                    <div class="burger"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup">
        <div class="container">


                    <?php dynamic_sidebar( 'search' ); ?>


        </div>
    </div>
</header>
<?php if ( ! is_front_page() ) { ?>
        <div class="breadcrums">
            <div class="container">
                <?php
                if ( function_exists( 'yoast_breadcrumb' ) ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                }
                ?>
            </div>
        </div>
<?php } ?>
