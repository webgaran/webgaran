<?php 
	
/*
    This is the template for the widget
    
    @package sunsettheme
*/
function awesome_widget_setup() {

    register_sidebar(
        array(
            'name'	=> 'Sidebar',
            'id'	=> 'sidebar-1',
            'class'	=> 'custom',
            'description' => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

}
add_action('widgets_init','awesome_widget_setup');
?>
