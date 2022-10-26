<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

if (!is_a($product, 'WC_Product')) {
    return;
}
//$available_variations = $product->get_available_variations();
//$count = count($available_variations) - 1;
//$variation_id = $available_variations[0]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
//$variable_product1 = new WC_Product_Variation($variation_id);
//$regular_price = $variable_product1->regular_price;
//$sales_price = $variable_product1->sale_price;


$terms = get_field('terms_select');
?>

<?php do_action('woocommerce_widget_product_item_start', $args); ?>
<div class="col browsed__col">
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
                        echo '</a>';

                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!--                                    <button class="book-btn"><img class="svg-image" src="img/dist/icon/compare-icon.svg" alt=""></button>-->
        <div class="image product__image object-fit">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

        </div>
        <div class="product__desc">
            <h3><?php echo wp_kses_post($product->get_name()); ?></h3>
            <?php if (get_field('product_subtitle')): ?>
                <p>
                    <?php the_field('product_subtitle'); ?>
                </p>
            <?php endif; ?>
            <div class="product__price-inner">
                <!--                --><?php //echo $product->get_price_html();?>

                <?php
                if ($product->is_type('simple')) { ?>
                    <div class="product__price"><?php echo $product->get_price_html(); ?></div>
                <?php } ?>
                <?php
                if ($product->product_type == 'variable') { ?>

                    <div class="product__old-price"><span><?php echo $regular_price; ?></span></div>
                    <div class="product__price action-price"><?php echo $sales_price; ?></div>


                    <?php


                } ?>

            </div>


            <?php do_action('woocommerce_after_shop_loop_item'); ?>
        </div>
    </div>
</div>
<?php do_action('woocommerce_widget_product_item_end', $args); ?>

