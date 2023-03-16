<?php

/**
 * Template Name: Archive template
 **/
$img = array(
    'teacher' => array(
        'src' => '/assets/images/teacher_etiquettes.png',
        'alt' => "picto d'un professeur devant un tableau blanc"
    ),
    'locate' => array(
        'src' => '/assets/images/locate_etiquette.png',
        'alt' => "picto d'un marqueur de location de map"
    )
);

//ALL thematiques 
$thematiques = get_terms('thematique', array('hide_empty' => false));
$formats = get_terms('format', array('hide_empty' => false));
$supports = get_terms('pec', array('hide_empty' => false));

function parseUrl()
{
    $url = $_SERVER['REQUEST_URI'];
    $segments = explode('thematique', $url);
    $slug = end($segments);
    $slugThematique  = trim($slug, '/');

    return $slugThematique;
}


function checkIfTheFieldTarifFormationIsNumeriqueInput($tarif)
{
    if (is_numeric($tarif[0])) :
        $i = 0;
        while ($i < strlen($tarif) && is_numeric($tarif[$i])) {
            $i++;
        }
        // Extraire la partie numérique
        $prix = substr($tarif, 0, $i) . ' €';
    else :
        // Sinon, utiliser directement la valeur de tarif
        $prix = $tarif;
    endif;

    // Stock le résultat dans une balise p
    $output = '<p>' . $prix . '</p>';

    return $output;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
    <meta name="description" content="Bienvenue sur le programme de la formation <? the_title() ?>. Ici vous retrouverez toutes les informations utile pour réaliser la foramtion.">
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
                            <option value="all" <?php if ((parseUrl() === "formations") && (!(isset($_GET['thematique'])))) echo 'selected'; ?>>Toutes les formations</option>
                            <?php foreach ($thematiques as $term) : ?>
                                <?php if (isset($_GET['thematique']) && $_GET['thematique'] === $term->slug) : ?>
                                    <option value="<?php echo $term->slug ?>" selected><?php echo $term->name ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div id="forma">
                        <label for="format">Choisir un format : </label>
                        <select name="format" id="format">
                            <option value="all">Tous les formats</option>
                            <?php foreach ($formats as $format) : ?>
                                <?php if (isset($_GET['format']) && $_GET['format'] === $format->slug) : ?>
                                    <option value="<?php echo $format->slug ?>" selected><?php echo $format->name ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $format->slug ?>"><?php echo $format->name ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="pec">
                        <? foreach ($supports as $pec) : ?>
                            <input type="checkbox" name="pec" value="<? echo $pec->slug ?>" <?php if (isset($_GET['pec']) && $_GET['pec'] === 'cpf') echo 'checked'; ?>>
                            <label for="cpf"><? echo $pec->name ?></label>
                        <? endforeach; ?>
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

            if (isset($_GET['s']) && $_GET['s'] !== "") {
                // Recherche par mot-clé
                $search_query = $_GET['s'];
                if (!preg_match("/^[a-zA-Z0-9 ]+$/", $search_query)) {
                    // Validation de la requête de recherche
                    unset($_GET['s']);
                    echo "<script>alert(\"Entrée utilisateur non valide. Veuillez saisir uniquement des chiffres, ou des lettres\")</script>";
                    $args = array('post_type' => 'formations');
                } else {
                    $search_query = esc_sql($search_query);
                    $args = array('post_type' => 'formations', 's' => $search_query);
                }
            } else {
                // Filtres de recherche
                $args = array('post_type' => 'formations');
                $valid_formats = array('presentiel', 'distanciel');

                if (isset($_GET['thematique'])) {
                    $thematique_slug = $_GET['thematique'];
                    if ($thematique_slug !== "all") {
                        $args['thematique'] = $thematique_slug;
                    }
                }
                if (isset($_GET['format'])) {
                    $format_slug = $_GET['format'];
                    if ($format_slug !== "all" && in_array($format_slug, $valid_formats)) {
                        $args['format'] = $format_slug;
                    }
                }
                if (isset($_GET['pec'])) {
                    $pec_slug = $_GET['pec'];
                    if ($pec_slug === "cpf") {
                        $args['pec'] = $pec_slug;
                    }
                }
            }
            $my_posts = new WP_Query($args);

            ?>

            <!--___OUTPUT___-->
            <div id="carte_Formation">
                <?php
                if ($my_posts->have_posts()) :
                    while ($my_posts->have_posts()) : $my_posts->the_post();
                        $fields = array(
                            'img' => get_the_post_thumbnail($size_img_couverture),
                            'teacher' => get_field('teacher_carte'),
                            'location' => get_field('formation_locate'),
                            'title' => get_the_title(),
                            'price' => get_field('tarif_formation'),
                            'timing' => get_field('duree_formation')
                        )
                ?>
                        <div class="carte" onclick="window.location.href ='<? the_permalink() ?>'">
                            <div class="carte_img" href="'<? the_permalink() ?>'">
                                <div class="etiquettes">
                                    <? if ($fields['teacher']) : ?>
                                        <div class="teacher">
                                            <div class="picto">
                                                <img src="<?php echo get_template_directory_uri();
                                                            echo $img['teacher']['src'] ?>" alt="<? $img['teacher']['alt'] ?>">
                                            </div>
                                            <p><? echo $fields['teacher'] ?></p>
                                        </div>
                                    <? endif; ?>
                                    <? if ($fields['teacher']) : ?>
                                        <div class="location">
                                            <div class="picto">
                                                <img src="<?php echo get_template_directory_uri();
                                                            echo $img['locate']['src'] ?>" alt="<? $img['locate']['alt'] ?>">
                                            </div>
                                            <p><? echo $fields['location'] ?></p>
                                        </div>
                                    <? endif; ?>
                                </div>
                                <?php echo $fields['img']; ?>
                            </div>
                            <h2 class="carte_title">
                                <?php echo $fields['title']; ?>
                            </h2>
                            <div class="info">
                                <div class="price">
                                    <?php
                                    echo checkIfTheFieldTarifFormationIsNumeriqueInput($fields['price']);
                                    ?>
                                </div>
                                <div class="separateur"> | </div>
                                <div class="hours">
                                    <p><? echo $fields['timming'] ?> heures</p>
                                </div>
                            </div>
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
            $('#pec').change(function(e) {
                e.preventDefault();
                $('#formFilter').submit();
            })
        });

        document.addEventListener('DOMLoadead', () => {
            let teacher = document.querySelectorAll('price');
            console.log(teacher);
        })
    </script>
</body>

</html>