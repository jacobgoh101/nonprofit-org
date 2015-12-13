<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nonprofit_Organization
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		
		<?php

		// The Query - Featured Post
		$the_query1 = new WP_Query( array( 'post_type' => 'story',
			'meta_key'		=> 'featured',
			'meta_value'	=> true,
			'posts_per_page' => 1
			));

		// The Loop
		if ( $the_query1->have_posts() ) {
			echo '<h2>Featured Story</h2>';
			while ( $the_query1->have_posts() ) {
				$the_query1->the_post();
				?>

				<div class="side-image">
					<div class="images-wrapper" style="background-image: url('<?php the_field('Portrait'); ?>');">						
					</div>
					<div class="side-image-content">
						<h4><?php the_field('story_type'); ?></h4>
						<h1><?php the_title(); ?></h1>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink() ?>">read more about <?php the_title() ?></a>
					</div>
				</div>

				<?php
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();

		echo '<hr class="separator">';

		// The Query - Client Story
		$the_query2 = new WP_Query( array( 'post_type' => 'story',
			'meta_key'		=> 'story_type',
			'meta_value'	=> 'Client Story',
			'posts_per_page' => 3
			));

		// The Loop
		if ( $the_query2->have_posts() ) {
			echo '<h2>Client Story</h2>';
			echo '<div class="archive-story">';
			while ( $the_query2->have_posts() ) {
				$the_query2->the_post();
				?>
				
				<div class="hover-tile-outer" style="background-image:url('<?php the_field('Portrait'); ?>');">
					<a href="<?php the_permalink() ?>" alt="story-link" class="client-story-link">
						<div class="hover-tile-container">						
							<div class="hover-tile hover-tile-visible"></div>
							<div class="hover-tile hover-tile-hidden">
								<h4><?php the_title() ?></h4>
								<?php echo substr(get_the_excerpt(), 0,100) . "..."; ?>
							</div>

						</div>
					</a>
				</div>

				<?php

			}
			echo '</div>';
			echo do_shortcode('[ajax_load_more post_type="story" meta_key="story_type" meta_value="Client Story" offset="3" posts_per_page="3" pause="true" scroll="false" container_type="div" css_classes="ajax-load-more"]');
		}
		/* Restore original Post Data */
		wp_reset_postdata();


		echo '<hr class="separator">';

		// The Query - Volunteer Story
		$the_query3 = new WP_Query( array( 'post_type' => 'story',
			'meta_key'		=> 'story_type',
			'meta_value'	=> 'Volunteer Story',
			'posts_per_page' => 3
			));

		// The Loop
		if ( $the_query3->have_posts() ) {
			echo '<h2>Volunteer Story</h2>';
			echo '<div class="archive-story">';
			while ( $the_query3->have_posts() ) {
				$the_query3->the_post();
				?>
				
				<div class="hover-tile-outer" style="background-image:url('<?php the_field('Portrait'); ?>');">
					<a href="<?php the_permalink() ?>" alt="story-link" class="client-story-link">
						<div class="hover-tile-container">						
							<div class="hover-tile hover-tile-visible"></div>
							<div class="hover-tile hover-tile-hidden">
								<h4><?php the_title() ?></h4>
								<?php echo substr(get_the_excerpt(), 0,100) . "..."; ?>
							</div>
							
						</div>
					</a>
				</div>

				<?php
				
			}
			echo '</div>';
			echo do_shortcode('[ajax_load_more post_type="story" meta_key="story_type" meta_value="Volunteer Story" offset="3" posts_per_page="3" pause="true" scroll="false" container_type="div" css_classes="ajax-load-more"]');
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>



	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
