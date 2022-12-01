<?php
/**
 * Template Name: One Formation
 * Template Post Type: formations 
 */

//Récupère tout les champs : valeurs du cpt
//print_r(get_post_custom($post->ID));?>

<h1 class="elementor-kit-6"><? the_title()?></h1>
<p><? echo get_post_meta($post->ID, 'but_formation', true)?></p>
<br />
<h2>LES OBJECTIFS DE LA FORMATION</h2>
<p><? echo get_post_meta($post->ID, 'objectif_formation', true)?></p>

<br />

<h2>PROFIL DU PUBLIC CONCERNÉ</h2>
<h3>TYPE DE PUBLIC</h3>
<p><? echo get_post_meta($post->ID, 'type_public', true)?></p>

<h3>PRÉ-REQUIS</h3>
<p><? echo get_post_meta($post->ID, 'pre-requis', true)?></p>

<br/>

<h2>CONTENU DE LA FROMATION</h2>
<p><? echo get_post_meta($post->ID, 'formation_content', true)?></p>

<br>

<h2>LES INTERVENANTS</h2>
<p><? echo get_post_meta($post->ID, 'teachers', true)?></p>

<br>

<h2>LES MODALITÉS</h2>
<h3>Les modalités Pedagogiques</h3>
<p><? echo get_post_meta($post->ID, 'modalites_pedagogiques', true)?></p>

<br>

<h3>Les Modalités Techniques</h3>
<p><? echo get_post_meta($post->ID, 'modalites_techniques', true)?></p>

<br>
<h2>SUIVI & ÉVALUATIONS</h2>
<p><? echo get_post_meta($post->ID, 'suivi_&_evaluations', true)?></p>
<br>

<br>

<h2>DÉLAI D'ACCÉS</h2>
<p><? echo get_post_meta($post->ID, 'delai_dacces', true)?></p>

<br>

<h2>ACCESSIBILITÉS</h2>
<p><? echo get_post_meta($post->ID, 'accessibilites', true)?></p>

<br>

<h2>DURÉE</h2>
<p><? echo get_post_meta($post->ID, 'duree_formation', true)?></p>
<br>

<h2>TARIF</h2>
<p><? echo get_post_meta($post->ID, 'tarif_formation', true)?></p>
<br>

<h2>IMAGE MISE EN AVANT</h2>
<p><? the_post_thumbnail()?></p>




<?php

?>





