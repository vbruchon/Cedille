<?php

/**
 * Template Name: Archive template
 **/

//ALL thematiques 
$thematiques = get_terms('thematique', array('hide_empty' => false));
$formats = get_terms('format', array('hide_empty' => false));
$valid_formats = array('presentiel', 'distanciel');

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
        <?php
        get_header();
        ?>
    </header>

    <main>
        <div class="global_css">
            <h1 id="archive_formation_title">Nos Formations</h1>

            <!--___FILTERBAR AFFICHAGE (FORM)___-->
            <div id="filterbar">
                <form id="formFilter" method="get">
                    <div id="thema">
                        <label for="thematique">Choisir une thématique : </label>
                        <select name="thematique" id="thematique">

                            <? if (($slugThematique === "formations") && (!(isset($_GET['thematique'])))) : ?>
                                <option value="all" selected>Toutes les formations</option>
                                <? foreach ($thematiques as $term) : ?>
                                    <option value="<? echo $term->slug ?>"><? echo $term->name ?></option>
                                <? endforeach; ?>
                            <? else : ?>
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
                                    <option value="all">Toutes les formations</option>
                                    <? foreach ($thematiques as $term) : ?>
                                        <? if (($slugThematique === $term->slug) && (!(isset($_GET['thematique'])))) : ?>
                                            <option value="<? echo $term->slug ?>" selected><? echo $term->name ?></option>
                                        <? else : ?>
                                            <option value="<? echo $term->slug ?>"><? echo $term->name ?></option>
                                        <? endif; ?>
                                    <? endforeach; ?>
                                <? endif; ?>
                            <? endif; ?>
                        </select>
                    </div>
                    <div id="forma">
                        <label for="format">Choisir un format : </label>
                        <select name="format" id="format">
                            <? if (isset($_GET['format'])) : ?>
                                <option value="all">Tous les formats</option>
                                <? foreach ($formats as $format) : ?>
                                    <? if ($_GET['format'] === $format->slug) : ?>
                                        <option value="<? echo $format->slug ?>" selected><? echo $format->name ?></option>
                                    <? else : ?>
                                        <option value="<? echo $format->slug ?>"><? echo $format->name ?></option>
                                    <? endif; ?>
                                <? endforeach; ?>
                            <? else : ?>
                                <option value="all" selected>Tous les formats</option>
                                <? foreach ($formats as $format) : ?>
                                    <option value="<? echo $format->slug ?>"><? echo $format->name ?></option>
                                <? endforeach; ?>
                            <? endif; ?>
                        </select>
                    </div>
                </form>
                <div id="search">
                    <? echo do_shortcode('[ivory-search id="1171" title="Custom Search Form"]'); ?>
                </div>
            </div>

            <?



            /*___FILTERBAR_PROCESSING___*/
            /*
            * @my_posts => Get the articles with the thematique equals choice user in filterbar
            */


            /*
SI BARRE DE FILTRE UTILISÉ 
    ET LES 2 != ALL
        REQUETE POSTYPE THEMATIQUE FORMAT
    sINON SI THEMATQIUE != ALL ET fORMAT == ALL 
        REQUETE POSTYPE THEMATIQUE
    SINON si  THEMATIQUE == ALL ET format!= ALL 
        REQUETE POSTYPE FORMAT
SINON SI BARRE DE FILTRE PAS UTILISÉ 
    REQUETE POSTYPE
    
SI BARRE DE RECHERCHE EST UTILISÉ 
    REQUETE POSTYPE SEARCH PARAMS
            */

            if (isset($_GET['thematique']) && isset($_GET['format'])) :
                echo $_GET['format'];
                if ($_GET['thematique'] !== "all" && ($_GET['format'] !== "all")) : //OK CA PASSE
                    foreach ($thematiques as $thematique) :
                        if ($thematique->slug === $_GET['thematique']) :
                            foreach ($formats as $format) :
                                if ($format->slug === $_GET['format']) :
                                    $my_posts = new WP_Query(array(
                                        'post_type' => 'formations',
                                        'thematique' => $_GET['thematique'],
                                        'format' => $_GET['format'],
                                    ));
                                    break;
                                endif;
                            endforeach;
                        endif;
                    endforeach;
                elseif ($_GET['thematique'] !== "all" && ($_GET['format'] === "all")) : //OK CA PASSE
                    foreach ($thematiques as $thematique) :
                        if ($thematique->slug === $_GET['thematique']) :
                            $my_posts = new WP_Query(array(
                                'post_type' => 'formations',
                                'thematique' => $_GET['thematique']
                            ));
                            break;
                        endif;
                    endforeach;
                elseif (($_GET['thematique'] === "all") && (in_array($_GET['format'], $valid_formats))) :
                    $my_posts = new WP_Query(array(
                        'post_type' => 'formations',
                        'format' => $_GET['format']
                    ));
                else :
                    $my_posts = new WP_Query(array(
                        'post_type' => 'formations',
                        'format' => $_GET['format']
                    ));
                    var_dump($my_posts);
                endif;
            elseif (isset($_GET['s']) && $_GET['s'] !== "") :
                $search_query = $_GET['s'];
                if (!preg_match("/^[a-zA-Z0-9 ]+$/", $search_query)) :
                    unset($_GET['s']);
                    echo "<script>alert(\"Entrée utilisateur non valide. Veuillez saisir uniquement des chiffres, ou des lettres\")</script>";
                    $my_posts = new WP_Query(array(
                        'post_type' => 'formations'
                    ));
                else :
                    $search_query = esc_sql($search_query);
                    $my_posts = new WP_Query(array('post_type' => 'formations', 's' => $search_query));
                endif;
            elseif (isset($_GET['format']) && !(isset($_GET['thematique']))) :
                if (in_array($_GET['format'], $valid_formats)) :
                    $my_posts = new WP_Query(array(
                        'post_type' => 'formations',
                        'format' => $_GET['format']
                    ));
                endif;
            else :
                $my_posts = new WP_Query(array(
                    'post_type' => 'formations'
                ));
            endif;

            ?>

            <!--___OUTPUT___-->
            <div id="carte_Formation">
                <?php
                if ($my_posts->have_posts()) :
                    while ($my_posts->have_posts()) : $my_posts->the_post(); ?>
                        <div class="carte" onclick="window.location.href ='<? the_permalink() ?>'">
                            <div class="carte_img" href="'<? the_permalink() ?>'">
                                <?php the_post_thumbnail($size_img_couverture); ?>
                            </div>
                            <h2 class="carte_title">
                                <?php the_title(); ?>
                            </h2>
                            <button class="link_formation" onclick="window.location.href ='<? the_permalink() ?>'">Découvrir la formation</button>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucune formations n'a été trouvé dans cette thématique.</p>
                <?php endif; ?>
            </div>
        </div>
        </div>


    </main>
    <footer>
        <?php get_footer(); ?>
    </footer>
    <script>
        $(document).ready(function() {
            $('#thematique, #format').on('change', function(e) {
                e.preventDefault();
                $('#formFilter').submit();
            });
        });
    </script>
</body>

</html>
<?
/*
if ($_GET['thematique'] === "all" && ($_GET['format'] === "all"))







            /* elseif ($_GET['thematique'] !== "all" && ($_GET['format'] === "all")) {
                    foreach ($thematiques as $thematique) {
                        if ($thematique->slug === $_GET['thematique']) {
                            $my_posts = new WP_Query(array(
                                'post_type' => 'formations',
                                'thematique' => $_GET['thematique']
                            ));
                        }
                    }
                } elseif (($_GET['thematique'] === "all") && ($_GET['format'] === "all")) {
                    $my_posts = new WP_Query(array(
                        'post_type' => 'formations'
                    ));
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


            if (isset($_GET['format'])) {
                if ($_GET['format'] !== "all") {
                    foreach ($formats as $format) {
                        if ($format->slug === $_GET['format']) {
                            $my_posts = new WP_Query(array(
                                'post_type' => 'formations',
                                'format' => $_GET['format'],
                            ));
                        }
                    }
                } else {
                    $my_posts = new WP_Query((array('post_type' => 'formations')));
                }
            }

            if (isset($_GET['s'])) {
                $my_posts = new WP_Query(array('post_type' => 'formations', 's' => $_GET['s']));
            } */
?>