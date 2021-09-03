##### to generate hero header that loops based on title of posts

<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

    <div class="hero">
        <div class="hero-inner inner-container">
            <h1 class="hero-text">
                <span class="hero-sitename"><?php bloginfo('name'); ?></span>
                <?php the_title();?>.
            </h1>
            <p class="hero-description">
                <span class="magenta"><?php bloginfo('name'); ?></span>
                <?php bloginfo('description') ?>
            </p>
        </div>
    </div>

<?php 
endwhile; 
endif; 
?>

##### query_posts()
//call posts from food menu
//1 post only each time
//random order - rand, ascd, desc
<?php query_posts(
    'category_name=menu 
    &posts_per_page=1 
    &orderby=rand' 
) ?>

<div class="food section-heading" id="food">Menu</div>
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