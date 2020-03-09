<?php if ( have_posts() ): while ( have_posts() ): the_post();?>
<div class="post-info">
    <ul>
        <li><?php the_date('j F Y') ?></li>
        <li><?php if(get_the_modified_date() != get_the_date()){ echo'تاریخ بروزرانس:'; the_modified_date('d M y'); } ?></li>
    </ul>
</div>
<div>
    <img src="<?= webgaran_featured_image(); ?>">
</div>
<div>
<?php

$categories = get_the_category();
$separator = ", ";
$output = '';

if ($categories) {

foreach ($categories as $category) {

$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;

}

echo trim($output, $separator);

}

?>
    <h1><?php the_title() ?></h1>
</div>

<article>
    <?php the_content() ?>
</article>
<?php endwhile; endif; ?>