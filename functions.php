<?php

/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_VERSION', '2.6.1');

if (!isset($content_width)) {
	$content_width = 800; // Pixels.
}

if (!function_exists('hello_elementor_setup')) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup()
	{
		if (is_admin()) {
			hello_maybe_update_theme_version_in_db();
		}

		$hook_result = apply_filters_deprecated('elementor_hello_theme_load_textdomain', [true], '2.0', 'hello_elementor_load_textdomain');
		if (apply_filters('hello_elementor_load_textdomain', $hook_result)) {
			load_theme_textdomain('hello-elementor', get_template_directory() . '/languages');
		}

		$hook_result = apply_filters_deprecated('elementor_hello_theme_register_menus', [true], '2.0', 'hello_elementor_register_menus');
		if (apply_filters('hello_elementor_register_menus', $hook_result)) {
			register_nav_menus(['menu-1' => __('Header', 'hello-elementor')]);
			register_nav_menus(['menu-2' => __('Footer', 'hello-elementor')]);
		}

		$hook_result = apply_filters_deprecated('elementor_hello_theme_add_theme_support', [true], '2.0', 'hello_elementor_add_theme_support');
		if (apply_filters('hello_elementor_add_theme_support', $hook_result)) {
			add_theme_support('post-thumbnails');
			add_theme_support('automatic-feed-links');
			add_theme_support('title-tag');
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
			add_editor_style('classic-editor.css');

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support('align-wide');

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated('elementor_hello_theme_add_woocommerce_support', [true], '2.0', 'hello_elementor_add_woocommerce_support');
			if (apply_filters('hello_elementor_add_woocommerce_support', $hook_result)) {
				// WooCommerce in general.
				add_theme_support('woocommerce');
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support('wc-product-gallery-zoom');
				// lightbox.
				add_theme_support('wc-product-gallery-lightbox');
				// swipe.
				add_theme_support('wc-product-gallery-slider');
			}
		}
	}
}
add_action('after_setup_theme', 'hello_elementor_setup');

