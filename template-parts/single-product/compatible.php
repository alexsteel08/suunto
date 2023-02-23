
<?php
$compatible_products = get_field('compatible_products_list');
if( $compatible_products ): ?>
    <section class="compatible">
    <div class="compatible__heading">
        <h2><?php echo __('Compatible products', 'suunto'); ?></h2>
    </div>
    <div class="slider-container">
    <div class="swiper-button-prev compatible__prev">
        <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-prev.svg" alt="">
    </div>
    <div class="swiper-button-next compatible__next">
        <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-next.svg" alt="">
    </div>

    <div class="swiper-container compatible__swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?php foreach( $compatible_products as $featured_post ):
            global $post;
            global $product;
            $permalink = get_permalink($featured_post->ID);
            $title = get_the_title($featured_post->ID);
            $product_subtitle = get_field('product_subtitle', $featured_post->ID);
            $product_img_url = get_the_post_thumbnail_url($featured_post->ID);
            $terms = get_field('terms_select', $featured_post->ID);
            ?>
            <div class="swiper-slide">
                <div class="compatible__block">
                    <div class="compatible__tag">
                        <?php
                        if ($product->is_in_stock()) {
                            echo '' . __(' in stock', 'suunto') . '';
                        } else {
                            echo '' . __('out of stock', 'suunto') . '';
                        }
                        ?>
                    </div>
                    <div class="image compatible__image object-fit">
                        <img src="<?php echo $product_img_url; ?>" alt="">
                    </div>
                    <div class="compatible__desc">
                        <h3><?php echo esc_html( $title ); ?></h3>
                        <h4><?php echo esc_html( $product_subtitle ); ?></h4>
                        <!--<p><?php /*echo esc_html( $title ); */?></p>-->
                    </div>
                    <div class="compatible__price">
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
                    <a class="btn" href="<?php echo esc_url( $permalink ); ?>"><?php echo __('More', 'suunto'); ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination compatible__pagination"></div>
    </div>
    </div>

    </section>
<?php endif; ?>