<?
/** Array ( [_edit_lock] => Array ( [0] => 1669805853:1 ) 
 * [_edit_last] => Array ( [0] => 1 ) 
 * [but_formation] => Array ( [0] => Maîtriser les fonctionnalités de l'outil WORD ) 
 * [objectif_foramtion] => Array ( [0] => A l'issue de la formation, les participants seront capables de : - Connaître les fonctions essentielles de WORD - mettre en page des courriers de manière efficace, utilisation des styles, sommaire - Savoir créer et gérer des publipostages - Créer des modèles de documents et des en-tête et pied de page semi-automatiques ) 
 * [type_public] => Array ( [0] => Tous publics entrepreneurs, artisans, créateurs, retraités Toute personne intéressée pour acquérir plus de connaissances sur le logiciel Word, qui souhaite travailler plus rapidement et efficacement ) 
 * [pre-requis] => Array ( [0] => Connaissances informatiques basiques (questionnaire de positionnement) Pour la formation, être muni de son PC et avoir installé le logiciel WORD ) 
 * [_pre-requis] => Array ( [0] => field_6385dd5f66e44 ) 
 * [contenu_formation] => Array ( [0] => Module 1 - présentation des fonctions basiques WORD - Présentation et bilan des savoirs - Mettre en page un courrier de manière efficace et rapide - Révision collective et parcours des différentes fonctions de WORD - Exercices ludiques Module 2 - En tête et pied de page et création de modèles - Théorie et mise en pratique Module 3 - Créer des publipostages - Présentation et exercices - Mise en pratique reprenant les différentes notions vues depuis le module 1 Module 4 - Mise en pratique - Exercices d'évaluation et correction générale - Retour sur la formation et temps d'échange ) [_contenu_formation] => Array ( [0] => field_6385dd7066e45 ) 
 * [intervenants] => Array ( [0] => Malorie Poux ) [_intervenants] => Array ( [0] => field_6385dd8866e46 ) 
 * [modalites_pedagogiques] => Array ( [0] => Méthode ascendante et/ou pédagogie inversée. Présentation théorique puis mise en pratique. les exercices sont des mises en situation sur ces cas concrets. Chaque exercice permet de s'entraîner sur la théorie présentée, réviser les précédentes et parfois découvrir en amont. Pédagogie active et support sous forme de "fiche mémo" ) [_modalites_pedagogiques] => Array ( [0] => field_6385ddb866e47 ) 
 * [modalites_techniques] => Array ( [0] => Vidéoprojecteurs Supports de formation Ordinateurs et connexion internet Tableau blanc ) [_modalites_techniques] => Array ( [0] => field_6385ddd866e48 ) 
 * [suivi_&_evaluations] => Array ( [0] => Feuille d'émargements Test de positionnement avant l'entrée en formation Evaluation en fin de formation Questionnaire de satisfaction du stagiaire Attestation de fin de formation ) [_suivi_&_evaluations] => Array ( [0] => field_6385ddf866e49 ) 
 * [delai_dacces] => Array ( [0] => 2 semaines minimum avant la date de formation Sur demande par téléphone ou mail Formation en Intra ou en Inter ) [_delai_dacces] => Array ( [0] => field_6385de0c66e4a ) 
 * [accessibilites] => Array ( [0] => Cédille formation est sensible à l'intégration des personnes en situation de handicap. Contactez-nous afin d'étudier les possibilités de compensations disponibles. ) [_accessibilites] => Array ( [0] => field_6385de3c66e4b ) 
 * [tarif_formation] => Array ( [0] => 600 ) [_tarif_formation] => Array ( [0] => field_6385deb566e4c ) [duree_formation] => Array ( [0] => 12 ) 
 * [_duree_formation] => Array ( [0] => field_6385ded666e4d ) 
 * [_thumbnail_id] => Array ( [0] => 131 ) 
 * [objectif_formation] => Array ( [0] => A l'issue de la formation, les participants seront capables de : - Connaître les fonctions essentielles de WORD -Mettre en page des courriers de manière efficace, utilisation des styles, sommaire - Savoir créer et gérer des publipostages - Créer des modèles de documents et des en-tête et pied de page semi-automatiques ) [_objectif_formation] => Array ( [0] => field_6385dd3366e42 ) 
 * [formation_content] => Array ( [0] => Module 1 - présentation des fonctions basiques WORD - Présentation et bilan des savoirs - Mettre en page un courrier de manière efficace et rapide - Révision collective et parcours des différentes fonctions de WORD - Exercices ludiques Module 2 - En tête et pied de page et création de modèles - Théorie et mise en pratique Module 3 - Créer des publipostages - Présentation et exercices - Mise en pratique reprenant les différentes notions vues depuis le module 1 Module 4 - Mise en pratique - Exercices d'évaluation et correction générale - Retour sur la formation et temps d'échange ) 
 * [_formation_content] => Array ( [0] => field_6385dd7066e45 ) 
 * [teachers] => Array ( [0] => Malorie Poux ) [_teachers] => Array ( [0] => field_6385dd8866e46 ) 
 * [evaluation] => Array ( [0] => Feuille d'émargements Test de positionnement avant l'entrée en formation Evaluation en fin de formation Questionnaire de satisfaction du stagiaire Attestation de fin de formation ) [_evaluation] => Array ( [0] => field_6385ddf866e49 ) 
 * [delai_acces] => Array ( [0] => 2 semaines minimum avant la date de formation Sur demande par téléphone ou mail Formation en Intra ou en Inter ) [_delai_acces] => Array ( [0] => field_6385de0c66e4a ) 
 * [_wp_page_template] => Array ( [0] => template-parts/single-formations.php ) ) */




 //The template for displaying singular post-types: posts, pages and user-defined custom post types. @package HelloElementor


/* $obj = the_field('objectif_formation');
/* $but = get_field('but_formation');
$public = get_field('type_public');
$prerequis = get_field('pre-requis');
$content = get_field('formation_content');
$teachers = get_field('teachers');
$pedago = get_field('modalites_pedagogiques');
$techni = get_field('modalites_techniques');
$evaluation = get_field('evaluation');
$acces = get_field('delai_acces');
$accessibilites = get_field('accessibilites');
$tarif = get_field('tarif_formation');
$duree = get_field('duree_formation');

echo $but;
echo $public;
echo $prerequis;
echo $content;
echo $teachers;
echo $pedago;
echo $techni;
echo $evaluation;
echo $acces;
echo $accessibilites;
echo $tarif;
echo $duree; */
/* echo("Objectif de la formation : " + $obj);
echo("public de la formation : " + $public);
echo("prerequis de la formation : " + $prerequis);
echo("content de la formation : " + $content);
echo("Intervenants de la formation : " + $teachers);
echo("Modalités Pédagogiques de la formation : " + $pedago);
echo("Modalités Techniques de la formation : " + $techni);
echo("Suivi & Évaluations de la formation : " + $evaluation);
echo("Délai d'accès de la formation : " + $acces);
echo("Accéssibilités de la formation : " + $accessibilites);
echo("Tarif de la formation : " + $tarif);
echo("Durée de la formation : " + $duree); */