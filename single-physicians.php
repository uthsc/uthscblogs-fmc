<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<div class="row">
					<div class="columns medium-4">
						<?php the_post_thumbnail('large fmc-physicians-full-width-image'); ?>
					</div>
					<div class="columns medium-8">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				</div>
				<hr />
				<div class="row alert-box radius">
					<div class="columns medium-6">
						<?php echo uthsc_get_acf('fmc_physician_hometown', get_the_ID(), '<p><strong>Hometown: </strong>', '</p>'  ); ?>
						<?php echo uthsc_get_acf('fmc_physician_medical_school', get_the_ID(), '<p><strong>Medical School: </strong>', '</p>'  ); ?>
						<?php echo uthsc_get_acf('fmc_physician_stats', get_the_ID(), '<p><strong>Stats: </strong>', '</p>'  ); ?>
					</div>
					<div class="columns medium-6">
						<?php echo uthsc_get_acf('fmc_physician_hobbies', get_the_ID(), '<p><strong>Hobbies: </strong>', '</p>'  ); ?>
						<?php echo uthsc_get_acf('fmc_physician_research_areas_of_interest', get_the_ID(), '<p><strong>Research/Areas of Interest: </strong>', '</p>'  ); ?>
						<?php echo uthsc_get_acf('fmc_physician_tidbits', get_the_ID(), '<p><strong>Tidbits: </strong>', '</p>'  ); ?>
					</div>
				</div>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p class="entry-tags"><?php the_tags(); ?></p>
				<?php edit_post_link('Edit this Post'); ?>
			</footer>
		</article>
		<!--<div class="entry-author panel">
			<div class="row">
				<div class="large-3 columns">
					<?php /*echo get_avatar( get_the_author_meta('user_email'), 95 ); */?>
				</div>
				<div class="large-9 columns">
					<h4><?php /*the_author_posts_link(); */?></h4>
					<p class="cover-description"><?php /*the_author_meta('description'); */?></p>
				</div>
			</div>
		</div>-->
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>