<?php

/**
 * @snippet       Variable Product Price Range: "From: min_price"
 */

add_filter( 'woocommerce_variable_price_html', 'bbloomer_variation_price_format_min', 9999, 2 );

function bbloomer_variation_price_format_min( $price, $product ) {
    $prices = $product->get_variation_prices( true );
    $min_price = current( $prices['price'] );
    $max_price = end( $prices['price'] );
    $min_reg_price = current( $prices['regular_price'] );
    $max_reg_price = end( $prices['regular_price'] );
    if ( $min_price !== $max_price || ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) ) {
        $price = '' . wc_price( $min_price ) . $product->get_price_suffix();
    }
    return $price;
}

/**
 * @desc Remove woocommerce_sidebar
 */

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * @desc Remove in all product type
 */
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


/**
 * Remove WooCommerce breadcrumbs
 */
add_action( 'init', 'my_remove_breadcrumbs' );

function my_remove_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


add_filter ('woocommerce_ajax_variation_threshold','woocommerce_ajax_variation_threshold_more',10,2);
function woocommerce_ajax_variation_threshold_more($count,$product) {
    return 500;
}
if ( ! defined( 'WC_MAX_LINKED_VARIATIONS' ) ) {

    define( 'WC_MAX_LINKED_VARIATIONS', 500);

}

//Hiding or Deleting the "Ship to a Different Address
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');


//checkuot fields
add_filter( 'woocommerce_checkout_fields' , 'remove_company_name' );

function remove_company_name( $fields ) {

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['account']['account_username']);
    unset($fields['account']['account_password']);
    unset($fields['account']['account_password-2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    return $fields;

}


// Update WooCommerce Flexslider options

add_filter( 'woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options' );

function ud_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;
//    $options['controlNav'] =  true;

    return $options;
}
add_filter( 'woocommerce_single_product_image_gallery_classes', 'bbloomer_5_columns_product_gallery' );

function bbloomer_5_columns_product_gallery( $wrapper_classes ) {
    $columns = 5; // change this to 2, 3, 5, etc. Default is 4.
    $wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );
    return $wrapper_classes;
}
//currencies symbol
//add_filter( 'woocommerce_currencies', 'add_my_currency' );
//function add_my_currency( $currencies ) {
//    $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
//    return $currencies;
//}
//
//add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
//function add_my_currency_symbol( $currency_symbol, $currency ) {
//    switch( $currency ) {
//        case 'UAH': $currency_symbol = ' грн'; break;
//    }
//    return $currency_symbol;
//}

//add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

//remove price after title single product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
//

//add parrent category before title and clor tags
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
function woocommerce_add_custom_text_before_product_title(){
    echo '<div class="hero-product__block">'; ?>
    <?php
    $terms = get_field('terms_select');

    if( $terms ): ?>
        <ul class="product__tags">
            <?php foreach( $terms as $term ): $term_link = get_term_link($term); ?>
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


    <?php
    echo '</div>';
    $cat = get_the_terms( $product->ID, 'product_cat' );
    foreach ($cat as $categoria) {
        if($categoria->parent == 0){
            echo '<h4 class="parrent_cat">';
            echo $categoria->name;
            echo '</h4>';
        }
    }
    the_title( '<h1 class="product_title entry-title">', '</h1>' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_add_custom_text_before_product_title', 5);
//



//* Add stock status to archive pages
add_action( 'woocommerce_single_product_summary', 'envy_stock_catalog' );
function envy_stock_catalog() {
    global $product;
    if ( $product->is_in_stock() ) {
        echo '<div class="hero-product__stock">'. __( ' in stock', 'suunto' ) . '</div>';
    } else {
        echo '<div class="out-of-stock" >' . __( 'out of stock', 'suunto' ) . '</div>';
    }
}

//tags checkbox
function my_woocommerce_make_tags_hierarchical( $args ) {
    $args['hierarchical'] = true;
    return $args;
};
add_filter( 'woocommerce_taxonomy_args_product_tag', 'my_woocommerce_make_tags_hierarchical' );

//Hide SKU, Cats, Tags @ Single Product Page - WooCommerce

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0 );
/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
//after short description
add_action( 'woocommerce_single_product_summary', 'after_short_description', 25 );
function after_short_description(){ ?>

    <div class="hero-product__content">
        <?php if( get_field('title_before_short_description') ): ?>
            <h4>
                <?php the_field('title_before_short_description'); ?>
            </h4>
        <?php endif; ?>
        <?php if( get_field('text_before_short_description') ): ?>
            <p><span>
          <?php the_field('text_before_short_description'); ?>
       </span></p>
        <?php endif; ?>
    </div>

<?php
}


add_action( 'woocommerce_single_product_summary', 'subtitle_product', 6 );
function subtitle_product () { ?>
    <?php if( get_field('product_subtitle') ): ?>
        <div class="hero-product__heading">
            <h3>
                <?php the_field('product_subtitle'); ?>
            </h3>
        </div>
    <?php endif; ?>
<?php
}

/**
 * Remove product page tabs
 */
add_filter( 'woocommerce_product_tabs', '_remove_reviews_tab', 98 );
function _remove_reviews_tab( $tabs ) {
    unset( $tabs[ 'reviews' ] );
    unset( $tabs['description'] );
    unset( $tabs['additional_information'] );
    return $tabs;
}



if ( ! function_exists( 'display_product_additional_information' ) ) {

    function display_product_additional_information($atts) {

        // Shortcode attribute (or argument)
        $atts = shortcode_atts( array(
            'id'    => ''
        ), $atts, 'product_additional_information' );

        // If the "id" argument is not defined, we try to get the post Id
        if ( ! ( ! empty($atts['id']) && $atts['id'] > 0 ) ) {
            $atts['id'] = get_the_id();
        }

        // We check that the "id" argument is a product id
        if ( get_post_type($atts['id']) === 'product' ) {
            $product = wc_get_product($atts['id']);
        }
        // If not we exit
        else {
            return;
        }

        ob_start(); // Start buffering

        do_action( 'woocommerce_product_additional_information', $product );

        return ob_get_clean(); // Return the buffered outpout
    }

    add_shortcode('product_additional_information', 'display_product_additional_information');

}



add_action( 'woocommerce_after_single_product_summary', 'product_custom_content', 10);
function product_custom_content() { ?>
    <?php get_template_part( 'template-parts/single-product/description' );?>
    <?php get_template_part( 'template-parts/single-product/features' );?>
    <?php get_template_part( 'template-parts/single-product/characteristics' );?>
    <?php get_template_part( 'template-parts/single-product/specification' );?>
    <?php get_template_part( 'template-parts/single-product/compatible' );?>
    <?php get_template_part( 'template-parts/single-product/videos' );?>


<?php


    comments_template();

}



