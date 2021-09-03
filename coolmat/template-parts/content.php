<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */

//  making variables global in file that runs in each loop to display posts
global $item_no;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<!-- food menu item title on left -->
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
		<!-- grab food menu item no. -->
		<h1 class="entry-no">
			<span class="magenta"> <?php echo $item_no ?> </span>
		</h1>
		<!-- food menu item price on right -->
		<div class="entry-price">
			<?php the_content(); ?>
		</div>

	</header><!-- .entry-header -->

	<!-- <?php coolmat_post_thumbnail(); ?> -->
	<?php the_post_thumbnail(); ?>

	<!-- <footer class="entry-footer">
		<?php coolmat_entry_footer(); ?>
	</footer> --> 
	<!-- entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
