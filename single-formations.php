<?php

/**
 * Template Name: Single Formation
 * Template Post Type: formations 
 */

$icone = [
    'euros' => '/wp-content/themes/hello-elementor/assets/images/single_formation/euro.png',
    'time' => '/wp-content/themes/hello-elementor/assets/images/single_formation/lhorloge-150x150.png',
    'objectif' => '/wp-content/themes/hello-elementor/assets/images/single_formation/objectif.png',
    'public' => '/wp-content/themes/hello-elementor/assets/images/single_formation/groupe-dutilisateurs.png',
    'content' => '/wp-content/themes/hello-elementor/assets/images/single_formation/liste-de-controle.png',
    'teachers' => '/wp-content/themes/hello-elementor/assets/images/single_formation/male-teacher.png',
    'modalities' => '/wp-content/themes/hello-elementor/assets/images/single_formation/settings-Smartline-150x150.png',
    'evaluations' => '/wp-content/themes/hello-elementor/assets/images/single_formation/suivi-150x150.png',
    'access_time' => '/wp-content/themes/hello-elementor/assets/images/single_formation/temps-restant.png',
    'accessibilites' => '/wp-content/themes/hello-elementor/assets/images/single_formation/accessibilite.png',
    'others' => '/wp-content/themes/hello-elementor/assets/images/single_formation/classeurs.png',
    'satisfaction' => '/wp-content/themes/hello-elementor/assets/images/single_formation/la-satisfaction.png'
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
    <meta name="description" content="Bienvenue sur le programme de formation de <?php the_title() ?>. 
    Vous retrouverez ici toutes les informations utiles comme le prix, la durée, les compétences, etc.">
    <script>
        function openPopup() {
            let popup = `<? echo do_shortcode('[elementor-template id="1521"]'); ?>`;
            let body = document.body;
            const div = document.createElement('div');
            div.innerHTML = `<? echo do_shortcode('[elementor-template id="1521"]'); ?>`;
            body.appendChild(div);
        }
    </script>
</head>

<body>

    <header>
        <? get_header() ?>
    </header>
    <div class="global_css">
        <? echo do_shortcode('[elementor-template id="1521"]'); ?>

        <body>
            <div id="single_formation_titre">
                <h2>PROGRAMME DE LA FORMATION</h2>
            </div>
            <div id="filArianne">
                <a class="all" href="http://cedille-formation.ftalps.fr/formations/">Toutes les formations </a>
                <p> > </p><a class="thematique" href="<? echo $link ?>"><? echo $terms[0]->name ?></a>
            </div>
            <main id="single_formation_main">

                <? if (have_posts()) : ?>
                    <? while (have_posts()) : the_post(); ?>
                        <div id="single_formation_sidebar_left">

                            <div class="single_formation_thumbnail">
                                <?php the_post_thumbnail() ?>
                            </div>
                            <div id="single_formation_h1">
                                <h1><?php the_title() ?></h1>
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
                                    <h2>DÉLAI D'ACCÉS</h2>
                                </div>
                                <p><? echo the_field('delai_acces') ?></p>
                            </div>

                            <div class="single_formation_block">
                                <div class="single_formation_block_title">
                                    <img class="single_formation_icone2" src="<? echo $icone['accessibilites'] ?>" alt="Logo accessibilités (personnage bland entoourré d'un riond)">
                                    <h2>ACCESSIBILITÉS</h2>
                                </div>
                                <p><? echo the_field('accessibilites') ?></p>
                            </div>

                            <? if (the_field('taux_satisfaction')) : ?>
                                <div id="satisfaction">
                                    <img class="single_formation_icone" src="<? echo $icone['satisfaction'] ?>" alt="taux de satisfaction">
                                    <p><strong><? echo the_field('taux_satisfaction') ?>% </strong> taux de satisfaction</p>
                                </div>
                            <? endif; ?>
                            
                            <? if ($othersFormation->have_posts() && $othersFormation->post_count > 1) : ?>
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
        </body>
        <footer id="footer">
            <? get_footer() ?>
        </footer>
    </div>
</body>

</html>