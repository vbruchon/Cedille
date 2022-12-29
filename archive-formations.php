<?php

/**
 * Template Name: Page des formations
 **/
?>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
    <meta name="viewport" content="width:device-width, initial-scale=1">
</head>


<?php get_header(); ?>
<div class="global_css">

    <h1 id="archive_formation_title">Nos Formations</h1>

    <div id="filterbar">
        <p>barre de filtre</p>
    </div>

    <?php
    /*
 * @my_posts => Get the articles with the category "les-editions".
 */
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
    $size_img_couverture = [200, 200];

    $my_posts = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '150'));
    ?>

    <div id="carte_Formation">
        <?php
        if ($my_posts->have_posts()) :
            while ($my_posts->have_posts()) : $my_posts->the_post();
                $terms = get_the_terms($my_posts->ID, 'thematique');
                $i = 0; ?>

                <div class="carte">
                    <div class="category">
                        <?
                            foreach($thematiques as $thematique){
                                if($terms[0]->slug === $thematique){?>
                                    <div class="icone_category">
                                        <img src="<? echo $pictoThematique[$terms[0]->slug] ?>" alt="icône <? echo $thematique?>">
                                    </div>
                                    <div class="name_category">
                                        <p><? echo $terms[0]->name ?></p>
                                    </div>
                                <?}
                            }
                        ?>
                    </div>
                    <div class="carte_img">
                        <?php the_post_thumbnail($size_img_couverture); ?>
                    </div>
                    <h2 class="carte_title">
                        <?php the_title(); ?>
                    </h2>
                    <button id="link_formation" onclick="window.location.href = '<? the_permalink() ?>'">Découvrir la formation</button>
                </div>
            <?php endwhile; ?>

        <?php else : ?>
            <p>Aucun article n'a été trouvé.</p>
        <?php endif; ?>

    </div>




</div>
<?php get_footer(); ?>
</div>

<?
/*  while ($terms[0]->slug !== $thematique[$i]) {
                            $i++;
                        }
                            if ($terms[0]->slug === $thematique[$i]) { ?>
                                <p class="picto+thematique"><? echo the_title() ?> ( <? echo the_terms($advices->ID, 'thematique') ?> )</p>
                        <?
                            } else {
                                $pictoThematique = [];
                            }
                        }
                        for ($i = 0; $i !== sizeof($thematique); $i + 1) {
                            if ($terms === $thematique[$i]) {
                            }
                        } */?>