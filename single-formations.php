<?php

/**
 * Template Name: Single Formation
 * Template Post Type: formations 
 */

$icone = [
    'euros' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/euro.png',
    'time' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/lhorloge.png',
    'objectif' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/objectif.png',
    'public' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/groupe-dutilisateurs.png',
    'content' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/liste-de-controle.png',
    'teachers' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/male-teacher.png',
    'modalities' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/settings-Smartline.png',
    'evaluations' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/suivi.png',
    'access_time' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/temps-restant.png',
    'accessibilites' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/accessibilite.png',
    'others' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/classeurs.png',
    'satisfaction' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/la-satisfaction.png'
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
</head>

<body>

    <header>
        <? get_header() ?>
    </header>
    <div class="global_css">

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
                                    <p><? echo the_field('tarif_formation') ?> euros (€)</p>
                                </div>

                                <div id="single_formation_duree">
                                    <img class="single_formation_icone" src="<? echo $icone['time'] ?>" alt="">
                                    <p><? echo the_field('duree_formation') ?> heures</p>
                                </div>

                                <div id="single_formation_bloc_contact">
                                    <p>Besoin d’adapter cette formation à vos besoins ?</p>
                                    <p>N’hésitez pas à nous contacter afin d’obtenir un devis sur mesure ! </p>
                                    <button onclick="window.location.href ='http://cedille-formation.ftalps.fr/contact/';">Nous contacter</button>
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

                            <div id="satisfaction">
                                <img class="single_formation_icone" src="<? echo $icone['satisfaction'] ?>" alt="taux de satisfaction">
                                <p><strong><? echo the_field('taux_satisfaction') ?>% </strong> taux de satisfaction</p>
                            </div>

                            <div class="single_formation_block_title_formation">
                                <img class="single_formation_icone3" src="<? echo $icone['others'] ?>" alt="icône de 3 classeurs">
                                <h2>Ces formations peuvent vous intéresser : </h2>
                            </div>

                            <div id="single_formation_carte_Formation">
                                <?php $currentID = get_the_ID();
                                if ($othersFormation->have_posts()) :
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
                                    <?
                                        endif;
                                    endwhile;
                                    ?>

                                <?php else : ?>
                                    <p>Aucune formation n'a été trouvé dans cette catégorie.</p>
                                <?php endif; ?>

                            </div>
                        </div>
                    <? endwhile; ?>
                <? else : ?>
                    <p>Cette formation n'as pas encore de programme ou n'existe pas.</p>
                <? endif ?>
            </main>
            <script>
                // DOMElement 
                const programme = document.getElementById("single_formation_titre");
                const content = document.getElementById("single_formation_content");
                const satisfaction = document.getElementById("satisfaction");
                const element = document.getElementById("slidebar_element");
                const bloc_contact = document.getElementById("single_formation_bloc_contact")
                const others = document.getElementsByClassName("single_formation_block_title_formation")

                //Class css
                const block = "single_formation_block";
                const blockTitle = "single_formation_block_title"

                //InnerWidth viewport
                const lengthTablettMin = window.innerWidth >= 768;
                const lengthTablettMax = window.innerWidth <= 1100;

                const isMobile = window.innerWidth <= 767;
                const isTablett = lengthTablettMin & lengthTablettMax;
                const isDesktop = window.innerWidth > 1101;

                function createSatifactionElementForMobile() {
                    const img = document.querySelector("#satisfaction img")
                    const p = document.querySelector("#satisfaction p")
                    const newDiv = document.createElement("div")
                    const newDiv2 = document.createElement("div")
                    const newH2 = document.createElement("h2")

                    newDiv.classList.add(block)
                    newDiv2.classList.add(blockTitle)
                    newH2.innerText = "TAUX DE SATISFACTION"

                    newDiv2.appendChild(img)
                    newDiv2.appendChild(newH2)
                    newDiv.appendChild(newDiv2)
                    newDiv.appendChild(p)
                    satisfaction.appendChild(newDiv)

                    //Ajout ou je veux 
                    content.insertBefore(satisfaction, others)
                }

                document.addEventListener('DOMContentLoaded', () => {
                    if (isMobile) {
                        createSatifactionElementForMobile()
                    } else if (isTablett) {
                        programme.style.marginTop = 0;
                        element.insertBefore(satisfaction, bloc_contact)
                    } else if (isDesktop) {
                        programme.style.marginTop = 0
                        element.insertBefore(satisfaction, bloc_contact)
                    }
                })
            </script>
        </body>
        <footer id="footer">
            <? get_footer() ?>
        </footer>
    </div>
</body>

</html>