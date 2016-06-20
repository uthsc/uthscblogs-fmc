<?php
/*
Template Name: Homepage Full Width
*/
get_header(); ?>

<!-- Row for main content area -->
<div class="columns" id="content" role="main">
    <div class="row">
        <div class="columns medium-9 large-8">
            <?php

            $slider_html = '';

            // check for slider images
            if (get_field('homepage_slider_show_image_1', get_the_ID()) |
                get_field('homepage_slider_show_image_2', get_the_ID()) |
                get_field('homepage_slider_show_image_3', get_the_ID()) |
                get_field('homepage_slider_show_image_4', get_the_ID()) ) {
                $slider_html .= '<ul class="uthsc-slider" data-orbit="data-orbit" data-options="animation:slide;
                animation_speed:500;">';
                for ($i = 1; $i <= 4; $i++) {
                    if ( get_field('homepage_slider_show_image_' . $i, get_the_ID()) ) {
                        $slider_html .=  uthsc_get_acf('homepage_slider_image_' . $i, get_the_ID(), '<li><img src="', '" alt="' . uthsc_get_acf('homepage_slider_image_alt_text_' . $i, get_the_ID()) . '" />');
                        $slider_html .=  (get_field('homepage_slider_caption_' . $i, get_the_ID())) ? uthsc_get_acf('homepage_slider_caption_' . $i, get_the_ID(), '<div class="orbit-caption">', '</div></li>') : '</li>';
                    }
                }
                $slider_html .=  '</ul>';
            }
            echo $slider_html;
            ?>

            <br class="show-for-small" />
            <a href="https://fpcportal.uthsc.edu/" class="button expand secondary radius show-for-medium">
                <div class="row">
                    <div class="columns small-6 text-right"><span class="fa fa-clock-o fa-3x"></span></div>
                    <div class="columns small-6 text-left">Schedule<br />an Appointment</div>
                </div>
            </a>

        </div>
        <div class="columns medium-3 large-4">

            <a href="https://fpcportal.uthsc.edu/" class="button expand secondary radius hide-for-medium"><span class="fa fa-clock-o"></span> Schedule an Appointment</a>

            <div class="fmc-health-reminders panel">
                <?php
                $health_reminders = '';

                // check for reminder images
                if (get_field('show_reminder_1', get_the_ID())  |
                    get_field('show_reminder_2', get_the_ID())  ) {

                    $health_reminders .= '<h3 class="text-center"><span class="fa fa-bell"></span> Health Reminders</h3>';
                    for ($i = 1; $i <= 2; $i++) {
                        if ( get_field('show_reminder_' . $i, get_the_ID()) ) {
                            $health_reminders .= '<figure class="figure alignleft">';
                            $health_reminders .= '<img class="fmc-health-reminders-photo" src="';
                            $health_reminders .=  uthsc_get_acf('health_reminder_photo_' . $i, get_the_ID(), '', '" alt="' . uthsc_get_acf('health_reminder_photo_alt_text_' . $i, get_the_ID()) . '" width="150" height="150" />');
                            $health_reminders .= '<figcaption class="wp-caption-text">Credit <a href="';
                            $health_reminders .=  uthsc_get_acf('health_reminders_photo_attribution_link_' . $i, get_the_ID(), '');
                            $health_reminders .= '">';
                            $health_reminders .=  uthsc_get_acf('health_reminders_photo_attribution_name_' . $i, get_the_ID(), '');
                            $health_reminders .= '</a>';
                            $health_reminders .= '</figcaption>';
                            $health_reminders .= '</figure>';
                            $health_reminders .=  uthsc_get_acf('health_reminder_text_' . $i, get_the_ID(), '');
                            $health_reminders .= '<br style="clear:both" class="show-for-small-down" />';
                            //$health_reminders .= '<hr />';
                        }
                    }

                }
                echo $health_reminders;


//                    for ($i = 1; $i <= 2; $i++) {
//                        if ( get_field('' . $i, get_the_ID()) ) {
//                            $health_reminders .= uthsc_get_acf('health_reminder_photo_' . $i, get_the_ID(), '';
//                    <img class="fmc-health-reminders-photo" src="', '" alt="' . uthsc_get_acf('health_reminder_photo_alt_text_' . $i, get_the_ID()) . '" width="150" height="150" />
//                    <figcaption class="wp-caption-text">
//                        Credit <a href="' . uthsc_get_acf('health_reminders_photo_attribution_link_' . $i, get_the_ID()) . '">' . uthsc_get_acf('health_reminders_photo_attribution_name_' . $i, get_the_ID()) . '</a>
//                    </figcaption>
//                </figure>');
//                        }



                ?>
            </div>
        </div>
    </div>

    <div class="row background-stripe">
        <div class="columns small-centered medium-11 large-8">
            <div class="row" data-equalizer>
                <div class="columns medium-6 text-center">
                    <div class="panel" data-equalizer-watch>
                        <span class="fa fa-calendar fa-4x"></span><br />
                        <h2>Same day walk-in appointments available</h2>
                    </div>
                </div>
                <div class="columns medium-6 text-center">
                    <div class="panel" data-equalizer-watch>
                        <span class="fa fa-cutlery fa-4x"></span><br />
                        <h2>Appointments available during lunch hours</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
