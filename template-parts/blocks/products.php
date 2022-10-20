
<?php
$featured_posts = get_sub_field('products');
if( $featured_posts ): ?>

<section class="our-products ">
    <div class="container">
        <?php if( get_sub_field('name') ): ?>
            <div class="our-products__subheading">
                <h3><?php the_sub_field('name'); ?></h3>
            </div>
        <?php endif; ?>
        <?php if( get_sub_field('name') ): ?>
            <div class="our-products__heading">
                <h2><?php the_sub_field('name'); ?></h2>
            </div>
        <?php endif; ?>

        <div class="swiper-container product-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">


                        <?php foreach( $featured_posts as $featured_post ):
                            global $post;
                            global $product;
                            $permalink = get_permalink( $featured_post->ID );
                            $title = get_the_title( $featured_post->ID );
                            $product_subtitle = get_field( 'product_subtitle', $featured_post->ID );
                            $product_img_url = get_the_post_thumbnail_url($featured_post->ID);
                            $terms = get_field('terms_select', $featured_post->ID   );
                            ?>


                            <div class="swiper-slide">
                                <div class="product__block">


                                    <?php

                                    if( $terms ): ?>
                                        <ul class="product__tags">
                                            <?php foreach( $terms as $term ): $term_link = get_term_link($term);?>
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
                                        <img src="<?php echo $product_img_url;?>" alt="">
                                    </div>
                                    <div class="product__desc">
                                        <h3><?php echo esc_html( $title ); ?></h3>
                                        <p><?php echo $product_subtitle;?></p>
                                        <div class="product__price-inner">
                                        <?php
                                        $product = new WC_Product($featured_post->ID);
                                        if ($product->is_type( 'simple' )) { ?>
                                            <div class="product__price"><?php echo $product->get_price_html(); ?></div>
                                        <?php } ?>
                                        <?php
                                        if($product->product_type=='variable') {
                                            $available_variations = $product->get_available_variations();
                                            $count = count($available_variations)-1;
                                            $variation_id=$available_variations[$count]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                                            $variable_product1= new WC_Product_Variation( $variation_id );
                                            $regular_price = $variable_product1 ->regular_price;
                                            $sales_price = $variable_product1 ->sale_price;

                                        }
                                        ?>

                                            <div class="product__old-price"><span><?php echo $regular_price;?></span></div>
                                            <div class="product__price action-price"><?php echo $sales_price;?></div>
                                        </div>

<!--                                        <a class="btn" href="--><?php //echo esc_url( $permalink ); ?><!--">--><?php //_e('More details','suunto'); ?><!--</a>-->


                                        <?php


                                        do_action( 'woocommerce_after_shop_loop_item' );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination product-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev product-prev">
                <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-prev.svg" alt="">
            </div>
            <div class="swiper-button-next product-next">
                <img class="svg-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/arrow-next.svg" alt="">
            </div>
        </div>

        <?php endif; ?>

        <div class="mob-product">
            <div class="mob-flex">
                <div class="col">
                    <div class="product__block">
                        <ul class="product__tags">
                            <li><a class="news-tag" href="">Новинка</a></li>
                        </ul>
                        <button class="book-btn"><img class="svg-image" src="img/dist/icon/compare-icon.svg" alt=""></button>
                        <div class="image product__image object-fit">
                            <img src="img/dist/p-img1.png" alt="">
                        </div>
                        <div class="product__desc">
                            <h3>SUUNTO 9 BARO</h3>
                            <p>Granite blue titanium</p>
                            <div class="product__price-inner">
                                <div class="product__price">22 330 ₴</div>
                            </div>
                            <a class="btn" href="">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="product__block">
                        <ul class="product__tags">
                            <li><a class="news-tag" href="">Новинка</a></li>
                        </ul>
                        <button class="book-btn"><img class="svg-image" src="img/dist/icon/compare-icon.svg" alt=""></button>
                        <div class="image product__image object-fit">
                            <img src="img/dist/p-img2.png" alt="">
                        </div>
                        <div class="product__desc">
                            <h3>SUUNTO 7</h3>
                            <p>Black</p>
                            <div class="product__price-inner">
                                <div class="product__price">18 000 ₴</div>
                            </div>
                            <a class="btn" href="">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="product__block">
                        <ul class="product__tags">
                            <li><a class="news-tag" href="">Новинка</a></li>
                        </ul>
                        <button class="book-btn"><img class="svg-image" src="img/dist/icon/compare-icon.svg" alt=""></button>
                        <div class="image product__image object-fit">
                            <img src="img/dist/p-img3.png" alt="">
                        </div>
                        <div class="product__desc">
                            <h3>SUUNTO 5</h3>
                            <p>Black steel</p>
                            <div class="product__price-inner">
                                <div class="product__price">12 330 ₴</div>
                            </div>
                            <a class="btn" href="">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="product__block">
                        <ul class="product__tags">
                            <li><a class="news-tag" href="">Новинка</a></li>
                            <li><a class="action-tag" href="">Акция</a></li>
                        </ul>
                        <button class="book-btn"><img class="svg-image" src="img/dist/icon/compare-icon.svg" alt=""></button>
                        <div class="image product__image object-fit">
                            <img src="img/dist/p-img4.png" alt="">
                        </div>
                        <div class="product__desc">
                            <h3>BLACK STEEL</h3>
                            <p>White</p>
                            <div class="product__price-inner">
                                <div class="product__old-price"><span>23 900 ₴</span></div>
                                <div class="product__price action-price">20 330 ₴</div>
                            </div>
                            <a class="btn" href="">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>

            <a class="more-btn" href="<?php $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); echo $shop_page_url; ?>">Смотреть больше<?php __('from ', 'woodsoft' );?></a>
        </div>
    </div>
</section>