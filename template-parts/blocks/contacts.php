<section class="contacts">
    <div class="container">
        <div class="flex contacts__flex">
            <div class="col contacts__col">
                <div class="contacts__heading">
                    <h1><?php the_title();?></h1>
                </div>

                <div class="flex sub-flex">
                    <div class="col sub-col">
                        <div class="contacts__contacts">
                            <div class="phone-flex">
                                <?php if( have_rows('contacts_phones') ): ?>
                                    <div class="phone-block">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/tel-icon.svg" alt="">
                                        </div>
                                        <div>
                                        <?php while( have_rows('contacts_phones') ): the_row();  $footer_phones = get_sub_field('phone_number'); ?>
                                            <a href="tel:<?php if ($footer_phones) { echo preg_replace('/[^0-9]/', '', $footer_phones); } ?>"><?php echo $footer_phones; ?></a>
                                        <?php endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <?php if( have_rows('social_link') ): ?>
                                    <ul class="social">
                                        <?php while( have_rows('social_link') ): the_row();  $image = get_sub_field('logo'); ?>
                                            <li><a href="<?php the_sub_field('link'); ?>"><img src="<?php echo $image; ?>" alt=""></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if( get_sub_field('email') ): ?>
                            <div class="contacts__mail">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/mail-icon.svg" alt="">
                                <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="col sub-col">
                        <?php if( get_sub_field('contact_description') ): ?>
                           <div class="contacts__desc">
                              <?php the_sub_field('contact_description'); ?>
                           </div>
                        <?php endif; ?>
                    </div>

                </div>


                <div class="flex sub-flex">
                    <div class="col sub-col">
                        <?php if( get_sub_field('contacts_address_title') || get_sub_field('contacts_address_text') ): ?>
                           <div class="contacts__address">
                               <h4><?php the_sub_field('contacts_address_title'); ?></h4>
                              <?php the_sub_field('contacts_address_text'); ?>
                           </div>
                        <?php endif; ?>


                        <?php if( have_rows('contacts_phones_second') ): ?>
                            <div class="contacts__contacts">
                                <div class="phone-block phone-strong">
                                    <div class="icon">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/tel-icon.svg" alt="">
                                    </div>
                                    <div>
                                        <?php while( have_rows('contacts_phones_second') ): the_row();  $footer_phones = get_sub_field('phone_number'); ?>
                                            <a href="tel:<?php if ($footer_phones) { echo preg_replace('/[^0-9]/', '', $footer_phones); } ?>"><?php echo $footer_phones; ?></a>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col sub-col">
                        <?php if( get_sub_field('contact_description_second') ): ?>
                            <div class="con-content">
                                <?php the_sub_field('contact_description_second'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <div class="form-col contacts__col">
                <?php if( get_sub_field('contact_form_shortcode') ): ?>
                    <div class="contacts_shortcode">
                        <?php the_sub_field('contact_form_shortcode'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>