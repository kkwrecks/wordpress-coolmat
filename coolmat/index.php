<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */

get_header();
?>
	
	
	<main id="primary" class="site-main">

<!---------HERO SECTION--------------->
		<!-- HARD CODED -->
		<!-- <div class="hero">
			<div class="hero-inner inner-container">

				<h1 class="hero-text">
					<span class="hero-sitename">
						<?php bloginfo('name') ?> 
					</span> fried seaweed roll
				</h1>

				<p class="hero-description">
					<span class="magenta">
						<?php bloginfo('name'); ?>
					</span> is a restuarant that creates future flavor nostalgia of street food.
				</p>

			</div>
		</div> -->

<!---------HERO SECTION--------------->
		<!-- DYNAMIC - POSTS category menu -->
		<?php query_posts(
		'category_name=menu 
		&posts_per_page=1 
		&orderby=rand' 
		) ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="hero">
			<div class="hero-inner inner-container">
				<h1 class="hero-text">
					<span class="hero-sitename"><?php bloginfo('name'); ?></span> <?php the_title();?>
				</h1>
				<p class="hero-description">
					<span class="magenta"><?php bloginfo('name'); ?></span> <?php bloginfo('description') ?>
				</p>
			</div>
		</div>

		<?php endwhile; endif; ?>

<!-- -------INTRO SECTION--------------->

		<!-- HARDCODED VERSION -->
		<!-- <div class="intro" id="intro">
			<div class="intro-inner">
				<h2 class="intro-title" >introducing <?php bloginfo('name'); ?></h2>
				<p class="intro-description">
				street food that was born in tough times.
				street food that everybody loves. <br>
				<span class="yellow"><?php bloginfo('name') ?></span> is on a mission to provide future 
				flavor nostalgia of street food for men, 
				women, children, grandpas and grandmas.<br>
				we only use the best ingredients. 
				</p>
			</div>
		</div> -->

<!---------INTRO SECTION--------------->
		<!-- DYNAMIC - using POSTS category-intro -->
		<?php query_posts(
		'category_name=intro 
		&posts_per_page=1' 
		) ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="intro" id="intro">
			<div class="intro-inner">
				<h2 class="intro-title"> <?php the_title() ?> </h2>
				<div class="intro-description"> <?php the_content() ?> </div>
			</div>
		</div>

		<?php endwhile; endif; ?>

<!-- -------FOOD SECTION--------------->

		<div class="food section-heading" id="food"><h3 class="menu-title">Menu</h3></div>
		<!-- where the posts are -->
		<div class="food-grid">
			<?php
			//override hero one post only loop
			query_posts('posts_per_page=20 & category_name=menu');
			//if loop for food menu posts
			if ( have_posts() ) :

				/* Start the Loop */
				// adding incrementing index numbers to each post
				$item_no = 1;
				while ( have_posts() ) :
					the_post();
					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );
					$item_no++; 
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>

<!-- -------DIRECTIONS SECTION--------------->

		<div class="directions section-heading" id="directions">directions to coolmat</div>
		
		<!-- locations - now one may have more in future -->
		<div class="locations">

		<!-- for each individual location  -->
			<div class="location map-grid">

				<!-- map on left -->
				<div class="map">
					<div class="map-inner">
						<!-- map embed goes in here -->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50599.76924944211!2d126.9478403017802!3d37.567182002695745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca2eef9ff47d5%3A0xb0e848d5351e04cf!2z6rmA67Cl7J2867KI6rCA!5e0!3m2!1sen!2ssg!4v1630343775236!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>

				<!-- info on right -->
				<div class="location-info">
					<div class="location-text">
						<!-- location info goes here -->
						<h3>Business Name</h3>
						<p>coolmat</p>

						<h3>Address</h3>
						<p>284-10 Yeomchang-dong, Gangseo-gu, Seoul</p>

						<h3>Phone Number</h3>
						<p>02-9999-9999</p>

						<h3>Direction</h3>
						<p>Get out of gate 3 and walk straight down for about 200 meters. You will see Cool Mat on your left.</p>

					</div>
				</div>

			</div>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer(); 
?>