<?php /* Template Name: Front Page */ 

//Add FlexSlider's styles and script
function enqueue_flexslider_styles_scripts() { 
	wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/woothemes-FlexSlider-9a419a0/flexslider.css');
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/woothemes-FlexSlider-9a419a0/jquery.flexslider-min.js', array('jquery'), null, true );
} 

add_action('wp_enqueue_scripts', 'enqueue_flexslider_styles_scripts',1);

get_header(); 


?>


<div class="hero-image">
	<div class="hero-image-text">
		<h2><a href="#">We believe that no kids should ever have to live in hunger. Help save them.</a></h2>
	</div>
</div>
<div class="bar-under-hero-image">
	<div class="wrap">
		<a href="#">
			<div id="bar-under-hero-image-button-1">
				<h3>I'm Hungry</h3>
				<h4>Find Food <i class="fa fa-cutlery"></i></h4>
			</div>
		</a>
		<a href="#">
			<div id="bar-under-hero-image-button-2">
				<h3>I want to participate</h3>
				<h4>Volunteer <i class="fa fa-hand-paper-o"></i></h4>
			</div>
		</a>
		<a href="#">
			<div id="bar-under-hero-image-button-3">
				<h3>I want to help</h3>
				<h4>Donate <i class="fa fa-credit-card"></i></h4>
			</div>
		</a>
	</div>
</div>
<div class="our-vision">
	<h2>Our vision is to end hunger in Gotham City.</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quod quidem nobis non saepe contingit. Si longus, levis; Beatus sibi videtur esse moriens. Hoc non est positum in nostra actione. Duo Reges: constructio interrete. Sed ad bona praeterita redeamus.</p>
	<a href="#">Where we have been</a>
	<a href="#">Where are we going</a>
</div>

<!-- Flex Slider -->
<?php
// The Query - story post type
$the_query1 = new WP_Query( array( 'post_type' => 'story',
	'posts_per_page' => 8
	));

// The Loop
if ( $the_query1->have_posts() ) {
	echo '<div class="flex-slider-wrap">';
	echo '<div id="slider" class="flexslider"><ul class="slides">';
	while ( $the_query1->have_posts() ) {
		$the_query1->the_post();
		?>
		<li>
			<div class="side-image">
				<div href="<?php the_permalink() ?>" class="images-wrapper" style="background-image: url('<?php the_field('Portrait'); ?>');"></div>
				<div class="side-image-content">
					<h1><?php the_title(); ?></h1>
					<p><?php echo substr(get_the_excerpt(), 0,300) . "..."; ?></p>
					<a href="<?php the_permalink() ?>">read more about <?php the_title() ?></a>
				</div>
			</div>
		</li>
		<?php
	}
	echo '</ul></div>';

	wp_reset_postdata();

	echo '<div id="carousel" class="flexslider"><ul class="slides">';
	while ( $the_query1->have_posts() ) {
		$the_query1->the_post();
		?>
		<li>
			<img src="<?php the_field('Portrait'); ?>" />
		</li>
		<?php
	}
	echo '<li>	<img src="http://localhost/nonprofit-org/wp-content/themes/nonprofit-org/images/transparent-1px-1px.png" width:"200px" /></li><li>	<img src="http://localhost/nonprofit-org/wp-content/themes/nonprofit-org/images/transparent-1px-1px.png" width:"200px" /></li>';
	echo '</ul></div>';
}
/* Restore original Post Data */
wp_reset_postdata();
echo '</div>'
?>


<script>
	(function($) {
		$(window).load(function() {
  			// The slider being synced must be initialized first
  			$('#carousel').flexslider({
  				animation: "slide",
  				controlNav: false,
  				animationLoop: true,
  				slideshow: false,
  				itemWidth: 150,
  				itemMargin: 5,
  				asNavFor: '#slider'
  			});

  			$('#slider').flexslider({
  				animation: "slide",
  				controlNav: false,
  				animationLoop: false,
  				slideshow: false,
  				sync: "#carousel"
  			});
  		});

	})( jQuery );

</script>

<?php

get_footer();