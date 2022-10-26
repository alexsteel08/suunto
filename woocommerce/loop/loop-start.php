<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section class="catalog">
    <div class="">
        <div class="flex-row">
            <div class="col-3">
                <div class="filter">
                    <div class="close-filter"></div>

                    <div class="product_tags_block"></div>
                    <?php dynamic_sidebar( 'shop' ); ?>
                </div>
            </div>
            <div class="col-9">
                <div class="filter-btn-flex">
                    <div class="filter-btn">
                        <?php echo __('Filter', 'suunto'); ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/filter-icon.png" alt="">
                    </div>
                </div>
                <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