function hello_maybe_update_theme_version_in_db()
{
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option($theme_version_option_name);

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if (!$hello_theme_db_version || version_compare($hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<')) {
		update_option($theme_version_option_name, HELLO_ELEMENTOR_VERSION);
	}
}

if (!function_exists('hello_elementor_scripts_styles')) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles()
	{
		$enqueue_basic_style = apply_filters_deprecated('elementor_hello_theme_enqueue_style', [true], '2.0', 'hello_elementor_enqueue_style');
		$min_suffix          = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		if (apply_filters('hello_elementor_enqueue_style', $enqueue_basic_style)) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if (apply_filters('hello_elementor_enqueue_theme_style', true)) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action('wp_enqueue_scripts', 'hello_elementor_scripts_styles');

if (!function_exists('hello_elementor_register_elementor_locations')) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations($elementor_theme_manager)
	{
		$hook_result = apply_filters_deprecated('elementor_hello_theme_register_elementor_locations', [true], '2.0', 'hello_elementor_register_elementor_locations');
		if (apply_filters('hello_elementor_register_elementor_locations', $hook_result)) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action('elementor/theme/register_locations', 'hello_elementor_register_elementor_locations');

if (!function_exists('hello_elementor_content_width')) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width()
	{
		$GLOBALS['content_width'] = apply_filters('hello_elementor_content_width', 800);
	}
}
add_action('after_setup_theme', 'hello_elementor_content_width', 0);

if (is_admin()) {
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
function hello_register_customizer_functions()
{
	if (is_customize_preview()) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action('init', 'hello_register_customizer_functions');

if (!function_exists('hello_elementor_check_hide_title')) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title($val)
	{
		if (defined('ELEMENTOR_VERSION')) {
			$current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
			if ($current_doc && 'yes' === $current_doc->get_settings('hide_title')) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter('hello_elementor_page_title', 'hello_elementor_check_hide_title');

/**
 * Wrapper function to deal with backwards compatibility.
 */
if (!function_exists('hello_elementor_body_open')) {
	function hello_elementor_body_open()
	{
		if (function_exists('wp_body_open')) {
			wp_body_open();
		} else {
			do_action('wp_body_open');
		}
	}
}

//------------------------------MY_CODE----------------------------------------------------------
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
function wpm_custom_post_type()
{
	/*______________________CREATE Custom Post Type____________________*/

	/*_____CPT_FORMATIONS________*/

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
		'menu_position'		  => 4,
		'menu_icon'      	  => 'dashicons-welcome-learn-more',
		'supports'            => array('title', 'thumbnail', 'custom-fields'),
		/* options supplémentaires */
		'show_in_rest'	      => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'formations'),
	);
	register_post_type('formations', $args);


	/*_____TIERS-LIEUX_____*/

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
		'menu_position'	      => 5,
		'menu_icon'           => 'dashicons-admin-multisite',
		'supports'            => array('title', 'thumbnail', 'custom-fields'),
		/* options supplémentaires */
		'show_in_rest' 	      => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'	      => array('slug' => 'tiers-lieux'),
	);
	register_post_type('tiers-lieux', $args);

	/*_____AVIS_____*/

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
		'menu_position'		  => 6,
		'menu_icon'      => 'dashicons-admin-comments',
		'supports'            => array('title', 'custom-fields',),
		'show_in_rest' 		  => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'avis'),
	);
	register_post_type('avis', $args);

	/*_____CONTACT_____*/

	$labels = array(
		'name' => _x('Contacts', 'Post Type General Name'),
		'singular_name'       => _x('Contact', 'Post Type Singular Name'),
		'menu_name'           => __('Contact'),
		// Les différents libellés de l'administration 		
		'all_items'           => __('Tous les moyen de contact'),
		'view_item'           => __('Voir les moyen de contact'),
		'add_new_item'        => __('Ajouter un nouveau moyen de contact'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer le moyen de contact'),
		'update_item'         => __('Modifier le moyen de contact'),
		'search_items'        => __('Rechercher un moyen de contact'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
	);

	$args = array(
		'label'               => __('Contact'),
		'labels'              => $labels,
		'menu_position'	      => 7,
		'menu_icon'           => 'dashicons-whatsapp',
		'supports'            => array('title', 'thumbnail', 'custom-fields'),
		/* options supplémentaires */
		'show_in_rest' 	      => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'	      => array('slug' => 'contact'),
	);
	register_post_type('contact', $args);


	/*______________________CREATE CUSTOM TAXONOMY____________________*/

	/*_____FORMATIONS________*/

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


	$labels = array(
		'name' => 'Formats',
		'new_item_name' => 'Nouveau format',
		'parent_item' => 'Format parents',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
	);
	register_taxonomy('format', 'formations', $args);

	/*_____AVIS_____*/

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
}

add_action('init', 'wpm_custom_post_type', 0);


function gkp_add_post_thumbnail()
{
	add_theme_support('post-thumbnails', array('post', 'page', 'formations'));
	add_theme_support('post-thumbnails', array('post', 'page', 'tiers-lieux'));
}
add_action('after_theme_setup', 'gkp_add_post_thumbnail');


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
	} elseif ('avis' == $screen->post_type) {
		$title = 'Entrez le nom du Stagiaire/Formateur';
		return $title;
	} elseif ('tiers-lieux' == $screen->post_type) {
		$title = 'Entrez le nom du Tiers-Lieux';
		return $title;
	} elseif ('contact' == $screen->post_type) {
		$title = 'Entrez le moyen de contact';
		return $title;
	}
}
add_filter('enter_title_here', 'wpm_change_title_cpt');


function my_theme_enqueue_styles()
{
	// CSS & JS files
	wp_enqueue_script('jquery-min-js', get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), '1.11.0');

	//My custom JS
	wp_enqueue_script('carousel-js', get_template_directory_uri() . '/assets/js/carousel-js.js', array(), '1.0.0');
	wp_enqueue_script('caroussel-advices-js', get_template_directory_uri() . '/assets/js/caroussel-advices-js.js', array(), '1.0.0');

	//My custom CSS
	wp_register_style('archive-css', get_template_directory_uri() . '/assets/css/archive.css', '1.0.0');
	wp_register_style('single-formations-css', get_template_directory_uri() . '/assets/css/single-formations.css', '1.0.0');
	wp_register_style('carousel-css', get_template_directory_uri() . '/assets/css/carousel.css', '1.0.0');
	wp_register_style('carouselAdvices-css', get_template_directory_uri() . '/assets/css/carouselAdvices-css.css', '1.0.0');
	wp_register_style('all-thematique-css', get_template_directory_uri() . '/assets/css/all-thematique.css', '1.0.0');
	wp_register_style('contact-css', get_template_directory_uri() . '/assets/css/contact-css.css', '1.0.0');

	// Enqueue all CSS & JS files
	wp_enqueue_script('jquery-min-js');
	wp_enqueue_script('carousel-js');
	wp_enqueue_script('caroussel-advices-js');

	wp_enqueue_style('carousel-css');
	wp_enqueue_style('carouselAdvices-css');
	wp_enqueue_style('all-thematique-css');
	wp_enqueue_style('contact-css');
	wp_enqueue_style('archive-css');
	wp_enqueue_style('single-formations-css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function shortcode_carousel_TL()
{ ?>
	<div id="container">
		<?
		$params = array('post_type' => 'tiers-lieux', 'orderby' => 'post_date', 'order' => 'ASC');
		$tiers_lieux = new WP_Query($params);

		if (!$tiers_lieux->have_posts())
			return false;
		else while ($tiers_lieux->have_posts()) : $tiers_lieux->the_post(); ?>
			<div class="element">
				<div class="logo"><a href="<? the_field('website_tl') ?>" target="_blank"><? the_post_thumbnail() ?></a></div>
			</div>
		<? endwhile; ?>
	</div>
	<script src="./assets/js/carousel-js.js"></script>
	<?
}
add_shortcode('tiers-lieux_caroussel', 'shortcode_carousel_TL');

function shortcode_Advices($atts)
{
	$contentField = 'avis_content';
	$formationName = 'avis_nameFormation';
	//Je récupère mon paramètres de mon short-code
	$a = shortcode_atts(array('auteur' => '#'), $atts);
	//J'utilise ce paramètre pour l'utiliser en tant que term voulue
	$tax_query = array(
		'taxonomy' => 'auteur',
		'field' => 'name',
		'terms' => $a['auteur']
	);
	//J'ajoute à mes params ma tax_query comportant en term le paramètre saisie par le user
	$params = array('post_type' => 'avis', 'tax_query' => array($tax_query));
	//Je fais ma requête en lui passant les params créer
	$advices = new WP_Query($params);

	if (!$advices->have_posts()) :
		return "Aucun avis trouvé";
	else :
		if ($a['auteur'] === "Stagiaire") {
			echo '<div id="adviceCaroussel_Stagiaire">';
		} else {
			echo '<div id="adviceCaroussel_Formateur">';
		}
		for ($i = 0; $i !== 4; $i++) {
			while ($advices->have_posts()) : $advices->the_post();
				if ($a['auteur'] === "Stagiaire") {
					echo '<div class="element">';
					echo '<div class="avis_Stagiaire">';
				} else {
					echo '<div class="element">';
					echo '<div class="avis_Formateur">';
				}
	?>
				<h2 class="formation_name"><? echo the_field($formationName) ?></h2>
				<div class="content">
					<img class="img1" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/quote.png" alt="quote icone">
					<p class="the_field"><? echo the_field('avis_content') ?></p>
					<img class="img2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/quote.png" alt="quote icone">
				</div>
				<div class="author">
					<? if ($a['auteur'] === "Stagiaire") { ?>
						<img class="author_icone" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/eleve.png" alt="icône stagiaire">
					<? } else { ?>
						<img class="author_icone" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/enseignant-de-sexe-masculin-1.png" alt="icône enseingant">
					<? } ?>
					<p class="author_name"><? echo the_title() ?> ( <? echo the_terms($advices->ID, 'auteur') ?> )</p>
				</div>
				</div>
				</div>
	<? endwhile;
		}

	endif;
	?>
	<script src="./assets/js/carousel-js.js"></script>
<?
}
add_shortcode('advices', 'shortcode_Advices');

function shortcode_contact_element()
{
	$params = array('post_type' => 'contact');
	$contact = new WP_Query($params);

	$fieldPhone = get_field('contact-phone');
	$fieldEmail = get_field('contact-email');

?>
	<!-- 	<div id="contact">
		<div id="phone">
			<img src="http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/phone.png" alt="">
			<div id="phone_number"></div>
		</div>
		<div id="email">
			<img src="http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/email.png" alt="">
			<div id="email_adress"></div>
		</div>
	</div> -->
	<p><? echo $fieldEmail; ?></p>
	<div id="contact">
		<div id="phone">
			<div class="picto-contact">
				<img src="http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/phone.png" alt="">
			</div>
			<div id="phone_number">
				<a href="tel:<? echo $fieldPhone ?>"> 0607965374 </a>
			</div>
		</div>
		<div id="email">
			<div class="picto-contact">
				<img src="http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/email.png" alt="">
			</div>
			<div id="email_adress">
				<a href="mailto:<? the_field('contact-email') ?>">sescandell@lemoulindigital.fr </a>
			</div>
		</div>
	</div>

	<script>
		let phonePicto = document.querySelector("#phone .picto-contact")
		let phoneNumber = document.getElementById("phone_number")
		let emailPicto = document.querySelector("#email .picto-contact")
		let emailNumber = document.getElementById("email_adress")

		phonePicto.addEventListener("click", () => {
			if (phoneNumber.style.display === "flex") {
				phoneNumber.style.display = "none";
			} else {
				phoneNumber.style.display = "flex";
			}
		})

		emailPicto.addEventListener("click", () => {
			if (emailNumber.style.display === "flex") {
				emailNumber.style.display = "none";
			} else {
				emailNumber.style.display = "flex";
			}
		})
	</script>


	<!-- 	<link rel="stylesheet" href="contact.css">
	<?

	/* $params = array('post_type' => 'contact');
	$contact = new WP_Query($params); */ ?>
	<div id="contact">
		<div id="phone">
			<a href="tel:<? //echo the_field("contact-phone") 
							?>"><img src="http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/phone.png" alt=""></a>
		</div>
		<div id="email">
			<a href="mailto:<? //echo the_field("contact-email") 
							?>"><img src="http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/email.png" alt=""></a>
		</div>
	</div> -->
<?
}
add_shortcode('contact_element', 'shortcode_contact_element');


function shortcode_thematique_home_page()
{
?>
	<div id="all">

		<?
		$pictoThematique = [
			'bureautique' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/ordinateur.png',
			'communication' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/le-marketing-numerique.png',
			'cuisine' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/Frame_35_1_-removebg-preview.png',
			'developpement-personnel' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/promotion.png',
			'divers' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/pensez-autrement.png',
			'graphique' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/design-creatif.png',
			'management' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/management.png',
			'numerique' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/surveiller-la-tablette-et-le-smartphone.png'
		];
		$thematiques = get_terms('thematique', array('hide_empty' => false, 'post_per_page' => 8));
		$i = 0;

		foreach ($thematiques as $t) :

			if ($i !== 8) :
		?>
				<div class="card">
					<a href="<? echo get_term_link($t) ?>">
						<div class="picto">
							<img src="<? echo ($pictoThematique[$t->slug]) ?>" alt="picto " + <? echo ($pictoThematique[$t->slug]) ?>>
						</div>

						<div class="term">
							<? echo $t->name ?>
						</div>
					</a>
				</div>
		<?
				$i++;
			endif;
		endforeach;
		?>
	</div>
<?
}
add_shortcode('all-thematique', 'shortcode_thematique_home_page');
