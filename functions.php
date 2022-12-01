<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.6.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_load_textdomain', [ true ], '2.0', 'hello_elementor_load_textdomain' );
		if ( apply_filters( 'hello_elementor_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'hello-elementor', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_menus', [ true ], '2.0', 'hello_elementor_register_menus' );
		if ( apply_filters( 'hello_elementor_register_menus', $hook_result ) ) {
			register_nav_menus( [ 'menu-1' => __( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => __( 'Footer', 'hello-elementor' ) ] );
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_add_theme_support', [ true ], '2.0', 'hello_elementor_add_theme_support' );
		if ( apply_filters( 'hello_elementor_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated( 'elementor_hello_theme_add_woocommerce_support', [ true ], '2.0', 'hello_elementor_add_woocommerce_support' );
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', $hook_result ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$enqueue_basic_style = apply_filters_deprecated( 'elementor_hello_theme_enqueue_style', [ true ], '2.0', 'hello_elementor_enqueue_style' );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', $enqueue_basic_style ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_elementor_locations', [ true ], '2.0', 'hello_elementor_register_elementor_locations' );
		if ( apply_filters( 'hello_elementor_register_elementor_locations', $hook_result ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}


/**
 * wpm_custom_post_type() => fonction pour créer le custom post type 'Formations'
 * 
 * $labels 		   =>   les différentes dénominations de le custom post type qui seront affichées dans l'administration
 * 
 * 'name' 		   =>   nom au pluriel du cpt
 * 'singular_name' =>   nom au singulier
 * 'menu_name'	   =>   Libellé afficher dans le dashboard
 * 
 * $args  		   =>   Options pour le custom post type 
 * 'supports' 	   =>   Options disponibles dans l'éditeur de le custom post type ( un titre, un auteur...)
 */
function wpm_custom_post_type(){

// FORMATIONS 

/* Création du CPT*/
	$labels = array(
		'name' => _x('Formations', 'Post Type General Name'),
		'singular_name'       => _x('Formation', 'Post Type Singular Name'),
		'menu_name'           => __('Formations'),
// Les différents libellés de l'administration 		
		'all_items'           => __('Toutes les formations'),
		'view_item'           => __('Voir les formations'),
		'add_new_item'        => __('Ajouter une nouvelle formation'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer la formation'),
		'update_item'         => __('Modifier la formation'),
		'search_items'        => __('Rechercher une formation'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
		'categories' 		  => __('Thématiques')
	);

	$args = array(
		'label'               => __('Formations'),
		'labels'              => $labels,
		'menu_position'		  => 0,
		'menu_icon'      => 'dashicons-welcome-learn-more',
		'supports'            => array('title', 'thumbnail', 'custom-fields'),
/* options supplémentaires */
		'show_in_rest'	      => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'formations'),
	);
	register_post_type('formations', $args);
		
	
/* Création des taxonomis du CPT formations */
	$labels = array(
		'name' => 'Thématiques',
		'new_item_name' => 'Nouvelle thématique',
		'parent_item' => 'Thématique parentes',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
	);

	register_taxonomy('thematique', 'formations', $args);

// AVIS 

/* Création du CPT */	
	$labels = array(
		'name' => _x('Avis', 'Post Type General Name'),
		'singular_name'       => _x('Avis', 'Post Type Singular Name'),
		'menu_name'           => __('Avis'),
		'all_items'           => __('Toutes les avis'),
		'view_item'           => __('Voir les avis'),
		'add_new_item'        => __('Ajouter un nouvel avis'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer l\'avis '),
		'update_item'         => __('Modifier l\'avis)'),
		'search_items'        => __('Rechercher un avis'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
		'categories' 		  => __('Thématiques')
	);

	$args = array(
		'label'               => __('Avis'),
		'labels'              => $labels,
		'menu_position'		  => 1,
		'menu_icon'      => 'dashicons-admin-comments',
		'supports'            => array('title', 'custom-fields',),
		'show_in_rest' 		  => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'avis'),
	);
	register_post_type('avis', $args);

/* Création des taxonomis du CPT Avis */
	$labels = array(
		'name' => 'Auteur',
		'new_item_name' => 'Type de l\'auteur',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
	);

	register_taxonomy('auteur', 'avis', $args);
	
// TIERS-LIEUX 

/* Création du CPT "Tiers-Lieux  */
	$labels = array(
		'name' => _x('Tiers-Lieux', 'Post Type General Name'),
		'singular_name'       => _x('Tiers-Lieu', 'Post Type Singular Name'),
		'menu_name'           => __('Tiers-Lieux'),
// Les différents libellés de l'administration 		
		'all_items'           => __('Toutes les tiers-lieux'),
		'view_item'           => __('Voir les tiers-lieux'),
		'add_new_item'        => __('Ajouter un nouveau tiers-lieu'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer le tiers-lieu'),
		'update_item'         => __('Modifier le tiers-lieux'),
		'search_items'        => __('Rechercher un tiers-lieu'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
	);

	$args = array(
		'label'               => __('Tiers-Lieux'),
		'labels'              => $labels,
		'menu_position'	      => 2,
		'menu_icon'           => 'dashicons-admin-multisite',
		'supports'            => array('title','thumbnail', 'custom-fields'),
/* options supplémentaires */
		'show_in_rest' 	      => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'	      => array('slug' => 'tiers-lieux'),
	);
	register_post_type('tiers-lieux', $args);
}

add_action('init', 'wpm_custom_post_type', 0);

add_action('after_theme_setup','gkp_add_post_thumbnail');

function gkp_add_post_thumbnail() {
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'formations' ) );

	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'tiers-lieux' ) );

}


/**
 * Modifier le texte "Saisissez votre titre ici" d'un custom post type
 * get_current_screen() => Récupérer le post type
 * */
function wpm_change_title_cpt($title)
{
	$screen = get_current_screen();
	// Si le post type de l'écran actuel est 'formation'      
	if ('formations' == $screen->post_type) {
		// Alors on modifie le titre d'origine par celui-la           
		$title = 'Entrez le nom de la formation';
		return $title;
	} elseif ('avis' == $screen->post_type){
		$title = 'Entrez le nom du Stagiaire/Formateur';
		return $title;
	} elseif ('tiers-lieux' == $screen->post_type){
		$title = 'Entrez le nom du Tiers-Lieux';
		return $title;
	}

	
}

add_filter('enter_title_here', 'wpm_change_title_cpt');

