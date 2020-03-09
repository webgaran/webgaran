<div class="container">
<h2>قالب های رایگان</h2>
    <div class="row">
        <?php
        echo '<ul class="nav nav-tabs" role="tablist">';
        $args = array(
            'post_type'=> 'templates',
            'tax_query' => array(
                array(
                    'taxonomy' => 'field',
                )
            )
        );
        $args2 = array(
            'type' => 'templates',
            'taxonomy' => 'field',
        );
        $categories = get_categories($args2);
        foreach($categories as $category) {
            echo
                '<li class="nav-item">
        <a href="#'.$category->slug.'" role="tab" data-toggle="tab">
            '.$category->name.'
        </a>
    </li>';
        }
        echo '</ul>';
        echo '<div class="tab-content col-md-12">';
        foreach($categories as $category) {
            $the_query = new WP_Query(array(
                'post_type' => 'templates',
                'posts_per_page'    => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'field',
                        'field' => 'slug',
                        'terms' => $category->slug
                    )
                ),
            ));
            echo '<div class="tab-pane" id="' . $category->slug.'">';
            while ( $the_query->have_posts() ) :
                $the_query->the_post(); ?>
                    <div class="col-md-3">
                        <a href="<?php the_permalink() ?>"><img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url() ?>" alt=""></a>
                    </div>
            <?php endwhile;
            echo '</div>';
        }
        ?>
    </div>
</div>