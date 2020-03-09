<div class="container">
    <div class="">
        <?php
        $args = array(
            'posts_per_page' => 1,
            'post__in' => get_option( 'sticky_posts' ),
            'ignore_sticky_posts' => 1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();?>
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url('large') ?>" alt="">
                </div>
                <div class="col-md-6">
                    <h3><?php the_title() ?></h3>
                    <?php the_excerpt() ?>
                    <div><span><a class="btn btn-info" href="<?php the_permalink() ?>">بیشتر بخوانید</a></span></div>
                </div>
            </div>
        <?php endwhile; endif; wp_reset_query(); ?>
    </div>
</div>