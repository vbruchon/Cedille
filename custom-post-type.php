<?

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

function formation_custom_post_type()
{
    //CPT
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
        'categories'           => __('Thématiques')
    );

    $args = array(
        'label'               => __('Formations'),
        'labels'              => $labels,
        'menu_position'          => 4,
        'menu_icon'            => 'dashicons-welcome-learn-more',
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
        /* options supplémentaires */
        'show_in_rest'          => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'              => array('slug' => 'formations'),
    );
    register_post_type('formations', $args);

    //Taxonomy
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

    //Taxonomy
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
}


function tierslieux_custom_post_type()
{
    //CPT
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
        'menu_position'          => 5,
        'menu_icon'           => 'dashicons-admin-multisite',
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
        /* options supplémentaires */
        'show_in_rest'           => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'          => array('slug' => 'tiers-lieux'),
    );
    register_post_type('tiers-lieux', $args);
}


function advices_custom_post_type()
{
    //CPT
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
        'categories'           => __('Thématiques')
    );

    $args = array(
        'label'               => __('Avis'),
        'labels'              => $labels,
        'menu_position'          => 6,
        'menu_icon'      => 'dashicons-admin-comments',
        'supports'            => array('title', 'custom-fields',),
        'show_in_rest'           => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'              => array('slug' => 'avis'),
    );
    register_post_type('avis', $args);
}


function contact_custom_post_type()
{
    //CPT
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
        'menu_position'          => 7,
        'menu_icon'           => 'dashicons-whatsapp',
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
        /* options supplémentaires */
        'show_in_rest'           => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'          => array('slug' => 'contact'),
    );
    register_post_type('contact', $args);

    //Taxonomy
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
add_action('after_setup_theme', 'formation_custom_post_type', 0);
add_action('after_setup_theme', 'tierslieux_custom_post_type', 0);
add_action('after_setup_theme', 'advices_custom_post_type', 0);
add_action('after_setup_theme', 'contact_custom_post_type', 0);
