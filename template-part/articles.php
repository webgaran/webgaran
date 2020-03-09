<div class="container">
    <h2>مقالات آموزشی</h2>
    <div class="row">

        <?php
        $ourCurrentPage = get_query_var('paged');
        $args = array(
            'posts_per_page' => 8,
            'paged' => $ourCurrentPage,
            'ignore_sticky_posts' => 1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();?>
            <div class="col-md-3">
                <a href="<?php the_permalink() ?>"><img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url() ?>" alt=""></a>
            </div>
        <?php endwhile; 
            echo paginate_links(array(
                'total' => $query->max_num_pages
            ));
        endif; wp_reset_query(); ?>
    </div>
</div>