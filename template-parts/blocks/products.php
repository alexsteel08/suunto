<?php
$featured_posts = get_sub_field('products');
if ($featured_posts): ?>

<section class="our-products ">
    <div class="container">
        <?php if (get_sub_field('label')): ?>
            <div class="our-products__subheading">
                <h3><?php the_sub_field('label'); ?></h3>
            </div>
        <?php endif; ?>
        <?php if (get_sub_field('title')): ?>
            <div class="our-products__heading">
                <h2><?php the_sub_field('title'); ?></h2>
            </div>
        <?php endif; ?>

        <div class="swiper-container product-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach ($featured_posts as $featured_post):
                    global $post;
                    global $product;
                    $permalink = get_permalink($featured_post->ID);
                    $title = get_the_title($featured_post->ID);
                    $product_subtitle = get_field('product_subtitle', $featured_post->ID);
                    $product_img_url = get_the_post_thumbnail_url($featured_post->ID);
                    $terms = get_field('terms_select', $featured_post->ID);
                    ?>
                    <div class="swiper-slide">
                        <div class="product__block">
                            <?php
                            if ($terms): ?>
                                <ul class="product__tags">
                                    <?php foreach ($terms as $term): $term_link = get_term_link($term); ?>
                                        <li>
                                            <?php

                                            echo '<a href="';
                                            echo $term_link;
                                            echo '"';
                                            echo ' style="background-color:';
                                            echo get_field('tag_color', $term);
                                            echo '">';
                                            echo $term->name;
                                            echo '</a></li>';

                                            ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <!--                                    <button class="book-btn"><img class="svg-image" src="img/dist/icon/compare-icon.svg" alt=""></button>-->
                            <div class="image product__image object-fit">
                                <a href="<?php echo $permalink; ?>">
                                    <img src="<?php echo $product_img_url; ?>" alt="">
                                </a>
                            </div>
                            <div class="product__desc">
                                <a href="<?php echo $permalink; ?>"><h3><?php echo esc_html($title); ?></h3></a>
                                <p><?php echo $product_subtitle; ?></p>
                                <div class="product__price-inner">
                                    <?php
                                    $product = new WC_Product($featured_post->ID);
                                    if ($product->is_type('simple')) { ?>
                                        <div class="product__price"><?php echo $product->get_price_html(); ?></div>
                                    <?php } ?>
                                    <?php
                                    if ($product->product_type == 'variable') {
                                        $available_variations = $product->get_available_variations();
                                        $count = count($available_variations) - 1;
                                        $variation_id = $available_variations[0]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                                        $variable_product1 = new WC_Product_Variation($variation_id);
                                        $regular_price = $variable_product1->regular_price;
                                        $sales_price = $variable_product1->sale_price;

                                    }
                                    ?>
                                    <div class="product__old-price"><span><?php echo $regular_price; ?></span></div>
                                    <div class="product__price action-price"><?php echo $sales_price; ?></div>
                                </div>
                                <?php do_action('woocommerce_after_shop_loop_item'); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination product-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev product-prev">
                <img class="svg-image"
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-prev.svg"
                     alt="">
            </div>
            <div class="swiper-button-next product-next">
                <img class="svg-image"
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-next.svg"
                     alt="">
            </div>
        </div>



        <div class="mob-product">
            <div class="mob-flex">

                <?php foreach ($featured_posts as $featured_post):
                    global $post;
                    global $product;
                    $permalink = get_permalink($featured_post->ID);
                    $title = get_the_title($featured_post->ID);
                    $product_subtitle = get_field('product_subtitle', $featured_post->ID);
                    $product_img_url = get_the_post_thumbnail_url($featured_post->ID);
                    $terms = get_field('terms_select', $featured_post->ID);
                    ?>



                    <div class="col">
                        <a href="<?php echo $permalink; ?>">
                        <div class="product__block">
                            <?php
                            if ($terms): ?>
                                <ul class="product__tags">
                                    <?php foreach ($terms as $term): $term_link = get_term_link($term); ?>
                                        <li>
                                            <?php

                                            echo '<a href="';
                                            echo $term_link;
                                            echo '"';
                                            echo ' style="background-color:';
                                            echo get_field('tag_color', $term);
                                            echo '">';
                                            echo $term->name;
                                            echo '</a></li>';

                                            ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <div class="image product__image object-fit">
                                <img src="<?php echo $product_img_url; ?>" alt="">
                            </div>
                            <div class="product__desc">
                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php echo $product_subtitle; ?></p>
                                <div class="product__price-inner">
                                    <?php
                                    $product = new WC_Product($featured_post->ID);
                                    if ($product->is_type('simple')) { ?>
                                        <div class="product__price"><?php echo $product->get_price_html(); ?></div>
                                    <?php } ?>
                                    <?php
                                    if ($product->product_type == 'variable') {
                                        $available_variations = $product->get_available_variations();
                                        $count = count($available_variations) - 1;
                                        $variation_id = $available_variations[0]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                                        $variable_product1 = new WC_Product_Variation($variation_id);
                                        $regular_price = $variable_product1->regular_price;
                                        $sales_price = $variable_product1->sale_price;

                                    }
                                    ?>
                                    <div class="product__old-price"><span><?php echo $regular_price; ?></span></div>
                                    <div class="product__price action-price"><?php echo $sales_price; ?></div>
                                </div>
                                <?php do_action('woocommerce_after_shop_loop_item'); ?>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="more-btn" href="<?php $shop_page_url = get_permalink(wc_get_page_id('shop')); echo $shop_page_url; ?>"><?php echo __('Go to shop', 'suunto'); ?></a>
        </div>
    </div>
</section>
<?php endif; ?>