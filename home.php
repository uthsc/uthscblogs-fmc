<?php get_header(); ?>
    <!-- Row for main content area -->
    <div class="small-12 large-8 columns" id="content" role="main">

        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
        <?php if ($paged < 2) { ?>
        <ul class="example-orbit hide-for-small-down" data-orbit>
            <li>
                <img src="http://lorempixel.com/800/250/city/" alt="slide 1" />
                <div class="orbit-caption">
                    Caption One.
                </div>
            </li>
            <li class="active">
                <img src="http://lorempixel.com/800/250/nature/" alt="slide 2" />
                <div class="orbit-caption">
                    Caption Two.
                </div>
            </li>
            <li>
                <img src="http://lorempixel.com/800/250/city/" alt="slide 3" />
                <div class="orbit-caption">
                    Caption Three.
                </div>
            </li>
        </ul>

        <?php } ?>

        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; // end have_posts() check ?>

        <?php /* Display navigation to next/previous pages when applicable */ ?>
        <?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
            <nav id="post-nav">
                <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
                <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
            </nav>
        <?php } ?>

    </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>