<?php
global $product;
$viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array)explode('|', wp_unslash($_COOKIE['woocommerce_recently_viewed'])) : array(); // @codingStandardsIgnoreLine
$viewed_products = array_reverse(array_filter(array_map('absint', $viewed_products)));

if (empty($viewed_products)) {
    return;
}

ob_start();

$number = !empty($instance['number']);

$query_args = array(
    'posts_per_page' => $number,
    'no_found_rows' => 1,
    'post_status' => 'publish',
    'post_type' => 'product',
    'post__in' => $viewed_products,
    'orderby' => 'post__in',
);

if ('yes' === get_option('woocommerce_hide_out_of_stock_items')) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'outofstock',
            'operator' => 'NOT IN',
        ),
    ); // WPCS: slow query ok.
}

$r = new WP_Query(apply_filters('woocommerce_recently_viewed_products_widget_query_args', $query_args));

if ($r->have_posts()) { ?>

    <section class="browsed">
        <div class="container">
            <div class="browsed__heading">
                <h3>Вы просматривали</h3>
            </div>
            <div class="flex browsed__flex">


                <?php
                $template_args = array(
                    'widget_id' => isset($args['widget_id']),
                );

                while ($r->have_posts()) {
                    $r->the_post(); ?>

                    <?php do_action('woocommerce_widget_product_item_start', $args); ?>
                    <?php wc_get_template('content-widget-product.php', $template_args); ?>

                    <?php do_action('woocommerce_widget_product_item_end', $args); ?>


                    <?php
                }

                ?>

            </div>
        </div>
        </div>
    </section>

    <?php


}

wp_reset_postdata();

$content = ob_get_clean();

echo $content; // WPCS: XSS ok.
?>