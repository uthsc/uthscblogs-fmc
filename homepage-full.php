<?php
/*
Template Name: Homepage Full Width
*/
get_header(); ?>

<!-- Row for main content area -->
<div class="small-12 large-12 columns" id="content" role="main">

    <?php
    if (get_field('homepage_slider_image_1', get_the_ID())) {
        echo '<ul class="example-orbit" data-orbit>';
        echo uthsc_get_acf('homepage_slider_image_1', get_the_ID(), '<li><img src="', '" alt="' . uthsc_get_acf('homepage_slider_image_alt_text_1', get_the_ID()) . '" />');
        if (get_field('homepage_slider_caption_1', get_the_ID())) {
            echo uthsc_get_acf('homepage_slider_caption_1', get_the_ID(), '<div class="orbit-caption">', '</div></li>');
        } else {
            echo '</li>';
        }

        echo '</ul>';
    }


    ?>


    <?php /* Start loop */ ?>
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <footer>
                <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>')); ?>
                <p><?php the_tags(); ?></p>
            </footer>
        </article>
    <?php endwhile; // End the loop ?>

</div>

<?php get_footer(); ?>
