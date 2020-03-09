<?php
// Customize Appearance Options
function learningWordPress_customize_register( $wp_customize ) {

	$wp_customize->add_setting('lwp_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('lwp_btn_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('lwp_btn_hover_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));

	$wp_customize->add_section('lwp_standard_colors', array(
		'title' => __('Standard Colors', 'LearningWordPress'),
		'priority' => 30,
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
		'label' => __('Link Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_link_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_color_control', array(
		'label' => __('Button Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_btn_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_hover_color_control', array(
		'label' => __('Button Hover Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_btn_hover_color',
	) ) );

}

add_action('customize_register', 'learningWordPress_customize_register');



// Output Customize CSS
function learningWordPress_customize_css() { ?>

	<style type="text/css">

		/* a:link,
		a:visited {
			color: <?php //echo get_theme_mod('lwp_link_color'); ?>;
		}

		.btn {
			background-color: <?php //echo get_theme_mod('lwp_btn_color'); ?>;
		}

		.btn:hover {
			background-color: <?php //echo get_theme_mod('lwp_btn_hover_color'); ?>;
		} */

	</style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');