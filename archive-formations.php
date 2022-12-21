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
    <h1>Nos Formations</h1>

    <?php
    /*
 * @my_posts => Get the articles with the category "les-editions".
 */
    $cat_name = "les-editions";
    $tag = "edition-du-9-avril-2019";

    $size_img_couverture = [200, 200];


    $my_posts = new WP_Query(array('post_type' => 'formations', 'posts_per_page' => '150'));
    ?>

    <div id="carte_Formation">
        <?php
        if ($my_posts->have_posts()) :
            while ($my_posts->have_posts()) : $my_posts->the_post(); ?>

                <div class="carte">
                    <div class="category">
                        picto + category
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