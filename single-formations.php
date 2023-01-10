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
      <main id="single_formation_main">

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
              <p><? echo get_post_meta($post->ID, 'tarif_formation', true) ?> euros (€)</p>
            </div>

            <div id="single_formation_duree">
              <img class="single_formation_icone" src="<? echo $icone['time'] ?>" alt="">
              <p><? echo get_post_meta($post->ID, 'duree_formation', true) ?> heures</p>
            </div>

            <div id="single_formation_bloc_contact">
              <p>Besoin d’adapter cette formation à vos besoins ?</p>
              <p>N’hésitez pas à nous contacter afin d’obtenir un devis sur mesure ! </p>
              <button>Nous contacter</button>
            </div>
          </div>
        </div>

        <div id="single_formation_content">
          <div class="single_formation_block">
            <div class="single_formation_block_title">
              <img class="single_formation_icone" src="<? echo $icone['objectif'] ?>" alt="Cible">
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

          <div id="single_formation_carte_Formation">
            <?php $currentID = get_the_ID();
            if ($othersFormation->have_posts()) :
              while ($othersFormation->have_posts()) : $othersFormation->the_post();
                $postID = get_the_ID();
                if ($currentID !== $postID) :  ?>
                  <div class="single_formation_carte">
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
      </main>
    </body>
    <script>
      let slidebar = document.getElementById('single_formation_sidebar_left');
      let content = document.getElementById("single_formation_content");

      let mobileClass = "slidebar_mobile";
      let MobileClassFix = "slidebar_mobile_fix";

      let tablettClassFix = "slidebar_tablett_fix";
      let ContentClassAfterFix = "single_formation_content_after_fix";
      let slidebarTablettDownPage = "single_formation_sidebar_isDownPage";

      let pcClassFix = "sidebar_pc_fix";

      let lengthTablettMin = window.innerWidth >= 768;
      let lengthTablettMax = window.innerWidth <= 1100;

      let isMobile = window.innerWidth <= 767;
      let isTablett = lengthTablettMin & lengthTablettMax;
      let isPC = window.innerWidth > 1101;



      /**
       * Change CSS Class depending on the screen size
       */
      document.addEventListener('DOMContentLoaded', () => {
        if (isMobile) {
          slidebar.classList.add(mobileClass)
          window.addEventListener('scroll', () => {
            if (window.scrollY >= 250) {
              slidebar.classList.remove(mobileClass);
              slidebar.classList.add(MobileClassFix);
            } else {
              if (slidebar.className !== mobileClass) {
                slidebar.classList.remove(slidebar.className);
                slidebar.className = mobileClass;
              }
            }
          })
        } else if (isTablett) {
          window.addEventListener('scroll', () => {
            if (window.scrollY >= 114) {
              slidebar.classList.add(tablettClassFix);
              content.classList.add(ContentClassAfterFix);
            } else if (window.scrollY <= 113) {
              if (slidebar.className !== "") {
                slidebar.classList.remove(slidebar.className)
              }
              if (content.className !== "") {
                content.classList.remove(content.className)
              }
            }
          })
        } else if (isPC) {
          window.addEventListener('scroll', () => {
            if (window.scrollY >= 210) {
              slidebar.classList.add(pcClassFix);
              content.classList.add(ContentClassAfterFix);
            } else if (window.scrollY <= 209) {
              if (slidebar.className !== "") {
                slidebar.classList.remove(slidebar.className)
              }
              if (content.className !== "") {
                content.classList.remove(content.className)
              }
            }
          })
        }

        /* Block sidebar sur la at the bottom Page  
                if (isTablett || isPC) {
                  window.addEventListener('scroll', () => {

                    if (window.scrollY >= calculNbrePXBetweenAPointAndDownPage()) {
                      slidebar.classList.add(slidebarTablettDownPage)
                      slidebar.classList.remove(tablettClassFix)
                    } else if (slidebar.className !== "") {
                      slidebar.classList.remove(slidebarTablettDownPage)
                    }
                    slidebar.classList.add(tablettClassFix)
                  })

                } */

      })



      /**
       * Calcule le nombre de px entre une distance donnée et le bas de la page
       */
      function calculNbrePXBetweenAPointAndDownPage() {
        let downPageDistance = window.scrollMaxY * 10 / 100
        let resultOfDownPageAndDistance = window.scrollMaxY - downPageDistance

        console.log("calcul : " + downPageDistance);

        return resultOfDownPageAndDistance
      }
    </script>
    <footer>
      <? get_footer() ?>
    </footer>
  </div>
</body>

</html>



<!--  window.addEventListener('DOMContentLoaded', () => {
        if (isMobile) {
          slidebar.classList.add(mobileClass)
          window.addEventListener('scroll', () => {
            if (window.scrollY >= 250) {
              slidebar.classList.remove(mobileClass)
              slidebar.classList.add(newMobileClass)
            } else {
              if (slidebar.className !== mobileClass) {
                slidebar.classList.remove(slidebar.className)
                slidebar.className = mobileClass
              }
            }
          })
        } else if (isTablett) {
          window.addEventListener('scroll', () => {
            if (window.scrollY >= 114) {
              slidebar.classList.add(tablettClass)
              content.classList.add(tablettContentClass)
            } else {
              slidebar.classList.remove(slidebar.className)
              content.classList.remove(content.className)
            }

            let downPageDistance = window.scrollMaxY * 10 / 100
            let resultOfDownPageAnddownPageDistance = window.scrollMaxY - calcul
            console.log("calcul : " + downPageDistance);
            console.log("result : " + resultOfDownPageAnddownPageDistance);

            if (window.scrollY >= result) {
              slidebar.classList.add(slidebarTablettDownPage)
              slidebar.classList.remove(tablettClass)
            } else {
              slidebar.classList.remove(slidebarTablettDownPage)
              slidebar.classList.add(tablettClass)
            }
          })
        }
      })
    </script> -->