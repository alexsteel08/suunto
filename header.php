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
                <a href="/">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.svg" alt="">
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
                        <div class="d-block d-xl-none">
                            <div class="header__phone-list">
                                <a href="">+38(095) 536-76-40</a>
                                <a href="">+38(044) 425-11-65</a>
                            </div>
                        </div>
                        <div class="d-block d-xl-none">
                            <div class="header__social">
                                <a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/fb-h.svg" alt=""></a>
                                <a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/instagram-h.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="d-none d-xl-block">
                    <div class="header__phone-list">
                        <a href="">+38(095) 536-76-40</a>
                        <a href="">+38(044) 425-11-65</a>
                    </div>
                </div>
                <div class="d-none d-xl-block">
                    <div class="header__social">
                        <a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/fb-h.svg" alt=""></a>
                        <a href=""><img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/instagram-h.svg" alt=""></a>
                    </div>
                </div>
                <div class="header__search">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/search-icon-h.svg" alt="">
                </div>
                <?php dynamic_sidebar( 'compare' ); ?>
                <a href="" class="header__login">
                    <span class="name">Вход</span>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/account-circle.svg" alt="">
                </a>
                <a href="" class="header__cart">
                    <span class="name">Корзина</span>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/cart.svg" alt="">
                    <span class="quantity">2</span>
                </a>
                <div class="header__lang">
                    <span>RU</span>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/lang-arrow.svg" alt="">
                    <ul>
                        <li><a href="">EN</a></li>
                        <li><a href="">DE</a></li>
                    </ul>
                </div>
                <div class="btn-menu">
                    <div class="burger"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup">
        <div class="container">
            <form action="">
                <div class="search-popup__block">
                    <input type="search" name="s" id="" placeholder="Поиск товаров">
                    <button><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/search-icon-h.svg" alt=""></button>
                </div>
            </form>
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
