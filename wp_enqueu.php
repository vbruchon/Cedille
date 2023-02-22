<?
function my_theme_enqueue_scripts()
{
	global $post;

	// Script jquery général
	wp_enqueue_script('jquery-min-js', get_stylesheet_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), '1.11.0');

	//Global Css 
	wp_enqueue_style('global-style', get_stylesheet_directory_uri() . '/assets/css/global.css', array('jquery'), '1.0', true);

    //Contact_element
	wp_enqueue_style('contact_element-style', get_stylesheet_directory_uri() . '/assets/css/contact.css');
	wp_enqueue_script('contact_element-script', get_stylesheet_directory_uri() . '/assets/js/contact.js', array('jquery'), '1.0', true);

	// Check if the tiers-lieux_caroussel shortcode is in page
	if (has_shortcode($post->post_content, 'tiers-lieux_caroussel')) {
		// Load styles for the tiers-lieux carousel shortcode
		wp_enqueue_style('tiers-lieux_caroussel-style', get_stylesheet_directory_uri() . '/assets/css/carousel.css');
		// Load script for the tiers-lieux carousel shortcode
		wp_enqueue_script('tiers-lieux_caroussel-script', get_stylesheet_directory_uri() . '/assets/js/carousel.js', array('jquery'), '1.0', true);
	}

	if (has_shortcode($post->post_content, 'advices')) {
		wp_enqueue_style('advices-style', get_stylesheet_directory_uri() . '/assets/css/carouselAdvices.css');
		wp_enqueue_script('advices-script', get_stylesheet_directory_uri() . '/assets/js/caroussel-advices.js', array('jquery'), '1.0', true);
	}

	/* 	if (has_shortcode($post->post_content, 'contact_element')) {
		wp_enqueue_style('contact_element-style', get_stylesheet_directory_uri() . '/assets/css/contact.css');
		wp_enqueue_script('contact_element-script', get_stylesheet_directory_uri() . '/assets/js/contact.js', array('jquery'), '1.0', true);
	} */

	if (has_shortcode($post->post_content, 'all-thematique')) {
		wp_enqueue_style('all-thematique-style', get_stylesheet_directory_uri() . '/assets/css/all-thematique.css');
	}

	if (has_shortcode($post->post_content, 'latest_post')) {
		wp_enqueue_style('latest_post-style', get_stylesheet_directory_uri() . '/assets/css/lastest_post.css');
	}

	if (is_archive('formations')) {
		wp_enqueue_style('archive-style', get_stylesheet_directory_uri() . '/assets/css/archive.css');
	}

	if (is_singular('formations')) {
		wp_enqueue_style('single-formation-style', get_stylesheet_directory_uri() . '/assets/css/single-formation.css');
		wp_enqueue_script('single-formation-script', get_stylesheet_directory_uri() . '/assets/js/single-formation.js', array('jquery'), '1.0', true);
	}
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');
