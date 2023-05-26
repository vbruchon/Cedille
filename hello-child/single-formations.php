<?php

/**
 * Template Name: Single Formation
 * Template Post Type: formations 
 */

$icone = [
    'euros' => '/wp-content/themes/hello-child/assets/images/single_formation/euro.png',
    'time' => '/wp-content/themes/hello-child/assets/images/single_formation/lhorloge-150x150.png',
    'objectif' => '/wp-content/themes/hello-child/assets/images/single_formation/objectif.png',
    'public' => '/wp-content/themes/hello-child/assets/images/single_formation/groupe-dutilisateurs.png',
    'content' => '/wp-content/themes/hello-child/assets/images/single_formation/liste-de-controle.png',
    'teachers' => '/wp-content/themes/hello-child/assets/images/single_formation/male-teacher.png',
    'modalities' => '/wp-content/themes/hello-child/assets/images/single_formation/settings-Smartline-150x150.png',
    'evaluations' => '/wp-content/themes/hello-child/assets/images/single_formation/suivi-150x150.png',
    'access_time' => '/wp-content/themes/hello-child/assets/images/single_formation/temps-restant.png',
    'accessibilites' => '/wp-content/themes/hello-child/assets/images/single_formation/accessibilite.png',
    'others' => '/wp-content/themes/hello-child/assets/images/single_formation/classeurs.png',
    'satisfaction' => '/wp-content/themes/hello-child/assets/images/single_formation/la-satisfaction.png',
    'calendar' => '/wp-content/themes/hello-child/assets/images/single_formation/calendrier.png',
    'galery' => '/wp-content/themes/hello-child/assets/images/single_formation/galerie.png'
];




$terms = get_the_terms($post->ID, 'thematique');
$link = get_term_link($terms[0]->term_id);
$tax_query = array(
    'taxonomy' => 'thematique',
    'field' => 'slug',
    'terms' => $terms[0]->slug,
);
$params = array('post_type' => 'formations', 'tax_query' => array($tax_query), 'posts_per_page' => 3);
$othersFormation = new WP_Query($params);
$currentID = get_the_ID();

// Récupérer l'ID de la formation actuelle
$formation_id = get_the_ID();

// Récupérer tous les champs du groupe "Gallery" pour la formation actuelle
$gallery_fields = get_fields($formation_id);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
    <!--     <link type="text/css" rel="stylesheet" href="./node_modules/lightgallery/css/lightgallery.css" />
    <link type="text/css" rel="stylesheet" href="./node_modules/lightgallery/css/lg-zoom.css" />
    <link type="text/css" rel="stylesheet" href="./node_modules/lightgallery/css/lg-thumbnail.css" />
