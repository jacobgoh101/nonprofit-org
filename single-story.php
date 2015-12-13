<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nonprofit_Organization
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
		?>		

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">				

				<img class="story-hero" src="<?php the_field('Post_Hero_Image'); ?>" alt="Story Hero Image" />

				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>

				<div class="story-details">
					<span class="story-type">
						<strong>Story Type: </strong>
						<?php the_field('story_type'); ?>
					</span>

					<?php 
					if(get_field('programs_used')){ 
						?> 
						<span class="programs-used"> 
							<strong>Program Used: </strong>
							<?php 
							the_field('programs_used'); 
							?>
						</span>
						<?php
					} 
					?>

					<span class="how-we-helped">
						<strong>How We Helped: </strong>
						<?php the_field('how_we_helped'); ?>
					</span>
				</div>

				<?php
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php nonprofit_org_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; 
				?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nonprofit-org' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nonprofit-org' ),
					'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php nonprofit_org_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php
		//get_template_part( 'template-parts/content', get_post_format() );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
