<?php if (have_rows('maps_block')): ?>
    <section class="address">
        <div class="container">
            <?php while (have_rows('maps_block')): the_row(); ?>
                <div class="flex address__flex">
                    <div class="col address__col">
                        <div class="address__block">
                            <h4><?php the_sub_field('title'); ?></h4>
                            <p><?php the_sub_field('text'); ?></p>
                            <div class="title">
                                <h4><?php the_sub_field('title_second'); ?></h4>
                            </div>

                            <?php if (have_rows('list')): ?>
                                <ul>
                                    <?php while (have_rows('list')):
                                    the_row(); ?>
                                    <li><?php the_sub_field('item'); ?>
                                    <li>
                                        <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col address__col">
                        <div class="image address__image object-fit">
                            <?php the_sub_field('map'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>