Inclure les fichiers JavaScript de lightGallery 
    <script src="./node_modules/lightgallery/js/lightgallery.min.js"></script>
    <script src="./node_modules/lightgallery/plugins/lg-zoom.umd.js"></script>
    <script src="./node_modules/lightgallery/plugins/lg-thumbnail.umd.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" integrity="sha512-F2E+YYE1gkt0T5TVajAslgDfTEUQKtlu4ralVq78ViNxhKXQLrgQLLie8u1tVdG2vWnB3ute4hcdbiBtvJQh0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css" integrity="sha512-GRxDpj/bx6/I4y6h2LE5rbGaqRcbTu4dYhaTewlS8Nh9hm/akYprvOTZD7GR+FRCALiKfe8u1gjvWEEGEtoR6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css" integrity="sha512-vIrTyLijDDcUJrQGs1jduUCSVa3+A2DaWpVfNyj4lmXkqURVQJ8LL62nebC388QV3P4yFBSt/ViDX8LRW0U6uw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js" integrity="sha512-dSI4QnNeaXiNEjX2N8bkb16B7aMu/8SI5/rE6NIa3Hr/HnWUO+EAZpizN2JQJrXuvU7z0HTgpBVk/sfGd0oW+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js" integrity="sha512-Jx+orEb1KJtJ6Ajfshhr7is0zqgUC7H9ylk76KMtB9Ea2WAf/Muyzpe9zvBAYQQQKdAbj+rNYEorsRQLsmRafA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js" integrity="sha512-BfC/MaayF9sOZyn1bs1R1P8dEugU7v0j5Qu2FeWVfF/rhKUKZBD9kgNqRNinefIp9zAE7g2KhlwwhMpl5V1jMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <header>
        <? get_header() ?>
    </header>
    <div class="global_css">
        <? echo do_shortcode('[elementor-template id="1521"]'); ?>

        <body>
            <div id="single_formation_titre">
                <h2><? the_title() ?></h2>
            </div>
            <div id="filArianne">
                <a class="all" href="http://cedille-formation.ftalps.fr/formations/">Toutes les formations </a>
                <a class="thematique" href="<? echo $link ?>"><? echo $terms[0]->name ?></a>
            </div>
            <main id="single_formation_main">

                <? if (have_posts()) : ?>
                    <? while (have_posts()) : the_post(); ?>
                        <div id="single_formation_sidebar_left">

                            <div class="single_formation_thumbnail">
                                <?php the_post_thumbnail() ?>
                            </div>
                            <div id="single_formation_h1">
                                <h1><?php echo the_field('formation_name') ?></h1>
                            </div>

                            <div id="slidebar_element">
                                <div id="single_formation_tarif">
                                    <img class="single_formation_icone" src="<? echo $icone['euros'] ?>" alt="Pile de pièce de monnaie">
                                    <p><? echo the_field('tarif_formation') ?> </p>
                                </div>

                                <div id="single_formation_duree">
                                    <img class="single_formation_icone" src="<? echo $icone['time'] ?>" alt="">
                                    <p><? echo the_field('duree_formation') ?> heures</p>
                                </div>

                                <div id="single_formation_bloc_contact">
                                    <p>Besoin d’adapter cette formation à vos besoins ?</p>
                                    <p>N’hésitez pas à nous contacter afin d’obtenir un devis sur mesure ! </p>
                                    <!-- <button id="openPopup" onclick="openPopup()">Nous contacter</button> -->
                                    <? echo do_shortcode('[elementor-template id="1526"]') ?>
                                </div>
                            </div>
                        </div>

                        <div id="single_formation_content">
                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone" src="<? echo $icone['objectif'] ?>" alt="Cible">
                                    <h2>LES OBJECTIFS DE LA FORMATION</h2>
                                </div>
                                <p><? echo the_field('objectif_formation') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone" src="<? echo $icone['public'] ?>" alt="Foule d'utilisateurs">
                                    <h2>PROFIL DU PUBLIC CONCERNÉ</h2>
                                </div>
                                <h3>TYPE DE PUBLIC</h3>
                                <p><? echo the_field('type_public') ?></p>
                                <br />
                                <h3>PRÉ-REQUIS</h3>
                                <p><? echo the_field('pre-requis') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone" src="<? echo $icone['content'] ?>" alt="To Do List">
                                    <h2>CONTENU DE LA FORMATION</h2>
                                </div>
                                <p><? echo the_field('formation_content') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone" src="<? echo $icone['teachers'] ?>" alt="Icône d'un homme en cravate">
                                    <h2>LES INTERVENANTS</h2>
                                </div>
                                <p><? echo the_field('teachers') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone" src="<? echo $icone['modalities'] ?>" alt="main tenant une roue denté">
                                    <h2>LES MODALITÉS</h2>
                                </div>
                                <h3>Les modalités Pedagogiques</h3>
                                <p><? echo the_field('modalites_pedagogiques') ?></p> <br>
                                <h3>Les Modalités Techniques</h3>
                                <p><? echo the_field('modalites_techniques') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone" src="<? echo $icone['evaluations'] ?>" alt="point relié par un trait à un drapeau">
                                    <h2>SUIVI & ÉVALUATIONS</h2>
                                </div>
                                <p><? echo the_field('evaluation') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone2" src="<? echo $icone['access_time'] ?>" alt="Horloge">
                                    <h2>CONDITIONS ET DÉLAIS D'ACCÈS</h2>
                                </div>
                                <p><? echo the_field('delai_acces') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone2" src="<? echo $icone['accessibilites'] ?>" alt="Logo accessibilités (personnage bland entoourré d'un riond)">
                                    <h2>ACCESSIBILITÉ</h2>
                                </div>
                                <p><? echo the_field('accessibilites') ?></p>
                            </div>
                            <? if (get_field('future_session') !== false) : ?>
                                <div class="single_formation_block">
                                    <div class="single_formation_block_title">
                                        <img class="single_formation_icone" src="<? echo $icone['calendar'] ?>" alt="Pictogramme d'un calendrier">
                                        <h2>PROCHAINE SESSION</h2>
                                    </div>
                                    <p><? echo the_field('future_session') ?></p>
                                </div>
                            <? endif; ?>
                            <? if (get_field('taux_satisfaction') !== "") : ?>
                                <div id="satisfaction">
                                    <img class="single_formation_icone" src="<? echo $icone['satisfaction'] ?>" alt="taux de satisfaction">
                                    <p><strong><? echo the_field('taux_satisfaction'); ?>%</strong> taux de satisfaction</p>
                                </div>
                            <? endif;

                            // Vérifier si le groupe de champs existe et s'il contient des images
                            if ($gallery_fields['image']) {
                                echo '<div class="single_formation_block">';
                                echo '<div class="single_formation_block_title">';
                                echo '<img class="single_formation_icone" src="' . $icone["galery"] . '" alt="Pictogramme d\'une galerie">';
                                echo '<h2>Gallerie</h2>';
                                echo '</div>';
                                echo '<div id="lightgallery">'; // Div parent pour LightGallery
                                foreach ($gallery_fields as $key => $value) {
                                    if (strpos($key, 'image') !== false && !empty($value)) {
                                        echo '<a href="' . wp_get_attachment_image_url($value['ID'], 'large') . '" data-src="' . wp_get_attachment_image_url($value['ID'], 'large') . '">';
                                        echo wp_get_attachment_image($value['ID'], 'thumbnail');
                                        echo '</a>';
                                    }
                                }
                                echo '</div>';
                                echo '</div>';
                            }

                            if ($othersFormation->have_posts() && $othersFormation->post_count > 1) : ?>
                                <div class="single_formation_block_title_formation">
                                    <img class="single_formation_icone3" src="<? echo $icone['others'] ?>" alt="icône de 3 classeurs">
                                    <h2>Ces formations peuvent vous intéresser : </h2>
                                </div>
                            <? endif; ?>
                            <div id="single_formation_carte_Formation">
                                <? if ($othersFormation->have_posts()) :
                                    while ($othersFormation->have_posts()) : $othersFormation->the_post();
                                        $postID = get_the_ID();
                                        if ($currentID !== $postID) :  ?>
                                            <div class="single_formation_carte" onclick="window.location.href ='<? the_permalink() ?>'">
                                                <div class="single_formation_carte_img">
                                                    <?php the_post_thumbnail(); ?>
                                                </div>
                                                <h2 class="single_formation_carte_title">
                                                    <?php the_title(); ?>
                                                </h2>
                                                <button id="single_formation_link_formation" onclick="window.location.href = '<? the_permalink() ?>'">Découvrir la formation</button>
                                            </div>
                                    <? endif;
                                    endwhile;

                                else : ?>
                                    <p>Aucune formation n'a été trouvé dans cette catégorie.</p>
                                <? endif; ?>

                            </div>
                        </div>
                    <? endwhile; ?>
                <? else : ?>
                    <p>Cette formation n'as pas encore de programme ou n'existe pas.</p>
                <? endif ?>
            </main>
            <script>
                // Utiliser lightGallery
                lightGallery(document.getElementById('lightgallery'), {
                    plugins: [lgThumbnail, lgZoom],
                    speed: 500,
                    counter: true,
                    controls: true,
                    // ... autres paramètres
                });
            </script>
        </body>
        <footer id="footer">
            <? get_footer() ?>
        </footer>
    </div>
</body>

</html>