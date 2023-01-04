<?php

/**
 * Template Name: Page des formations
 **/

$thematiques = [
    'bureautique',
    'communication',
    'cuisine',
    'developpement-personnel',
    'divers',
    'graphique',
    'management',
    'numerique'
];
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
$size_img_couverture = [400, 200];

/*
* @my_posts => Get the articles with the category "les-editions".
*/
$my_posts = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '150'));
$terms = get_the_terms($my_posts->ID, 'thematique');
$i = 0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
</head>

<body>
    <header>
        <?php get_header(); ?>
    </header>

    <main>
        <div class="global_css">
            <h1 id="archive_formation_title">Nos Formations</h1>

            <div id="filterbar">
                <p>barre de filtre</p>
            </div>

            <div id="carte_Formation">
                <?php
                if ($my_posts->have_posts()) :
                    while ($my_posts->have_posts()) : $my_posts->the_post(); ?>
                        <div class="carte">
                            <?
                            foreach ($thematiques as $thematique) :
                                if ($terms[0]->slug === $thematique) : ?>
                                    <div class="category">
                                        <img class="icone_category" src="<? echo $pictoThematique[$terms[$i]->slug] ?>" alt="icône <? echo $thematique ?>">
                                        <p class="name_category"><? echo $terms[$i]->name ?></p>
                                    </div>
                            <?
                                endif;
                            endforeach;
                            ?>
                            <div class="carte_img">
                                <?php the_post_thumbnail($size_img_couverture); ?>
                            </div>
                            <h2 class="carte_title">
                                <?php the_title(); ?>
                            </h2>
                            <button class="link_formation" onclick="window.location.href = '<? the_permalink() ?>'">Découvrir la formation</button>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucun article n'a été trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <?php get_footer(); ?>
    </footer>
</body>

</html>