<?php

/**
 * Template Name: Archive template
 **/

//ALL thematiques 
$thematiques = get_terms('thematique', array('hide_empty' => false));

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
//CURENT thematiques 
$terms = get_the_terms($my_posts->ID, 'thematique');

//Parse URL
$url = $_SERVER['REQUEST_URI'];
$segments = explode('thematique', $url);
$slug = end($segments);
$slugThematique  = trim($slug, '/');
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

            <!--___FILTERBAR AFFICHAGE (FORM)___-->
            <div id="filterbar">
                <h3>Choisir une thématique</h3>

                <form id="formFilter" method="get">
                    <select name="thematique" id="thematique">
                        <? if (isset($_GET['thematique'])) : ?>
                            <option value="all">Toutes les formations</option>
                            <? foreach ($thematiques as $term) : ?>
                                <? if ($_GET['thematique'] === $term->slug) : ?>
                                    <option value="<? echo $term->slug ?>" selected><? echo $term->name ?></option>
                                <? else : ?>
                                    <option value="<? echo $term->slug ?>"><? echo $term->name ?></option>
                                <? endif; ?>
                            <? endforeach; ?>
                        <? else : ?>
                            <? if ($slugThematique !== "formations") : ?>
                                <option value="all">Toutes les formations</option>
                                <? foreach ($thematiques as $term) : ?>
                                    <? if ($slugThematique === $term->slug) : ?>
                                        <option value="<? echo $term->slug ?>" selected><? echo $term->name ?></option>
                                    <? else : ?>
                                        <option value="<? echo $term->slug ?>"><? echo $term->name ?></option>
                                    <? endif; ?>
                                <? endforeach; ?>
                            <? else : ?>
                                <option value="all" selected>Toutes les formations</option>
                                <? foreach ($thematiques as $term) : ?>
                                    <option value="<? echo $term->slug ?>"><? echo $term->name ?></option>
                                <? endforeach; ?>
                            <? endif; ?>
                        <? endif; ?>
                    </select>
                    <input type="submit" value="Filtrer">
                </form>
            </div>

            <?
            /*
            * @my_posts => Get the articles with the thematique equals choice user in filterbar
            */

            /*___FILTERBAR_PROCESSING___*/


            /* LOGIQUE */
            if (isset($_GET['thematique'])) {
                if ($_GET['thematique'] !== "all") {
                    foreach ($thematiques as $thematique) :
                        if ($thematique->slug === $_GET['thematique']) {
                            $my_posts = new WP_Query(array(
                                'post_type' => 'formations',
                                'thematique' => $_GET['thematique']
                            ));
                            break;
                        }
                    endforeach;
                } else {
                    $my_posts = new WP_Query(array('post_type' => 'formations'));
                }
            } else {
                if ($slugThematique !== "formations") {
                    $my_posts = new WP_Query(array(
                        'post_type' => 'formations',
                        'thematique' => $slugThematique
                    ));
                } else {
                    $my_posts = new WP_Query(array('post_type' => 'formations'));
                }
            }

/*             if ($_GET['thematique'] === "all") {
                wp_safe_redirect('http://cedille-formation.ftalps.fr/formations/', 302, $my_posts);

                exit;
            }
 */
            ?>
            <!--___OUTPUT___-->
            <?
            ?>
            <div id="carte_Formation">
                <?php
                if ($my_posts->have_posts()) :
                    while ($my_posts->have_posts()) : $my_posts->the_post(); ?>
                        <div class="carte">
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
                    <p>Aucune formations n'a été trouvé dans cette thématique.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <?php get_footer(); ?>
    </footer>
    <script>
    </script>
</body>

</html>