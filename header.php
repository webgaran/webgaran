<?php 
	
	/*
		This is the template for the hedaer
		
		@package webgaran
	*/
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php is_front_page() ? bloginfo('description') : wp_title('|', 'true', 'right'); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<?php 
   $custom_logo_id = get_theme_mod( 'custom_logo' );
   $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<body <?php body_class(); ?> >
<header>
<nav class="navbar navbar-expand-md  bg-dark navbar-megamenu">
<div class="container">
<!-- custom calls to options stored in Admin section "Theme Options" to display the logo or not -->
<a class="navbar-brand" id="logo" href="<?php echo site_url(); ?>"><img src="<?php echo $image[0]; ?>" alt="Our Logo" class="img-responsive logo"/></a>
<!-- custom calls to options stored in Admin section "Theme Options" to display the logo or not -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bootstrap-nav-collapse" aria-controls="jd-bootstrap-nav-collapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<!-- Collect the nav links from WordPress -->
<div class="collapse navbar-collapse" id="bootstrap-nav-collapse">
	<?php
	  wp_nav_menu( array(
	      'theme_location'  => 'top',
	      'depth'           => 2,
	      'container'       => 'div',
	      'container_id'    => 'navbarNavDropdown',
	      'container_class' => 'collapse navbar-collapse position-relative',
	      'menu_class'      => 'nav navbar-nav ml-auto ',
	      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	      'walker'          => new WP_Bootstrap_Navwalker()
	  ) );
	  ?>
</div><!-- ./collapse -->
</div><!-- /.container -->
</nav>
</header>