<?
function shortcode_carousel_TL()
{
?>
	<div id="container">
		<?
		$params = array('post_type' => 'tiers-lieux', 'orderby' => 'post_date', 'order' => 'ASC');
		$tiers_lieux = new WP_Query($params);

		if (!$tiers_lieux->have_posts())
			return false;
		else while ($tiers_lieux->have_posts()) : $tiers_lieux->the_post(); ?>
			<div class="element">
				<div class="logo"><a href="<? the_field('website_tl') ?>" target="_blank"><? the_post_thumbnail() ?></a></div>
			</div>
		<? endwhile; ?>
	</div>
	<?
}
add_shortcode('tiers-lieux_caroussel', 'shortcode_carousel_TL');

function shortcode_Advices($atts)
{
	$contentField = 'avis_content';
	$formationName = 'avis_nameFormation';
	//Je récupère mon paramètres de mon short-code
	$a = shortcode_atts(array('auteur' => '#'), $atts);
	//J'utilise ce paramètre pour l'utiliser en tant que term voulue
	$tax_query = array(
		'taxonomy' => 'auteur',
		'field' => 'name',
		'terms' => $a['auteur']
	);
	//J'ajoute à mes params ma tax_query comportant en term le paramètre saisie par le user
	$params = array('post_type' => 'avis', 'tax_query' => array($tax_query));
	//Je fais ma requête en lui passant les params créer
	$advices = new WP_Query($params);

	if (!$advices->have_posts()) :
		return "Aucun avis trouvé";
	else :
		if ($a['auteur'] === "Stagiaire") {
			echo '<div id="adviceCaroussel_Stagiaire">';
		} else {
			echo '<div id="adviceCaroussel_Formateur">';
		}
		for ($i = 0; $i !== 4; $i++) {
			while ($advices->have_posts()) : $advices->the_post();
				if ($a['auteur'] === "Stagiaire") {
					echo '<div class="element">';
					echo '<div class="avis_Stagiaire">';
				} else {
					echo '<div class="element">';
					echo '<div class="avis_Formateur">';
				}
	?>
				<h2 class="formation_name"><? echo the_field($formationName) ?></h2>
				<div class="content">
					<img class="img1" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/quote.png" alt="quote icone">
					<p class="the_field"><? echo the_field('avis_content') ?></p>
					<img class="img2" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/quote.png" alt="quote icone">
				</div>
				<div class="author">
					<? if ($a['auteur'] === "Stagiaire") { ?>
						<img class="author_icone" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/eleve.png" alt="icône stagiaire">
					<? } else { ?>
						<img class="author_icone" src="http://cedille-formation.ftalps.fr/wp-content/uploads/2022/12/enseignant-de-sexe-masculin-1.png" alt="icône enseingant">
					<? } ?>
					<p class="author_name"><? echo the_title() ?> ( <? echo the_terms($advices->ID, 'auteur') ?> )</p>
				</div>
				</div>
				</div>
	<? endwhile;
		}

	endif;
}
add_shortcode('advices', 'shortcode_Advices');

function shortcode_contact_element()
{
	$params = array('post_type' => 'contact');
	$contact = new WP_Query($params);

	?>
	<? if (!$contact->have_posts())
		return false;
	else while ($contact->have_posts()) : $contact->the_post(); ?>
		<div id="contact">
			<div id="phone"></div>
			<div id="email"></div>
		</div>
	<? endwhile; ?>
<?
}
add_shortcode('contact_element', 'shortcode_contact_element');


function shortcode_thematique_home_page()
{
?>
	<div id="all">

		<?
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
		$thematiques = get_terms('thematique', array('hide_empty' => false, 'post_per_page' => 8));
		$i = 0;

		foreach ($thematiques as $t) :

			if ($i !== 8) :
		?>
				<div class="card">
					<a href="<? echo get_term_link($t) ?>">
						<div class="picto">
							<img src="<? echo ($pictoThematique[$t->slug]) ?>" alt="picto " + <? echo ($pictoThematique[$t->slug]) ?>>
						</div>

						<div class="term">
							<? echo $t->name ?>
						</div>
					</a>
				</div>
		<?
				$i++;
			endif;
		endforeach;
		?>
	</div>
<?
}
add_shortcode('all-thematique', 'shortcode_thematique_home_page');

function display_latest_post()
{ ?>
	<? $args = array(
		'post_type' => 'post',
		'posts_per_page' => 1
	);
	$latest_post = new WP_Query($args);

	while ($latest_post->have_posts()) : $latest_post->the_post(); ?>
		<div class="latest-post">
			<h2 class="latest-post-title"><? the_title() ?></h2>
			<div class="latest-post-content">
				<p><? the_excerpt() ?></p>
			</div>
			<button class="button-latest-post" nclick="window.location.href='the_permalink()'"> Lire l'article</a>
		</div>
<?
	endwhile;
}
add_shortcode('latest_post', 'display_latest_post');