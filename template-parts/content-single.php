<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Basic_Underscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( ); ?>
		</div>
		<?php } ?>

		<div class="entry-meta">
			<?php basic_underscores_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-underscores' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php basic_underscores_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
