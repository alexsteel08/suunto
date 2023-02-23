<div class="col instructions__col">
    <div class="instructions__block">
        <div class="image instructions__image object-fit">
            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>"></a>
        </div>
        <div class="instructions__desc">
            <h3><?php the_title();?></h3>
            <a class="btn" href="<?php the_permalink(); ?>"><?php _e('More','suunto'); ?></a>
        </div>
    </div>
</div>