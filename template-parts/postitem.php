<div class="col news__col">
    <a href="<?php the_permalink(); ?>" class="news__block">
        <div class="image news__image object-fit">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

        </div>

        <div class="news__desc">
            <p><?php the_title(); ?></p>
            <div class="news__date"><?php echo get_the_date('M d, Y');?>
            </div>
        </div>
    </a>
</div>