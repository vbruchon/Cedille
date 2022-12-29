<?php

/**
 * Template Name: Single Formation
 * Template Post Type: formations 
 */

//Récupère tout les champs : valeurs du cpt
//print_r(get_post_custom($post->ID));
$icone = [
  'euros' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/euro.png',
  'time ' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/lhorloge.png',
  'objectif' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/objectif.png',
  'public' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/groupe-dutilisateurs.png',
  'content' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/liste-de-controle.png',
  'teachers' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/male-teacher.png',
  'modalities' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/settings-Smartline.png',
  'evaluations' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/suivi.png',
  'access_time' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/temps-restant.png',
  'accessibilites' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/accessibilite.png',
  'others' => 'http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/classeurs.png',
];







$terms = get_the_terms($post->ID, 'thematique');

$tax_query = array(
  'taxonomy' => 'thematique',
  'field' => 'slug',
  'terms' => $terms[0]->slug,
);

$params = array('post_type' => 'formations', 'tax_query' => array($tax_query), 'posts_per_page' => 3);
$othersFormation = new WP_Query($params);
?>

<head>
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
  <meta name="viewport" content="width:device-width, initial-scale=1">
</head>

<header>
  <? get_header() ?>
</header>

<div class="global_css">

  <body>
    <div id="single_formation_titre">
      <h2>PROGRAMME DE LA FORMATION</h2>
    </div>
    <main id="single_formation_main">
      <div class="single_formation_sidebar_left">

        <div class="single_formation_thumbnail">
          <?php the_post_thumbnail() ?>
        </div>
        <div id="single_formation_h1">
          <h1><?php the_title() ?></h1>
        </div>
        <p class="single_formation_p"><? echo get_post_meta($post->ID, 'but_formation', true) ?></p>

        <div id="slidebar_element">
          <div id="single_formation_tarif">
            <img class="single_formation_icone" src="<? echo $euros ?>" alt="Pile de pièce de monnaie">
            <p><? echo get_post_meta($post->ID, 'tarif_formation', true) ?> euros (€)</p>
          </div>

          <div id="single_formation_duree">
            <img class="single_formation_icone" src="<? echo $time ?>" alt="Horloge">
            <p><? echo get_post_meta($post->ID, 'duree_formation', true) ?> heures</p>
          </div>

          <div id="single_formation_bloc_contact">
            <p>Besoin d’adapter cette formation à vos besoins ?</p>
            <p>N’hésitez pas à nous contacter afin d’obtenir un devis sur mesure ! </p>
            <button>Nous contacter</button>
          </div>
        </div>
      </div>

      <div class="single_formation_content">
        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="<? echo $icone['objectif'] ?>" alt="Cible">
            <h2>LES OBJECTIFS DE LA FORMATION</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'objectif_formation', true) ?></p>
        </div>



        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['public'] ?>" alt="Foule d'utilisateurs">
            <h2>PROFIL DU PUBLIC CONCERNÉ</h2>
          </div>
          <h3>TYPE DE PUBLIC</h3>
          <p><? echo get_post_meta($post->ID, 'type_public', true) ?></p>
          <br />
          <h3>PRÉ-REQUIS</h3>
          <p><? echo get_post_meta($post->ID, 'pre-requis', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['content'] ?>" alt="To Do List">
            <h2>CONTENU DE LA FORMATION</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'formation_content', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['teachers'] ?>" alt="Icône d'un homme en cravate">
            <h2>LES INTERVENANTS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'teachers', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['modalities'] ?>" alt="main tenant une roue denté">
            <h2>LES MODALITÉS</h2>
          </div>
          <h3>Les modalités Pedagogiques</h3>
          <p><? echo get_post_meta($post->ID, 'modalites_pedagogiques', true) ?></p> <br>
          <h3>Les Modalités Techniques</h3>
          <p><? echo get_post_meta($post->ID, 'modalites_techniques', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['evaluations'] ?>" alt="point relié par un trait à un drapeau">
            <h2>SUIVI & ÉVALUATIONS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'suivi_&_evaluations', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['access_time'] ?>" alt="Horloge">
            <h2>DÉLAI D'ACCÉS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'delai_dacces', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone" src="<? echo $icone['accessibilites'] ?>" alt="Logo accessibilités (personnage bland entoourré d'un riond)">
            <h2>ACCESSIBILITÉS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'accessibilites', true) ?></p>
        </div>

        <div class="single_formation_block_title">
          <img class="single_formation_icone2" src="<? echo $icone['others'] ?>" alt="icône de 3 classeurs">
          <h2>Ces formations peuvent vous intéresser : </h2>
        </div>

        <div id="carte_Formation">
          <?php
          if ($othersFormation->have_posts()) :
            while ($othersFormation->have_posts()) : $othersFormation->the_post(); ?>
              <div class="carte">
                <div class="carte_img">
                  <?php the_post_thumbnail(); ?>
                </div>
                <h2 class="carte_title">
                  <?php the_title(); ?>
                </h2>
                <button id="link_formation" onclick="window.location.href = '<? the_permalink() ?>'">Découvrir la formation</button>
              </div>
            <?php endwhile; ?>

          <?php else : ?>
            <p>Aucune formation n'a été trouvé dans cette catégorie.</p>
          <?php endif; ?>

        </div>
      </div>
    </main>
  </body>
</div>
<footer>
  <? get_footer() ?>
  <footer>