<?php
/*
==========================================
login redirect
==========================================
*/
function redirect_to_custom_logout() {
	wp_redirect ( home_url() . "/login" );
	exit();
}
add_action( "wp_logout" , "redirect_to_custom_logout" );


function redirect_wp_admin() {
	global $pagenow;
	if ( $pagenow == 'wp-login.php' && $_GET['action'] != "logout" ) {
		wp_redirect ( home_url() . "/login" );
		exit();
	}
}
add_action( "init" , "redirect_wp_admin" );
/*
==========================================
Head function
==========================================
*/
/* remove version string from js and css */
function sunset_remove_wp_version_strings( $src ) {
	
	global $wp_version;
	parse_str( parse_url($src, PHP_URL_QUERY), $query );
	if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
	
}
add_filter( 'script_loader_src', 'sunset_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'sunset_remove_wp_version_strings' );

/* remove metatag generator from header */
function sunset_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'sunset_remove_meta_version' );

/*
==========================================
post-views-count
==========================================
*/
function set_post_view_custom_field() {
    if ( is_single() ) {
        global $post;
        $post_id = $post->ID;
        $count = 1;
        $post_view_count = get_post_meta( $post_id, 'post_view_count', true );
        if ( $post_view_count ) {
            $count = $post_view_count + 1;
        }
        update_post_meta( $post_id, 'post_view_count', $count );
    }
}
add_action( 'wp_head', 'set_post_view_custom_field' );
// in Pannel
function add_post_view_count_column( $columns ) {
    if( is_array( $columns ) && ! isset( $columns['post_view_count'] ) )
        $columns[ 'post_view_count' ] = 'تعداد بازدید';
    return $columns;
}
add_filter( 'manage_posts_columns', 'add_post_view_count_column' );
// Show in Pannel 
function set_post_view_count_column( $column_name, $post_ID ) {
    if ( $column_name == 'post_view_count' ) {
        $count = get_post_meta( $post_ID, 'post_view_count', true );
        echo $count ? $count : 0;
    }
}
add_action( 'manage_posts_custom_column', 'set_post_view_count_column', 10, 2);
// in front    
function get_post_view_count( $post_id ){
    return get_post_meta( $post_id, 'post_view_count', true );
}
/*
==========================================
Yost Breadcrumb
==========================================
*/
function webgaran_breadcrumb(){
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
}
/*
==========================================
Set featured image
==========================================
*/
function webgaran_featured_image(){
    $featured_url = '';

    if ( has_post_thumbnail() ) {
        $featured_url = get_the_post_thumbnail_url( get_the_ID() );
    } else {

        $attachment = get_children(
            array(
                'post_parent' => get_the_ID(),
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'order' => 'DESC',
                'numberposts' => 1
            ));

        if ( is_array( $attachment ) || !empty( $attachment ) ) {
            $attachment = current( $attachment );
            $featured_url = wp_get_attachment_url( $attachment->ID, 'full' );
        }
    }

    if ( empty( $featured_url ) ) {
        $featured_url = get_template_directory_uri() . '/img/no-image.png';
    }

    return $featured_url;
}
/*
==========================================
See more
==========================================
*/
function webgaran_see_more() {
		$args = array(
			'type' => 'post',
			'posts_per_page' => 8,
			'orderby' => 'rand'
		);
		$lastBlog = new WP_Query($args);
		if( $lastBlog->have_posts() ):
			while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
				<div class="col-md-3">
                    <img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url('large') ?>" alt="">
                </div>
			<?php endwhile;
		endif;
		wp_reset_postdata();
}
/*
==========================================
next-prev 
==========================================
*/
function next_prev() { ?>
    <div class="col-6">
            <div class="clearfix">
              <?php previous_post_link(  ); ?>
            </div>
            <div class="">
              <?php $prevPost = get_previous_post();
              $prevThumbnail = get_the_post_thumbnail( $prevPost->ID , array('thumbnail') , array('class'=>'img-thumbnail') );
              previous_post_link( '%link', $prevThumbnail ); ?>
            </div>
          </div>
          <div class="col-6 text-left">
            <div class="">
              <?php $prevPost = get_next_post(); ?>
            </div>
            <div class="">
            <?php next_post_link(  );  ?>
            </div>
            <?php $prevThumbnail = get_the_post_thumbnail( $prevPost->ID , array('thumbnail') , array('class'=>'img-thumbnail') );
            next_post_link( '%link', $prevThumbnail ); ?>
          </div>
<?php }
/*
==========================================
Add This
==========================================
*/
function add_this() { ?>
<ul class="social-share-icons">
    <li><a class="social-icons-item facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=https://novinmarketing.com/article/add-link-in-bio-instagram/"><i class="fa fa-facebook"></i></a></li>
    <li><a class="social-icons-item twitter" target="_blank" href="https://twitter.com/share?url=https://novinmarketing.com/article/add-link-in-bio-instagram/&amp;text=راهنمای قرار دادن لینک در بیو اینستاگرام"><i class="fa fa-twitter"></i></a></li>
    <li><a class="social-icons-item linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://novinmarketing.com/article/add-link-in-bio-instagram/"><i class="fa fa-linkedin"></i></a></li>
    <li><a class="social-icons-item telegram" target="_blank" href="https://telegram.me/share/url?url=https://novinmarketing.com/article/add-link-in-bio-instagram/&amp;text=راهنمای قرار دادن لینک در بیو اینستاگرام"><i class="fa fa-paper-plane"></i></a></li>
    <li><a class="social-icons-item whatsap" target="_blank" href="https://wa.me/whatsappphonenumber/?text=https://novinmarketing.com/article/add-link-in-bio-instagram/"><i class="fa fa-whatsapp"></i></a></li>
    <li><a class="social-icons-item email" target="_blank" href="mailto:?subject=میخواهم این سایت را مشاهده کنید&amp;body=Check out this site https://novinmarketing.com/article/add-link-in-bio-instagram/."><i class="fa fa-envelope"></i></a></li>
    <li class="post-extra"><div class="post-like"><a href="#" data-post_id="13676"> <span title="I like this article" class="qtip like"></span> </a><span class="count"><a class="like" rel="<?php echo $post->ID; ?>"><i class="fa fa-heart-o"></i><?php echo likeCount($post->ID); ?> likes</a></span></div></li>
    <li><span class="post-comment"><i class="fa fa-comments"></i></span><span class="entry-comments"><?= get_comments_number( $post->ID ); ?></span></li>
    <li><span class="post-comment"><i class="fa fa-eye"></i></span><span class="entry-view"><?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?></span></li>
</ul>
<?php }