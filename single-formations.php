<?php

/**
 * Template Name: Single Formation
 * Template Post Type: formations 
 */

//Récupère tout les champs : valeurs du cpt
//print_r(get_post_custom($post->ID));

$euros = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/euro.png";
$time = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/lhorloge.png";
$objectif = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/objectif.png";
$public = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/foule-dutilisateurs.png";
$content = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/liste-de-controle.png";
$teachers = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/enseignant-de-sexe-masculin.png";
$modalities = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/settings-Smartline.png";
$evaluations = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/suivi.png";
$access_time = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/temps-restant.png";
$accessibilites = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/accessibilite.png";
$others = "http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/documents.png";
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
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

        <h1><?php the_title() ?></h1>
        <p class="single_formation_p"><? echo get_post_meta($post->ID, 'but_formation', true) ?></p>

        <div id="single_formation_tarif">
          <img class="single_formation_icone" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/euro.png" alt="">
          <p><? echo get_post_meta($post->ID, 'tarif_formation', true) ?></p>
        </div>

        <div id="single_formation_duree">
          <img class="single_formation_icone" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/lhorloge.png" alt="">
          <p><? echo get_post_meta($post->ID, 'duree_formation', true) ?></p>
        </div>

        <div id="single_formation_bloc_contact">
          <p>Besoin d’adapter cette formation à vos besoins ?</p>
          <p>N’hésitez pas à nous contacter afin d’obtenir un devis sur mesure ! </p>
          <button>Nous contacter</button>
        </div>
      </div>

      <div class="single_formation_content">
        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/objectif.png" alt="">
            <h2>LES OBJECTIFS DE LA FORMATION</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'objectif_formation', true) ?></p>
        </div>



        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/foule-dutilisateurs.png" alt="">
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
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/liste-de-controle.png" alt="">
            <h2>CONTENU DE LA FROMATION</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'formation_content', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/enseignant-de-sexe-masculin.png" alt="">
            <h2>LES INTERVENANTS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'teachers', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/settings-Smartline.png" alt="">
            <h2>LES MODALITÉS</h2>
          </div>
          <h3>Les modalités Pedagogiques</h3>
          <p><? echo get_post_meta($post->ID, 'modalites_pedagogiques', true) ?></p> <br>
          <h3>Les Modalités Techniques</h3>
          <p><? echo get_post_meta($post->ID, 'modalites_techniques', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/suivi.png" alt="">
            <h2>SUIVI & ÉVALUATIONS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'suivi_&_evaluations', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/temps-restant.png" alt="">
            <h2>DÉLAI D'ACCÉS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'delai_dacces', true) ?></p>
        </div>

        <div class="single_formation_block">
          <div class="single_formation_block_title">
            <img class="single_formation_icone2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/accessibilite.png" alt="">
            <h2>ACCESSIBILITÉS</h2>
          </div>
          <p><? echo get_post_meta($post->ID, 'accessibilites', true) ?></p>
        </div>

        <div class="single_formation_block_title">
          <img class="single_formation_icone3" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/documents.png" alt="">
          <h2>Ces formations peuvent vous intéresser : </h2>
        </div>

      </div>
    </main>
  </body>
</div>