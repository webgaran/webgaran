<div class="sticky-top">






<div class="">
        <h4 class="lesson-title">پربازدیدترین‌ها</h4>
        <?php
                $args = array(
                    'post_type' => 'post',
                    'post__not_in' => get_option( 'sticky_posts' ) ,
                    'posts_per_page' => 4,
                    'meta_key' => 'post_view_count',
                    // 'meta_value' => '17', 
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC'
                );
                $query = new WP_Query($args);
                while($query->have_posts()) : $query->the_post();
        ?>
            <div class="row">
                <div class="float-right">
                    <div><img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php the_title() ?>"></div>
                </div>
                <div>
                    <div><?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?><span class="pr-1">بازدید</span></div>
                    <div><?php the_title() ?></div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>




<div class="">
    <h4>پر بحث ترین</h4>
    <?php
    $args = array(
        'post_type' => 'post',
        'post__not_in' => get_option( 'sticky_posts' ) ,
        'posts_per_page' => 4,
        'orderby' => 'comment_count',
        'order' => 'DESC'
    );
    query_posts($args);
    while (have_posts()): the_post(); ?>
    <div class="row">
                <div class="float-right">
                    <div><img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php the_title() ?>"></div>
                </div>
                <div>
                    <div><?= get_comments_number( $post->ID ); ?><span class="pr-1">دیدگاه</span></div>
                    <div><?php the_title() ?></div>
                </div>
            </div>
    <?php endwhile; wp_reset_query(); ?>
</div>
